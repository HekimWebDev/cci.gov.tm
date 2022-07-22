<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class MainController extends Controller
{
    public function index(){
        $user = auth()->user();

        $users = User::get();

        return view('admin.index', compact('user', 'users'));
    }

}
