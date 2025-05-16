<div class="sidebar">
    <div class="row ">
        <div class="col-lg-4 mt-4">
            <img src="{{ $user->profile && $user->profile->avatar ? asset($user->profile->avatar) : asset('images/users/user.jpg') }}" class="avatar" alt="image">
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
            <li class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">Profile</li>
        </a>
        <a href="{{route('user.orders', ['id' => Auth::user()->id])}}" class="a">
            <li class="{{ request()->routeIs('user.orders') ? 'active' : '' }}">Order</li>
        </a>
        <a href="{{route('user.showChangePassword', ['id' => Auth::user()->id])}}" class="a">
            <li class="{{ request()->routeIs('user.showChangePassword') ? 'active' : '' }}">Reset Password</li>
        </a>
        <a id="deleteBtn" href="javascript:void(0)" class="waring-a">
            <li>Delete account</li>
        </a>
        <!--Modal-->
        <div id="confirmModal" class="modal" style="display: none;">
            <div class="modal-content">
                <p>Bạn có chắc muốn xóa tài khoản không?</p>
                <button id="confirmDelete" class="btn btn-red">Xác nhận</button>
                <button id="cancelDelete" class="btn btn-out">Hủy</button>
            </div>
        </div>
        <!--Form delete-->
        <form id="deleteForm" action="{{ route('user.delete', ['id' => Auth::user()->id]) }}" method="POST"
            style="display:none;">
            @csrf
            @method('DELETE')
        </form>

        <a href="{{route('signout')}}" class="a">
            <li>Log Out</li>
        </a>
    </ul>
</div>