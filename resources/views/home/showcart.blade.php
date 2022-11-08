<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA-TV</title>
    @include('home.css')
    <style>
        .div1
        {
            margin: auto;
            text-align: center;
            padding:30px ;
            width: 70%;

        }
        table,th,td
        {
            border:20px solid black;
        }
        .th_deg
        {
            font-size: 20px;
            padding: 5px;
            background-color: limegreen;

        }
        .img
        {
            width: 100px;
        }
        .total
        {
            font-size: 20px;
            padding: 40px;
        }
    </style>



</head>
<body>
@include('sweetalert::alert')
@include('home.header')

<section class="about" id="about" style="background-color: black;color: white">
    <div class="content-wrapper">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}

            </div>
        @endif
        <!-- home section start -->
        <section class="about" id="about">
            <div class="max-width">
                <div class="div1" >
                    <table>
                        <tr>
                            <th class="th_deg">Product Title</th>
                            <th class="th_deg">Product Quantity</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Action</th>
                        </tr>

                        <?php $totalprice=0; ?>
                        @foreach($cart as $cart)
                            <tr>
                                <td>{{$cart->product_title}}</td>
                                <td>{{$cart->quantity}}</td>
                                <td>KSh.{{$cart->price}}</td>
                                <td><img class="img" src="/product/{{$cart->image}}"></td>
                                <td><a onclick="return confirm('Are Sure You want to drop your product?')" href="{{url('clear_product',$cart->id)}}"><button  style="height: 37px" class="btn btn-danger">Remove</button></a> </td>
                            </tr>
                                <?php $totalprice =$totalprice+$cart->price ?>
                        @endforeach


                    </table>
                    <div>
                        <h1 class="total">Total price: KSh.{{$totalprice}}</h1>
                    </div>

                    <div>Proceed to order</div>
                    <a href="{{url('cash_order')}}" style="padding-bottom: 20px;" class="btn btn-success" >PAY FOR ALBUM</a>
                    <a href="{{url('cash_order')}}" style="padding-bottom: 20px;" class="btn btn-success" >CASH ON DELIVERY</a>
                    <a href="{{url('stripe',$totalprice)}}"  style="padding-bottom: 20px;" class="btn btn-primary">PAY USING CARD</a>
                </div>
            </div>
        </section>

        <div style="padding: 200px">

        </div>



        <!-- about section start -->

        <!-- services section start -->

        <!-- teams section start -->

        <!-- contact section start -->

        <!-- footer section start -->


        <!-- script-->
@include('home.script')

</body>
</html>
