@extends('plantilla.plantilla')
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
            <hr>
            <div class="row">
                <div class="col-lg-9 col-xs-12">
                    <h1 class="title-section row">Shoping cart</h1>
                </div>
                <div class="cart-summary-section col-xl-3 col-lg-3 col-md-12 col-xs-12">
                    <div class="summary-container">
                        <h3 class="title-summary style-h3">Summary of your order</h3>
                        <ul class="summary">
                            <li>
                                <p>Subtotal (1)</p>
                                <span class="price-main-sm pull-xs-right subtotal-price">$1.269.800</span>
                            </li>

                            <li>
                                <p>Envío</p>
                                <span class="price-base-md pull-xs-right shipping-price">Envío gratis</span>
                            </li>

                            <li>
                                <p>Descuento</p>
                                <span class="price-light-md pull-xs-right">-$0</span>
                            </li>

                            <section class="summary-total-pay-section">
                                <li class="summary-total">
                                    <h3>
                                        Total
                                        <span class="price-main-md pull-xs-right"
                                            ng-bind="cart.data.grandTotal|formatMoney">$1.269.800</span>
                                    </h3>
                                </li>
                                <li class="summary-pay row" style="border-bottom:0px ">
                                    <a href="button" class="btn btn-lg btn-primary summary-btn-process-pay col-md-11">
                                        Procesar Compra
                                    </a>
                                </li>
                            </section>
                        </ul>
                        <div class="vertical-usp row">
                            <div class="usp-cart-container row cart-usp">
                                <div class="badge-customer-protection">
                                    <span class="icon sprite-customer-protection"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>



@endsection