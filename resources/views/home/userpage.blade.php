<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA-TV</title>
@include('home.css')



</head>
<body>
@include('sweetalert::alert')
@include('home.header')

<!-- home section start -->
@include('home.slider')

<!-- about section start -->
@include('home.about')

<!-- services section start -->
@include('home.songs')

@include('home.product')
<!-- teams section start -->

<!-- contact section start -->
@include('home.contact')

<!-- footer section start -->
@include('home.footer')
<!-- script-->
@include('home.script')

</body>
</html>
