<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InvitePostRequest;
use App\Invite;
use App\User;
use Illuminate\Support\Str;

class InviteController extends Controller
{
    public function create()
    {
        $invites = Invite::get();
        return view('admin.invitecreate', ['username' => request()->username, 'invites' => $invites]);
    }

    public function store(InvitePostRequest $request)
    {
        $user = User::where('username', $request->vendor_username)->first();

        if(empty($user)) {
            return redirect()->back()->withErrors('No user found!');
        }

        $code = $request->vendor_username . "-" . Str::random(6);
        $newInvite = Invite::firstOrCreate(
            ['user_id' => $user->id, 'is_claimed' => false],
            ['user_id' => $user->id, 'code' => $code]
        );
        return redirect()->back()->with(['code' => $newInvite->code, 'user' => $user]);
    }
}
