<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA-TV</title>
    @include('home.css')

    <style>
        .center
        {
            padding: 50px;
            margin: auto;
        }
        table,th,td
        {
            border: 1px solid black;
            font-size: 1.2rem;
            padding: 10px;
            text-align: center;
            margin: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
            table-layout:fixed;

        }
        .th
        {
            background-color: limegreen;
        }


    </style>




</head>
<body>
@include('sweetalert::alert')
@include('home.header')

<!-- home section start -->
<section class="about" id="about" style="background-color: black;color: white">
    <div class="max-width">
        <div class="about-content">
            <div class="center">
                <table class="">
                    <tr>
                        <th class="th">Product Title</th>
                        <th class="th">Quantity</th>
                        <th class="th">Price</th>
                        <th class="th">Payment Section</th>
                        <th class="th">Delivery Status</th>
                        <th class="th">Image</th>
                        <th class="th">Cancel</th>

                    </tr>
                    @foreach($order as $order)
                        <tr>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>KSh.{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td><img style="width: 100px" src="product/{{$order->image}}" ></td>

                            <td>
                                @if($order->delivery_status=='processing')
                                <a onclick="return confirm('Are You sure you want cancel this order')" href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" >Cancel</a>
                                @else
                                <p style="color: red; text-decoration: line-through"> cancelled</p>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>
    <div style="margin-top: 600px"></div>
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
