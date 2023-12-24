<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function user_register()
    {
        $showUser_data =  User::latest()->get();
        return view('blade.user.user', compact('showUser_data'));
    }

    public function user_store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9_.+-]+@gmail.com$/i',
            'password' => 'required',
        ]);
        $existingUser = User::where('email', $data['email'])->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email address already exists.');
        } else {

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_admin' => $request->input('is_admin', false),
            ]);



            return redirect()->back()->with('success', 'User registration is successful');
        }
    }



    public function delete_user($id)
    {
        $user_delete = User::find($id);
        $user_delete->delete();

        return redirect()->back()->with('delete_success', ' User delete is successful');
    }
    public function userShow($id)
    {

        $userShow = User::find($id);
        return view('blade.user.userEdit', compact('userShow'));
    }
    public function update_user(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $user->name = $data['name'];
        $user->email = $data['email'];

        // Check if a new password is provided, and update the password if needed
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->is_admin = $request->input('is_admin', false);

        $user->save();

        return redirect('user')->with('success', 'User update is successful');
    }
}
