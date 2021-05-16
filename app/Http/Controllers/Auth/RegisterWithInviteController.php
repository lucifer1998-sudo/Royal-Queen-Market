<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpFromInvitePostRequest;
use App\Invite;
use App\Marketplace\Utility\Captcha;
use Illuminate\Http\Request;

class RegisterWithInviteController extends Controller
{
    public function create($code)
    {
        $invite = Invite::where('code', $code)->first();
        return view('auth.signupwithinvite')->with([
            'code' => $invite->code,
            'notes' => $invite->notes,
            'username' => $invite->username,
            'captcha' => Captcha::Build(),
        ]);
    }

    public function store(SignUpFromInvitePostRequest $request)
    {
        $request->persist();
        return redirect()->route('auth.mnemonic');
    }
}
