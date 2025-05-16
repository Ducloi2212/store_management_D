<div>
    Order
    <p>Manage and protect your account</p>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('user.authUser') }}">
            @csrf
            <input type="email" name="email" id="email" placeholder="Email" class="input-field" />
            <div class="password-field">
                <input type="password" name="password" id="password" placeholder="Password" class="input-field" />
            </div>
            <button class="login-btn">LOG IN</button>
        </form>
        <a href="#" class="forgot">Forgot Password</a>

        <p class="signup-text">New to account? <a href="{{route('user.create')}}">Sign Up</a></p>
    </div>
</div>
</div>