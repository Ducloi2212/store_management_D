<div>
    My Profile
    <p>Manage and protect your account</p>
</div>
<hr>
<div class="row">
    <div class="col-lg-8">
        <div class="profile-section">
            <form action="{{ route('user.updateProfile', ['id' => $user->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ $user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="name" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="Email" value="{{ old('phone', $user->profile->phone ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="Address" value="{{ old('address', $user->profile->address ?? '') }}">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-group">
                        <label>
                            <input type="radio" name="gender" value="male"
                                {{ old('gender', $user->profile->gender ?? '') == 'male' ? 'checked' : '' }}>
                            Male
                        </label>

                        <label>
                            <input type="radio" name="gender" value="female"
                                {{ old('gender', $user->profile->gender ?? '') == 'female' ? 'checked' : '' }}>
                            Female
                        </label>

                        <label>
                            <input type="radio" name="gender" value="other"
                                {{ old('gender', $user->profile->gender ?? '') == 'other' ? 'checked' : '' }}>
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob">Date of birth</label>
                    <input type="date" class="form-control" name="birthday" id="dob" value="{{ old('birthday', $user->profile->birthday ?? '') }}">
                </div>
                <div style="margin-top: 20px;">
                    <button class="save-btn">Save</button>
                </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="avatar-wrapper">
           <img src="{{ $user->profile && $user->profile->avatar ? asset($user->profile->avatar) : asset('images/users/user.jpg') }}" alt="Avatar"
                id="avatar-preview" alt="Avatar">
            <br>
            <input type="file" id="avatar-upload" name="avatar" accept=".jpg,.jpeg,.png">
            <label for="avatar-upload">Select Image</label>
        </div>
        </form>
    </div>