<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">

    <link href=" {{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">


</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('frontend.include.header')

    @yield('body')


    @include('frontend.include.footer')



    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>
    <script>
        // Check if the URL contains a fragment identifier named 'form'
        if (window.location.hash === '#form') {
            // Scroll to the form element
            document.querySelector('#appointment-form').scrollIntoView();
        }
    </script>

</body>

</html>