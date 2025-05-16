<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

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
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
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
}
