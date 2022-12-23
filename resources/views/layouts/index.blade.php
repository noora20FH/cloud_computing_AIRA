<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    @include('layouts.partials.head')
</head>

<body>
    <!-- Start Main Top -->
    @include('layouts.partials.mainTop')
    <!-- End Main Top -->

    <!-- Start Main Top -->
    @include('layouts.partials.navBar')
    <!-- End Main Top -->
    @yield('title_bar')
    @yield('content')

    <!-- Start Footer  -->
    @include('layouts.partials.footer')
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2022 <a href="#">AIRA Cosmetics</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="Assets/js/jquery-3.2.1.min.js"></script>
    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="Assets/js/jquery.superslides.min.js"></script>
    <script src="Assets/js/bootstrap-select.js"></script>
    <script src="Assets/js/inewsticker.js"></script>
    <script src="Assets/js/bootsnav.js."></script>
    <script src="Assets/js/images-loded.min.js"></script>
    <script src="Assets/js/isotope.min.js"></script>
    <script src="Assets/js/owl.carousel.min.js"></script>
    <script src="Assets/js/baguetteBox.min.js"></script>
    <script src="Assets/js/form-validator.min.js"></script>
    <script src="Assets/js/contact-form-script.js"></script>
    <script src="Assets/js/custom.js"></script>
</body>

</html>
