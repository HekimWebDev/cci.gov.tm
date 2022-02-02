<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class MainController extends Controller
{
    public function index(){
        $user = User::query()->where('id', auth()->id())->first();
        $users = User::all();
        return view('admin.index', compact('user', 'users'));
    }

}
