<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {

        return view('users.login');
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

     public function createUser()
    {
        return view('users.signup');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $roleUser = Role::where('name', 'user')->first();

        if ($roleUser) {
            $user->roles()->attach($roleUser->id);
        }

        return redirect("login");
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $user->delete();
        auth()->logout();

        return redirect('home')->with('success', 'Tài khoản đã được xóa thành công.');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('home');
    }
}