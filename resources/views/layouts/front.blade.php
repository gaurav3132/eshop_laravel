<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>

    <link rel="stylesheet" href="{{ url('public/css/front.css') }}">


</head>
<body>
<div class="container-fluid">

    <div class="row min-vh-100">
        <div class="col-12">
            <header class="row">
                <!-- Top Nav -->
                <div class="col-12 bg-dark py-2 d-md-block d-none">
                    <div class="row">
                        <div class="col-auto me-auto">
                            <ul class="top-nav">

                                <li>
                                    <a href="tel:+123-456-7890"><i class="fa fa-phone-square me-2"></i>+123-456-7890</a>
                                </li>
                                <li>
                                    <a href="mailto:mail@ecom.com"><i class="fa fa-envelope me-2"></i>mail@ecom.com</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-auto">
                            <ul class="top-nav">
                                @auth()

                                @else
                                <li>
                                    <a href="{{ route('register') }}"><i class="fas fa-user-edit me-2"></i>Register</a>
                                </li>
                                <li>
                                    <a href="{{route('login')}}"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Top Nav -->

                <!-- Header -->
                <div class="col-12 bg-white pt-4">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="site-logo text-center text-lg-left">
                                <a href="{{route('front.home.index')}}">E-Commerce</a>
                            </div>
                        </div>
                        <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                            <form action="{{ route('front.pages.search') }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="search" name="term" class="form-control border-dark" placeholder="Search..." required>
                                        <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-auto text-center text-lg-left header-item-holder">
                            <a href="#" class="header-item">
                                <i class="fas fa-heart me-2"></i><span id="header-favorite">0</span>
                            </a>
                            <a href="cart.html" class="header-item">
                                <i class="fas fa-shopping-bag me-2"></i><span id="header-qty" class="me-3">2</span>
                                <i class="fas fa-money-bill-wave me-2"></i><span id="header-price">$4,000</span>
                            </a>
                        </div>
                    </div>

                    <!-- Nav -->
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                            <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="mainNav">
                                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                   @foreach($categories as $category)
                                       <li class="nav-item">
                                           <a href="{{ route('front.pages.category',$category->id) }}" class="nav-link">{{$category->name}}</a>
                                       </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Nav -->

                </div>
                <!-- Header -->

            </header>
        </div>

        @yield('content')

        <div class="col-12 align-self-end">
            <!-- Footer -->
            <footer class="row">
                <div class="col-12 bg-dark text-white pb-3 pt-5">
                    <div class="row">
                        <div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="footer-logo">
                                        <a href="{{url('/')}}">E-Commerce</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <address>
                                        221B Baker Street<br>
                                        London, England
                                    </address>
                                </div>
                                <div class="col-12">
                                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                            <div class="row">
                                <div class="col-12 text-uppercase">
                                    <h4>Who are we?</h4>
                                </div>
                                <div class="col-12 text-justify">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet vel ligula vel sodales. Aenean vel ullamcorper purus, ac pharetra arcu. Nam enim velit, ultricies eu orci nec, aliquam efficitur sem. Quisque in sapien a sem vestibulum volutpat at eu nibh. Suspendisse eget est metus. Maecenas mollis quis nisl ac malesuada. Donec gravida tortor massa, vitae semper leo sagittis a. Donec augue turpis, rutrum vitae augue ut, venenatis auctor nulla. Sed posuere at erat in consequat. Nunc congue justo ut ante sodales, bibendum blandit augue finibus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-3 col-5 ms-lg-auto ms-sm-0 ms-auto mb-sm-0 mb-3">
                            <div class="row">
                                <div class="col-12 text-uppercase">
                                    <h4>Quick Links</h4>
                                </div>
                                <div class="col-12">
                                    <ul class="footer-nav">
                                        <li>
                                            <a href="#">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="#">About Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="#">Terms & Conditions</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4 me-auto mb-sm-0 mb-3">
                            <div class="row">
                                <div class="col-12 text-uppercase text-underline">
                                    <h4>Help</h4>
                                </div>
                                <div class="col-12">
                                    <ul class="footer-nav">
                                        <li>
                                            <a href="#">FAQs</a>
                                        </li>
                                        <li>
                                            <a href="#">Shipping</a>
                                        </li>
                                        <li>
                                            <a href="#">Returns</a>
                                        </li>
                                        <li>
                                            <a href="#">Track Order</a>
                                        </li>
                                        <li>
                                            <a href="#">Report Fraud</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                            <div class="row">
                                <div class="col-12 text-uppercase">
                                    <h4>Newsletter</h4>
                                </div>
                                <div class="col-12">
                                    <form action="#">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Enter your email..." required>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-outline-light text-uppercase">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

</div>

<!-- Messages -->
<div class="toast-container position-fixed bottom-0 start-0 p-3">
    @if($errors->any())

        @foreach($errors->all() as $error)
            <div class="toast align-items-center text-bg-danger border-0 mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{$error}}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="close"></button>
                </div>
            </div>
        @endforeach
    @endif

    @include('flash::message')
</div>
<!-- Messages -->


<script type="text/javascript" src="{{ url('public/js/front.js') }}"></script>
</body>
</html>
