<?php

namespace App\Http\Requests\Admin;

use App\Exceptions\RequestException;
use App\Invite;
use App\Marketplace\PGP;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class InviteOutsidePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vendor_username' => 'required|alpha_num',
            'newpgp' => 'required'
        ];
    }

    public function persist()
    {
        $code = $this->vendor_username . "-" . Str::random(6);

        $newUsersPGP = $this -> newpgp;
        $validationNumber = rand(100000000000, 999999999999); // Radnom number to confirm
        $decryptedMessage = "You have successfully decrypted this message.\nTo validate this key please copy validation number to the field on the site\nValidation number:". $validationNumber;

        try{
            $encryptedMessage = PGP::EncryptMessage($decryptedMessage, $newUsersPGP);
        }
        catch (\Exception $e){
            throw new RequestException($e -> getMessage());
        }

        $newInvite = Invite::firstOrCreate(
            ['username' => $this->vendor_username, 'is_claimed' => false],
            ['code' => $code, 'notes' => $encryptedMessage, 'validation_number' => $validationNumber, 'temp_pgp' => $newUsersPGP]
        );

        return $newInvite;
    }
}
