<?php

namespace App\Http\Requests\Admin;

use App\Invite;
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
        $newInvite = Invite::firstOrCreate(
            ['username' => $this->vendor_username, 'is_claimed' => false],
            ['code' => $code, 'notes' => $this->newpgp]
        );
        return $newInvite;
    }
}
