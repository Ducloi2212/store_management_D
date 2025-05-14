<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('title')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg color">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Store Managment</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route ('home') }}">Home</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign Up</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="">Log out</a>
                    </li>
                    @endguest
                </ul>
                <form class="d-flex" role="search">
                    <div class="search-bar d-flex align-items-center">
                        <button type="submit" class="search-btn">
                            <i class='bx bx-search'></i>
                        </button>
                        <input type="text" class="form-control p-0" placeholder="">
                    </div>
                </form>
                @guest
                @else
                <div class="mx-2">
                    <a class=" btn btn-success" href="#"><i class='bx bxs-cart fs-6'></i>Cart</a>
                </div>
                <div class="">
                    <a class=" btn btn-success" href="#"><i class='bx bxs-user'></i>{{ Auth::user()->name }}</a>
                </div>
                @endguest
            </div>
        </div>
    </nav>