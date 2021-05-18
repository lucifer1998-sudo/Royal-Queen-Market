<?php

namespace App\Http\Requests\Auth;

use App\Exceptions\RequestException;
use App\Invite;
use App\Marketplace\Encryption\Keypair;
use App\Marketplace\PGP;
use App\Marketplace\Utility\Mnemonic;
use App\Rules\Captcha;
use App\User;
use Defuse\Crypto\Crypto;
use Illuminate\Foundation\Http\FormRequest;

class SignUpFromInvitePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'captcha' => ['required', new Captcha()],
            'username' => 'required|unique:users|alpha_num|min:4|max:12',
            'password' => 'required|confirmed|min:8',
            'code' => 'required',
            'validation_number' => 'required',
        ];
    }

    /**
     * Get messages for validation rules
     *
     * @return array
     */
    public function messages() {
        return [
            'captcha.required' => 'Captcha Required',
            'username.required' => 'Username Required',
            'username.min' => 'Username must have at least 4 characters',
            'username.unique' => 'Account with that username already exists',
            'username.max' => 'Username cannot be longer than 12 characters',
            'username.alpha_num' => 'You can only use alpha-numeric characters for username',
            'password.required' => 'Password Required',
            'password.min' => 'Password must have at least 8 characters',
            'password.confirmed' => 'Password must be confirmed',
            'password.different' => 'Password can\'t be same as username',
        ];
    }

    public function persist() {
        
        $invite = Invite::where(['code' => $this->code, 'is_claimed' => false])->first();
        $correctValidationNumber = $invite->validation_number;
        $isCorrect = $correctValidationNumber == $this -> validation_number;
        if(! $isCorrect) {
            throw new RequestException('Your validation number is not correct!');
        }

        // create users public and private RSA Keys
        $keyPair = new Keypair();
        $privateKey = $keyPair->getPrivateKey();
        $publicKey =   $keyPair->getPublicKey();
        // encrypt private key with user's password
        $encryptedPrivateKey = Crypto::encryptWithPassword($privateKey, $this->password);

        $mnemonic = (new Mnemonic())->generate(config('marketplace.mnemonic_length'));
        $user = new User();
        $user->username = $invite->username;
        $user->password = bcrypt($this->password);
        $user->mnemonic = bcrypt(hash('sha256', $mnemonic));
        $user->referral_code = strtoupper(str_random(6));
        $user->msg_public_key = encrypt($publicKey);
        $user->msg_private_key = $encryptedPrivateKey;
        $user->pgp_key = $invite->temp_pgp;
        $user->save();


        // generate vendor addresses
        $user->generateDepositAddresses();
        $user->becomeVendorFromCode();
        $invite->update(['notes' => '', 'is_claimed' => true, 'user_id' => $user->id, 'temp_pgp' => '', 'validation_number' => '']);

        session()->flash('mnemonic_key', $mnemonic);
    }
}
