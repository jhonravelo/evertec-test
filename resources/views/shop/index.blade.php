@extends('layouts.shop')
@section('titulo','EvertecShop')
@section('estilos')

<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css') }}">

@endsection


@section('contenido')

<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- POPULAR PRODUCTS -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">Popular on Evertec Shop</div>
                </div>
            </div>

            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav">
                        <ul class="d-flex flex-row align-items-start justify-content-center">
                            <li class="active"><a type="buttton" class="pointer">New</a></li>
                            <li><a type="buttton" class="pointer">Second</a></li>
                            <li><a type="buttton" class="pointer">Favorites</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row products_row">

                <!-- Product -->

                @foreach($products as $product)

                    <div class="col-xl-4 col-md-6">
                        <div class="product">
                            <div class="product_image">
                                <img src="{{$product->image}}" alt="">
                            </div>
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name">
                                                <a href="product.html">{{$product->description}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <!-- <div class="product_category">In <a href="category.html">Category</a></div> -->
                                        <div class="product_price text-right">{{$product->price}}<span></span></div>
                                    </div>
                                </div>
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div onclick="buyProduct('{{$product->id}}')"
                                            class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                            <div>
                                                <div>
                                                    <img src="{{ asset('asset/images/cart.svg') }}" class="svg" alt="">
                                                    <div>+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    <!-- LO MAS VENDIDO -->

    <div class="lomasvendidocontenedor">
        <div class="section_title text-center">Lo mas vendido</div>
        <br>
        <div class="lomasvendido owl-carousel owl-theme">

            <!-- item-->

            <div class="">
                <div class="product">
                    <div class="product_image">
                        <img src="{{ asset('asset/images/product_5.jpg') }}" alt="">
                    </div>
                    <div class="product_content">
                        <div class="product_info d-flex flex-row align-items-start justify-content-start">
                            <div>
                                <div>
                                    <div class="product_name">
                                        <a href="product.html">Cool Clothing with Brown Stripes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto text-right">
                                <div class="product_category">In <a href="category.html">Category</a></div>
                                <div class="product_price text-right">$3<span>.99</span></div>
                            </div>
                        </div>
                        <div class="product_buttons">
                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                <div onclick="buyProduct()"
                                    class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                    <div>
                                        <div>
                                            <img src="{{ asset('asset/images/cart.svg') }}" class="svg" alt="">
                                            <div>+</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- item-->

            <div class="item">
                <div class="">
                    <div class="product">
                        <div class="product_image">
                            <img src="{{ asset('asset/images/product_6.jpg') }}" alt="">
                        </div>
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <div class="product_name">
                                            <a href="product.html">Cool Clothing with Brown Stripes</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="product_category">In <a href="category.html">Category</a></div>
                                    <div class="product_price text-right">$3<span>.99</span></div>
                                </div>
                            </div>
                            <div class="product_buttons">
                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                    <div onclick="buyProduct()"
                                        class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                        <div>
                                            <div>
                                                <img src="{{ asset('asset/images/cart.svg') }}" class="svg" alt="">
                                                <div>+</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<br>
<br>
<br>
<br>
<br>
<br>

<!-- FEATURES -->

<div class="features">
    <div class="container">
        <div class="row">

            <!-- Feature -->

            <div class="col-lg-4 feature_col">
                <div class="feature d-flex flex-row align-items-start justify-content-start">
                    <div class="feature_left">
                        <div class="feature_icon">
                            <img src="{{ asset('asset/images/icon_1.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                        <div class="feature_title">Pagos rápidos y seguros</div>
                    </div>
                </div>
            </div>

            <!-- Feature -->

            <div class="col-lg-4 feature_col">
                <div class="feature d-flex flex-row align-items-start justify-content-start">
                    <div class="feature_left">
                        <div class="feature_icon ml-auto mr-auto">
                            <img src="{{ asset('asset/images/icon_2.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                        <div class="feature_title">Productos de calidad</div>
                    </div>
                </div>
            </div>

            <!-- Feature -->

            <div class="col-lg-4 feature_col">
                <div class="feature d-flex flex-row align-items-start justify-content-start">
                    <div class="feature_left">
                        <div class="feature_icon">
                            <img src="{{ asset('asset/images/icon_3.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                        <div class="feature_title">Entrega gratis después de $100</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection