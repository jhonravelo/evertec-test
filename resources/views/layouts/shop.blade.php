<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Evertec Shop template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('asset/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">


    @yield('estilos')



</head>

<body>

    <div id="app">

        <!-- Menu -->

        <div class="menu">

            <!-- Search -->
            <div class="menu_search">
                <form action="#" id="menu_search_form" class="menu_search_form">
                    <input type="text" class="search_input" placeholder="Search Item" required="required">
                    <button class="menu_search_button"><img src="{{ asset('asset/images/search.png') }}"
                            alt=""></button>
                </form>
            </div>
            <!-- Navigation -->
            <div class="menu_nav">
                <ul>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Kids</a></li>

                </ul>
            </div>
            <!-- Contact Info -->
            <div class="menu_contact">
                <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
                    <div>
                        <div><img src="{{ asset('asset/images/phone.svg') }}"
                                alt="https://www.flaticon.com/authors/freepik"></div>
                    </div>
                    <div>+1 912-252-7350</div>
                </div>
                <div class="menu_social">
                    <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="super_container">

            <!-- Header -->

            <header class="header">
                <div class="header_overlay"></div>
                <div class="header_content d-flex flex-row align-items-center justify-content-start">

                    <div class="logo">
                        <a href="/">
                            <div class="d-flex flex-row align-items-center justify-content-start">
                                <div>
                                    <img src="{{ asset('asset/images/logo_1.png') }}" alt="">
                                </div>
                                <div>Evertec Shop</div>
                            </div>
                        </a>
                    </div>

                    <div class="hamburger">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>

                    <nav class="main_nav">
                        <ul class="d-flex flex-row align-items-start justify-content-start">
                            <li class="active">
                                <a type="button">New</a>
                            </li>
                            <li>
                                <a type="button">Second</a>
                            </li>
                            <li>
                                <a type="button">Favorites</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

                        <!-- Search -->
                        <div class="header_search">
                            <form action="#" id="header_search_form">
                                <input type="text" class="search_input" placeholder="Search Product"
                                    required="required">
                                <button class="header_search_button">
                                    <img src="{{ asset('asset/images/search.png') }}" alt="">
                                </button>
                            </form>
                        </div>

                        <!-- Cart -->
                        <div class="cart"><a type="button" onclick="orderSummary()">
                                <div>
                                    <img class="svg" src="{{ asset('asset/images/cart.svg') }}"
                                        alt="https://www.flaticon.com/authors/freepik">
                                    <div>1</div>
                                </div>
                            </a>
                        </div>

                        <!-- Phone -->
                        <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                            <div>
                                <div><img src="{{ asset('asset/images/phone.svg') }}"
                                        alt="https://www.flaticon.com/authors/freepik"></div>
                            </div>
                            <div>(+571) 379-5628</div>
                        </div>
                    </div>
                </div>
            </header>


            @yield('contenido')

            <!-- Footer -->

            <footer class="footer">
                <div class="footer_content">
                    <div class="container">
                        <div class="row">

                            <!-- About -->
                            <div class="col-lg-4 footer_col">
                                <div class="footer_about">
                                    <div class="footer_logo">
                                        <a type="button">
                                            <div class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="footer_logo_icon">
                                                    <img src="{{ asset('asset/images/logo_2.png') }}" alt="">
                                                </div>
                                                <div>Evertec Shop</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="footer_about_text">
                                        <p>Evertec provides integrated business solutions. We have the ability to group
                                            and provide a wide range of services,
                                            without resorting to the contracting of different suppliers from other
                                            companies.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Contact -->
                            <div class="col-lg-4 footer_col">
                                <div class="footer_contact">
                                    <div class="footer_title">Mantente en contacto</div>
                                    <div class="newsletter">
                                        <form action="#" id="newsletter_form" class="newsletter_form">
                                            <input type="email" class="newsletter_input"
                                                placeholder="Suscríbete a nuestro boletín" required="required">
                                            <button class="newsletter_button">+</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Social -->
                            <div class="col-lg-4 footer_col">
                                <div class="footer_contact text-center">
                                    <div class="footer_title">Social</div>
                                    <ul class="footer_social_list d-flex flex-row align-items-end justify-content-end">
                                        <li><a type="button"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a type="button"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a type="button"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a type="button"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="footer_bar">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div
                                    class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
                                    <div class="copyright order-md-1 order-2">
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <script src="{{ asset('asset/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.js') }}" defer></script>
    <script src="{{ asset('js/shop/shop.js') }}" defer></script>

    @yield('scripts')

</body>

</html>