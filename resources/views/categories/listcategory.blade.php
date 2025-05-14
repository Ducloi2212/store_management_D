<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Tất cả</a>
                </li>
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('category.product', ['id' => $category->id]) }}">{{ $category -> name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>