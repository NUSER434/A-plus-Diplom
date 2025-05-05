<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class AdminController extends Controller
{
    // AdminController.php
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    // Обновление данных пользователя
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:admin,user',
        ]);

        $user->update($validated);

        return back()->with('success', 'Данные пользователя успешно обновлены!');
    }

    // Удаление пользователя
    public function deleteAccount(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->input('confirmation') !== 'DELETED') {
            return back()->withErrors(['confirmation' => 'Для подтверждения удаления введите "DELETED"']);
        }

        $user->delete();

        return back()->with('success', 'Пользователь успешно удален');
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.index');
    }

}
