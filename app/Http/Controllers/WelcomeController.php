<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController
{
    public function __invoke(Request $request)
    {
        $templatePath = resource_path('views/invite-email-template.txt');
        $emailBodyTemplate = urlencode(file_get_contents($templatePath));
        return view('welcome', [
            'sent' => $request->input('sent'),
            'emailBodyTemplate' => $emailBodyTemplate,
        ]);
    }
}
