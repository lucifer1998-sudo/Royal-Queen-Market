<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InviteOutsidePostRequest;
use Illuminate\Http\Request;

class InviteOutsideController extends Controller
{
    public function store(InviteOutsidePostRequest $request)
    {
        $newInvite = $request->persist();
        $outSideCodeLink = env('APP_URL', '') . '/registration/' . $newInvite->code;
        return redirect()->back()->with(['outside_code' => $outSideCodeLink]);
    }
}
