<div class="sidebar">
    <div class="row ">
        <div class="col-lg-4 mt-4">
            <img src="{{ asset($user->profile->avatar) }}" class="avatar" alt="image">
        </div>
        <div class="col-lg-8 mt-4">
            <div class="review-comment">
                <h4>{{$user->name}}</h4>
                <div>
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <a class="a" href="{{route('user.profile', ['id' => Auth::user()->id])}}">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3 class="my-h3"><b>My Account</b></h3>
    <ul class="profile-menu">
        <a href="{{route('user.profile', ['id' => Auth::user()->id])}}" class="a">
            <li class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</li>
        </a>
        <a href="" class="a">
        <li class="{{ request()->routeIs('profile') ? 'active' : '' }}">Order</li>
        </a>
        <a href="{{route('user.profile', ['id' => Auth::user()->id])}}" class="a">
        <li>Reset Password</li>
        </a>
        <a href="{{route('signout')}}" class="a">
        <li>Log Out</li>
        </a>
    </ul>
</div>