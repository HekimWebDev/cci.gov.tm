<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
        ]);
        $user = User::find($id);

        if (empty($request->has('is_admin'))) {
            $is_admin = 0;
        } else {
            $is_admin = 1;
        }

        $request['is_admin'] = $is_admin;
        // dd($request->all());
        $user->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Админ (пользователь) успешно изменён');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete($id);
        return redirect()->route('admin.index')->with('success', 'Админ (Пользователь) успещно удалёнь');
    }
}
