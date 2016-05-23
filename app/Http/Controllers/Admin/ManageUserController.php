<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests;
use App\Models\User;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin/manageUser/user', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin/manageUser/edit', [
            'user' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        return redirect('admin/user');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            $flashMessage = 'Delete lesson successfully';
        } catch (ModelNotFoundException $e) {
            $flashMessage = 'Failed when try delete user';
        }

        return redirect()->route('admin.user.index')->with([
            'flash_message' => $flashMessage
        ]);
    }
}
