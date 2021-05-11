<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\RequestException;
use App\Http\Requests\Auth\RecoverPasswordPgpRequest;
use App\Http\Requests\Auth\ResetPasswordPgpRequest;
use App\Http\Requests\CheckMnemonicRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RecoverPasswordMnemonicRequest;

class ForgotPasswordController extends Controller
{
    public function showForget()
    {
        return view('tailwind-ui.auth.forgot-password.forgotpassword');
    }

    public function showMnemonic()
    {
        return view('auth.forgotpassword.mnemonicpassword');
    }

    public function showPGP()
    {
        return view('auth.forgotpassword.pgppassword');
    }

    public function resetMnemonic(RecoverPasswordMnemonicRequest $request)
    {
        try {
            return $request->persist();
        } catch (RequestException $e) {
            session()->flash('errormessage', $e->getMessage());
            return redirect()->back();
        }
    }

    public function sendVerify(RecoverPasswordPgpRequest $request)
    {
        try {
            return $request->persist();
        } catch (RequestException $e) {
            session()->flash('errormessage', $e->getMessage());
            return redirect()->back();
        }
    }

    public function showVerify()
    {
        return view('auth.forgotpassword.pgppasswordverify');
    }

    public function resetPgp(ResetPasswordPgpRequest $request)
    {
        try {
            return $request->persist();
        } catch (RequestException $e) {
            session()->flash('errormessage', $e->getMessage());
            return redirect()->back();
        }
    }

    public function checkMnemonic(Request $request)
    {
        if (!isset($request->username) && !isset($request->mnemonic)) throw new RequestException('Please fill the required fields');
        $user = User::where('username', $request->username)->first();
        //check if user exist
        if ($user == null) {
            throw new RequestException('Could not find user with that username');
        }
        //check if mnemonics match
        if (
        !\Hash::check(hash('sha256', $request->mnemonic), $user->mnemonic)
        ) {
            throw new RequestException('Mnemonic is not valid');
        }
//        dd('valid');
        return view('tailwind-ui.auth.forgot-password.reset-password')->with(['user' => $user]);
        return redirect()->route('a.reset');
    }

    public function showResetForm()
    {
        return view('tailwind-ui.auth.forgot-password.reset-password');
    }

    public function changePassword(Request $request)
    {
//        dd($request->all());
        if (!isset($request->password) && !isset($request->confirm_password)) throw new RequestException('Please fill the required fields');
        if ($request->password !== $request->confirm_password) throw new RequestException('Passwords do not match');
        $user = User::find($request->id);

        // change user's password
        $user->password = bcrypt($request->password);

        // save changes
        $user->save();


        session()->flash('success', 'You have successfully changed your password!');

        return redirect('signin');
    }

}
