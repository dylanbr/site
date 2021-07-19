<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitePostController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'code-of-conduct' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        abort_unless(config('services.slack.invite_link'), 501, 'Someone forgot to add an invite link!');

        return redirect(config('services.slack.invite_link'));
    }
}
