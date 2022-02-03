<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>MyBook · @yield("title")</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Maxim Vendor CSS Files -->
        <link href="{{ asset("Maxim/assets/vendor/aos/aos.css") }}" rel="stylesheet">
        <link href="{{ asset("Maxim/assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("Maxim/assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
        <link href="{{ asset("Maxim/assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
        <link href="{{ asset("Maxim/assets/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">
        <link href="{{ asset("Maxim/assets/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">

        <!-- Maxim Template Main CSS File -->
        <link href="{{ asset("Maxim/assets/css/style.css") }}" rel="stylesheet">

        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Developer's CSS files -->
        @yield("styles")
    </head>

    <body>
        
        @include("template.header")

        @yield("main")

        @include("template.footer")

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            //Configure the toastr messages
            toastr.options = {
                "debug": false,
                "positionClass": "toast-bottom-left",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000
            }

            //Display a message from the server if is necessary
            function messageFromServer(){
                @if (Session::get('exception'))
                    toastr.error("{{ Session::get('exception') }}");
                @elseif (Session::get('warning'))
                    toastr.warning("{{ Session::get('warning') }}");
                @elseif (Session::get('success'))
                    toastr.success("{{ Session::get('success') }}");
                @endif
            }

            messageFromServer();

        </script>

        <!-- Maxim Vendor JS Files -->
        <script src="{{ asset("Maxim/assets/vendor/aos/aos.js") }}"></script>
        <script src="{{ asset("Maxim/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("Maxim/assets/vendor/glightbox/js/glightbox.min.js") }}"></script>
        <script src="{{ asset("Maxim/assets/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
        <script src="{{ asset("Maxim/assets/vendor/swiper/swiper-bundle.min.js") }}"></script>
        <script src="{{ asset("Maxim/assets/vendor/php-email-form/validate.js") }}"></script>

        <!-- Maxim Template Main JS File -->
        <script src="{{ asset("Maxim/assets/js/main.js") }}"></script>

        <!-- Developer's scripts -->
        @yield("scripts")
    </body>

</html> 