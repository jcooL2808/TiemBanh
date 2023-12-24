@yield('scripts')

<div class="container-fluid bgtop1">
    <div class="container">
        <div class="boxright">
            @if (Route::has('login'))
            @auth
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Chỉnh sửa thông tin</a></li>
                    @if (Auth::user()->type == "admin")
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Quản Lý</a></li>
                    @endif
                    <li>
                        <?php $itemCount = session('cart', []) ? array_sum(array_column(session('cart'), 'quantity')) : 0; ?>
                        <a class="btn" href="{{ route('cart') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ Hàng
                            <span class="badge bg-info">{{ $itemCount }}</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </div>

            @else
            <a href="{{ route('login') }}" class="">Đăng Nhập</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 ">Đăng Ký</a>
            @endif
            @endauth
            @endif

            @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                @if(auth()->user()->is_admin == 1)
                                <a href="{{url('admin/routes')}}">Admin</a>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection

        </div>
    </div>
</div>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset ('image/logo.svg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navcenter">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Trang Chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Các loại bánh
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($loaibanh as $theloai)
                                <li><a class="dropdown-item" href="#">
                                        {{ $theloai-> cat_name }}
                                    </a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Cheese Cake" aria-label="Search">
                <button class="btn btn-outline-info" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </form>
        </div>
    </nav>
</div>