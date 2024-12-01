<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section -->
            <div class="col-lg-2 col-md-3 col-6">
                <div class="header__logo">
                    <a href="/">
                        <img src="/img/logo.png" alt="Logo" />
                    </a>
                </div>
            </div>

            <!-- Navigation Section -->
            <div class="col-lg-8 col-md-6 col-6">
                <nav class="header__nav">
                    <ul class="header__menu d-flex justify-content-between align-items-center">
                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="/" class="nav-item nav-link">Trang chủ</a>
                        </li>

                        {!! $menu !!}
                    </ul>
                </nav>
            </div>

            <!-- Right Section (Icons in a row) -->
            <div class="col-lg-2 col-md-3">
                <div class="header__right d-flex justify-content-end align-items-center">
                    <!-- Search Icon -->
                    <a href="#" class="search-switch" aria-label="Search">
                        <span class="icon_search"></span>
                    </a>
                    <!-- Cart Icon -->
                    <a href="/gio-hang" aria-label="Go to cart">
                        <span class="fa fa-shopping-bag"></span>
                    </a>

                    <!-- Email Icon -->
                    <a href="/sendMail" aria-label="Send Email">
                        <i class="fa-regular fa-envelope fa-shake" style="color: #FFD43B;"></i>
                    </a>

                    <!-- User Profile or Login Icon -->
                    @auth
                        <form id="logout-form" method="POST" action="/dang-xuat">
                            @csrf
                            <div class="d-flex align-items-center">
                                <a href="#"
                                    onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
                                    class="my-auto">
                                    Xin chào: {{ Auth::user()->fullName }}
                                </a>
                            </div>
                        </form>
                    @endauth
                    @guest
                        <a href="/dang-nhap" aria-label="Login">
                            <span class="icon_profile"></span>
                        </a>
                    @endguest
                </div>
                <a href="/admin/category" class="btn btn-primary ms-auto" aria-label="Dashboard">
                    Dashboard
                </a>
            </div>
        </div>
    </div>
</header>
