<!-- product section -->
<section class="product_section layout_padding" style="background-color: black">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}

                    </div>
                @endif
            <div>

                <form action="{{url('product_search')}}" method="GET" >
                    @csrf
                   <div><input style="width: 500px" type="text" name="search" placeholder="Search Products">
                       <input type="submit" value="search">
                   </div>

                </form>
            </div>
        </div>
        <div class="row">
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details',$products->id)}}" class="option1">
                                Product Detail
                            </a>
                            <audio controls>
                                <source src="product/{{$products->play}}" type="audio/mp3">
                            </audio>


                            <form action="{{url('add_cart',$products->id)}}" method="POST">
                               @csrf
                               <div class="row">
                                   <div class="col col-md-4"> <input type="number" name="quantity" value="1" min="1" style="width: 100px"></div>
                                   <div class="col col-md-4"><input type="submit" value="Add To Cart"></div>
                               </div>
                           </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$products->title}}
                        </h5>
                        <br>
                        @if($products ->discount_price!=null)
                        <h6 style="margin: 10px;color: green">
                            Discount Price
                            KSh{{$products->discount_price}}
                        </h6>

                            <h6 style="text-decoration: line-through ;color: red">
                                Price
                                <br>
                                KSh{{$products->price}}
                            </h6>
                        @else
                        <h6>
                            Price
                            <br>
                            KSh{{$products->price}}
                        </h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            <span style="padding-top: 20px">
                {!! $product ->appends(Request::all())->links() !!}
            </span>
    </div>
    </div>
</section>
<!-- end product section -->
