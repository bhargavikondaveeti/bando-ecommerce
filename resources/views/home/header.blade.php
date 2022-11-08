<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>
<nav class="navbar">
    <div class="max-width">
        <div class="logo"><a href="#">GTA <span>TV.</span></a></div>
        <ul class="menu">
            <li><a href="{{url('/redirect')}}" class="menu-btn">HOME</a></li>
            <li><a href="https://www.instagram.com/rongrambo/?hl=en" class="menu-btn">CREATOR</a></li>
            <li><a href="#about" class="menu-btn">ABOUT</a></li>
            <li><a href="#services" class="menu-btn">TRACKS</a></li>
            <li >
                @if (Route::has('login'))

                    @auth
                        <a href="{{url('show_cart')}}" class="menu-btn"> ({{App\Models\Cart::where('user_id','=',Auth::user()->id)->count()}})<img style="width: 30px" src="my/cart.webp" alt="">
                        </a>
            </li>
            @else

                <li>
                    <a href="{{url('show_cart')}}" class="menu-btn"><img style="width: 30px" src="my/cart.webp" alt=""> </a>
                </li>
            @endauth
            @endif
            @if (Route::has('login'))

                @auth

            <li style="color: white"><a class="meu-btn" href="{{url('show_order')}}">ORDER({{App\Models\order::where('user_id','=',Auth::user()->id)->count()}})</a> </li>

                @else
                    <li style="color: white"><a class="meu-btn" href="{{url('show_order')}}">ORDER</a> </li>

                @endauth
            @endif

            <li><a href="#contact" class="menu-btn">CONTACT</a></li>
            @if (Route::has('login'))
                    @auth

                    <x-app-layout>

                    </x-app-layout>
                    @else

            <li class="nav_item">
                <a class="btn btn-primary"  href="{{ route('login') }}" class="menu-btn">LOG IN</a>
            </li>
                    @if (Route::has('register'))
            <li class="nav_item">
                <a class="btn btn-primary"  href="{{ route('register') }}" class="menu-btn">REGISTER</a>
            </li>
                @endif
                @endauth
            </div>
            @endif

     </ul>

        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
    <div style="padding-right: 30px"></div>

</nav>

<!-- home section start -->

<!-- footer section start -->


