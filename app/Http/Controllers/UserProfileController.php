<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    public function profileUser($id)
    {
        $user = User::with('profile')->findOrFail($id);
        return view('users.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
        'phone' => 'nullable|string|max:20',
        'gender' => 'nullable|in:male,female,other',
        'birthday' => 'nullable|date',
        'address' => 'nullable|string|max:255',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
    ]);

    $user = User::findOrFail($id);
    $profile = $user->profile ?? $user->profile()->create();

    $profile->phone = $request->phone;
    $profile->gender = $request->gender;
    $profile->birthday = $request->birthday;
    $profile->address = $request->address;

    // Avatar
    if ($request->hasFile('avatar')) {
        $avatarFile = $request->file('avatar');
    $filename = time() . '_' . $avatarFile->getClientOriginalName();

    $avatarFile->move(public_path('images/users/'), $filename);

    $profile->avatar = 'images/users/' . $filename;
    }

    $profile->save();

    return redirect()->route('user.profile', ['id' => $user->id])->with('success', 'Cập nhật thành công!');
    }

    public function showChangePasswordForm($id)
    {
         $user = User::with('profile')->findOrFail($id);
        return view('users.change_password', ['user' => $user]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }
}