<script src="{{ asset('my/script.js')}}">

    <script src="{{ asset('home/js/jquery-3.4.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{ asset('home/js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{ asset('home/js/bootstrap.js')}}"></script>
<!-- custom js -->
<script src="{{ asset('home/js/custom.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
