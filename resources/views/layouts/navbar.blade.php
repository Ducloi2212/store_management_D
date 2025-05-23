<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('title')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('link')
</head>

<body>
    <nav class="navbar navbar-expand-lg color sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center mx-4">
        <!-- Left: Logo + Menu -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="#">Store Managment</a>
            <ul class="navbar-nav ms-3 mb-2 mb-lg-0 d-flex flex-row">
                <li class="nav-item me-3">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                @guest
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('user.create') }}">Sign Up</a>
                    </li>
                @else
                @endguest
            </ul>
        </div>

        <!-- Center: Search bar -->
        <form class="d-flex mx-auto w-50 my-2" action="{{ route('products.search') }}" method="GET" role="search">
            <div class="input-group">
                <button class="input-group-text bg-white border-end-0"><i class='bx bx-search fs-3'></i></button>
                <input type="text" name="query" class="form-control border-start-0" placeholder="Tìm kiếm sản phẩm..."
                    value="{{ request('query') }}">
            </div>
        </form>

        <!-- Right: Cart + Profile -->
        @guest
        @else
            <div class="d-flex align-items-center">
                <a class="btn d-flex align-items-center text-white border-0 me-2 " style="background-color: transparent;"
                    href="{{ route('cart.list') }}">
                    <i class='bx bxs-cart fs-2 '></i><strong>Cart</strong>
                </a>
                <a class="btn d-flex align-items-center text-white border-0" style="background-color: transparent;"
                    href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
                    <img src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset(Auth::user()->profile->avatar) : asset('images/users/user.jpg') }}" class="avatar-icon" alt="image">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
            </div>
        @endguest
    </div>
</nav>