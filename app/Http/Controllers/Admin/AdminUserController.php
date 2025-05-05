<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function update(Request $request, User $user)
    {
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

    public function destroy(Request $request, User $user)
    {
        if ($request->input('confirmation') !== 'DELETED') {
            return back()->withErrors(['confirmation' => 'Для подтверждения удаления введите "DELETED"']);
        }

        $user->delete();
        return back()->with('success', 'Пользователь успешно удален');
    }
}
