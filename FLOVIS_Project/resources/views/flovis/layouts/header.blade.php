@section('header')
<header role="banner" class="navbar">

    {{-- ハンバーガーメニュー --}}
    <button type="button" class="drawer-toggle drawer-hamburger">
        {{--<span class="sr-only">toggle navigation</span>--}}
        <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav" role="navigation">
        <ul class="drawer-menu">
            <li><a class="drawer-menu-item" href="{{ url('/flovis') }}">HOME</a></li>
            <li><a class="drawer-menu-item" href="#">About</a></li>
            <li><a class="drawer-menu-item" href="{{ url('/flovis/productList/') }}">Product</a></li>
            <li><a class="drawer-menu-item" href="{{ url('/flovis/FAQ/') }}">FAQ</a></li>
            <li><a class="drawer-menu-item" href="https://www.instagram.com/"><img src="{{ asset('images/InstagramIcon.svg') }}"
                                                                                   alt="InstagramIcon" class="instagramIcon"></a></li>
        </ul>
        <img src="{{ asset('images/flovis_logo00.png') }}" alt="logo" class="flovisLogo">
    </nav>

    {{--ロゴ--}}
    <a href="{{ route('home') }}">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logoImg">
    </a>

    <div class="container">
        {{--検索--}}
        <div class="search">
            <form action="{{ action('ShowController@sort') }}" method="get" name="search">
                <input type="text" class="searchForm" name="keyword" placeholder="キーワード検索">
                <button type="submit" class="bubbly-button">Search</button>
            </form>
        </div>

        {{--ログイン--}}
        <div class="headerLogin">
            <ul class="menu">
                @if(auth()->guest())
                    <li>
                        <a href="{{ route('login') }}">
                            <img src="{{ asset('images/login.svg') }}" alt="login" class="loginImg">
                            <span class="loginMsg">Login</span>
                        </a>
                    </li>
                @else
                    @if(auth()->user())
                        <li class="menu__single">
                            <a href="#">
                                <img src="{{ asset('images/user.svg') }}" alt="user" class="userImg">
                                <span class="userName init-bottom">{{ Auth::user()->name }}</span>
                            </a>

                            <ul class="menu__second-level">
                                {{--<li class="item"><a href="#" class="item">メールアドレスの変更</a></li>--}}
                                <li class="item"><a href="{{ route('profile') }}" class="item">プロフィール編集</a></li>
                                <li class="item"><a href="{{ route('card') }}" class="item">クレジットカード情報</a></li>
                                <li class="item"><a href="{{ route('orderhistory') }}" class="item">購入履歴</a></li>
                                <li class="item"><a href="#" class="item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">ログアウト</a></li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endif
                @endif
            </ul>
        </div>

        {{--カート--}}
        <div class="cart">
            <a href="{{ route('cart')}}" class="cart">
                <img src="{{ asset('images/cart.svg') }}" alt="cart" class="cartImg">
                <span class="cartMsg">Cart</span>
            </a>
        </div>

    </div>

</header>
@endsection