<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANDO MERCH</title>
    @include('home.css')
</head>
<body>



<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="#" class="logo">
                        <h5 style="color: black">GTA TV MUSIC </h5>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li  style="font-size: 1rem"><a href="{{url('/redirect')}}" class="active">Home</a></li>
                        <li  style="font-size: 1rem"><a href="#about">About</a></li>
                        <li  style="font-size: 1rem"><a href="#services" >Services</a></li>
                        @if (Route::has('login'))
                            @auth()
                                <li><a style="font-size: 1rem" href="{{url('show_cart')}}"><i style="color: black" class="fas fa-shopping-cart"></i>Cart  ({{App\Models\Cart::where('user_id','=',Auth::user()->id)->count()}})</a></li>
                                <li><a style="font-size: 1rem" href="{{url('show_order')}}"> <i style="color: black" class="fas fa-check-circle"></i>Order  ({{App\Models\order::where('user_id','=',Auth::user()->id)->count()}})</a></li>
                                @endauth
                                @endif
                                </a>
                                </li>
                                    <?php
                                    $user = Illuminate\Support\Facades\Auth::user();
                                    ?>
                                @if (Route::has('login'))
                                    @auth
                                        <li  style="font-size: 1rem"><a href="#profile" >{{ $user->name }}
                                            </a></li>
                                        <li style="font-size: 1rem"> <a class="dropdown-item" href="{{ route('logout') }}"
                                                                          onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <li style="font-size: 1rem">
                                        <span class="nav-item">
            <a class="btn-outline-sm" href="/login">LOG IN</a>
        </span>
                                        </li>
                                        @if (Route::has('register'))
                                            <li style="font-size: 1rem"><span class="nav-item">
                <a class="btn-outline-sm" href="/register">SIGN UP</a>
            </span>
                                            </li>
                                        @endif
                                    @endauth
                                @endif

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->


<!-- home section start -->
        <section class="about" id="about" style="background-color: black;">
            <div class="max-width">
                <h2 class="title">About Product </h2>
                <div class="about-content">
                    <div class="column left">
                        <img src="/product/{{$product->image}}" alt="">
                    </div>

                    <div class="column right">
                        <div style="color: white" class="text">{{$product->title}} <span class="typing-2"></span></div>
                        <div class="text">
                            @if($product ->discount_price!=null)
                                <h6 style="margin: 10px;color:limegreen">
                                    Discount Price  :
                                    KSh. <button class="btn btn-success">{{$product->discount_price}}</button>
                                </h6>
                            <h6 style="color: red; text-decoration: line-through"><
                                Price
                                    <br>
                                    KSh. {{$product->price}}
                            </h6>
                                    @else
                                <h6> KSh. {{$product->price}}</h6>

                                </div>
                            @endif

                        <h6 style="color: limegreen;margin: 20px">
                            QUANTITY:
                            {{$product->quantity}}
                        </h6>
                        <p style="margin: 20px; font-size: 1.2rem; color: white">
                            DESCRIPTION:<br>
                            {{$product->description}}
                        </p>
                        <p style="color: limegreen;margin: 20px">
                            CATEGORY:
                            {{$product->catagory}}
                        </p>



                        <form action="{{url('add_cart',$product->id)}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col col-md-4"> <input type="number" name="quantity" value="1" min="1" style="width: 100px; color: black"></div>
                            <div class="col col-md-4"><input type="submit" value="Add To Cart"></div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

<!-- about section start -->

<!-- services section start -->

<!-- teams section start -->

<!-- contact section start -->

<!-- footer section start -->
@include('home.footer')
<!-- script-->
@include('home.script')

</body>
</html>
