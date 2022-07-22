<?php

namespace App\Http\Controllers\Admin\Auth;

class LoginViewController
{
    public function __invoke()
    {
        return view('admin.auth.login');
    }
}
