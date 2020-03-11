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
            <hr>
            <div class="row">
                <div class="col-lg-9 col-xs-12">
                    <div class="row">
                        <h1 class="title-section col-md-12">Shoping cart</h1>
                        {{-- <h1 class="title-section col-md-3">CREATED</h1> --}}
                    </div>
                    <div class="cart-item row">
                        <div class="image-container col-xs-2" style="width: 20%;">
                            <a title="">
                                <img src="{{$order->detail->product->image}}" alt="" class="image-cart">
                            </a>
                        </div>
                        <div class="item-title col-xs-12">
                            <span>
                                <a href="/p/audi-fonos-bluetooth-sennheiser-over-ear-hd-440-wzy13l">
                                    {{$order->detail->product->name}}
                                </a>
                            </span>
                            <div>
                                <span class="badge-condition-type">New</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-8">
                                <div class="price-section">
                                    <div>
                                        <div class="lowest-price">
                                            <span class="price-promotional">$
                                                {{number_format($order->detail->product->price, 2, ',', '.')}}</span>
                                            <span class="sprite sprite-cmr_co-sm"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-xs-12">
                                <div class="delivery-section">

                                    <div class="badge-free-shipping"
                                        ng-show="item.fastestFreeShipping &amp;&amp; item.linioPlusLevel == 0">
                                        <span>FREE Regular Shipping</span>
                                    </div>
                                    <div class="delivery-date">
                                        <p>
                                            {{$order->detail->product->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="amount-section col-md-4">
                                <p>Quantity:</p>
                                <input type="hidden" id="quantity_hidde" value="{{$order->detail->quantity}}">
                                <select id="quantity" name="quantity"
                                    class="form-control form-control-sm ng-valid ng-not-empty ng-touched ng-dirty ng-valid-parse">
                                    <option label="1" value="1">1</option>
                                    <option label="2" value="2">2</option>
                                    <option label="3" value="3">3</option>
                                    <option label="4" value="4">4</option>
                                    <option label="5" value="5">5</option>
                                    <option label="6" value="6">6</option>
                                    <option label="7" value="7">7</option>
                                    <option label="8" value="8">8</option>
                                </select>
                            </div>

                        </div>



                    </div>
                </div>
                <div class="cart-summary-section col-xl-3 col-lg-3 col-md-12 col-xs-12">
                    <div class="summary-container">
                        <h3 class="title-summary style-h3">Summary of your order</h3>
                        <ul class="summary">
                            <li>
                                <p>Subtotal (1)</p>
                                <span class="price-main-sm pull-xs-right subtotal-price">$
                                    {{number_format($order->detail->product->price*$order->detail->quantity, 2, ',', '.')}}</span>
                            </li>

                            <li>
                                <p>Shipping</p>
                                <span class="price-base-md pull-xs-right shipping-price">Free shipping</span>
                            </li>

                            <li>
                                <p>Discount</p>
                                <span class="price-light-md pull-xs-right">- $ {{number_format(0, 2, ',', '.')}}</span>
                            </li>
                            <li>
                                <p>Status</p>
                                <span class="price-light-md pull-xs-right bold" id="statusOrder">{{$order->status}}</span>
                            </li>

                            <section class="summary-total-pay-section">
                                <li class="summary-total">
                                    <h3>
                                        Total
                                        <span class="price-main-md pull-xs-right"
                                            ng-bind="cart.data.grandTotal|formatMoney">$
                                            {{number_format($order->detail->product->price*$order->detail->quantity, 2, ',', '.')}}</span>
                                    </h3>
                                </li>
                                <li class="summary-pay row" style="border-bottom:0px">
                                    <input type="hidden" name="orderId" id="orderId" value="{{$order->id}}">
                                    @if($order->status != "PAYED")
                                        <a type="button" href="#" id="btnContinueTransaction" style="display:none" class="btn btn-lg btn-primary summary-btn-process-pay col-md-11">
                                            Continue Transaction
                                        </a>
                                        <a type="button" onclick="buyOrder('{{$order}}')" id="btnSaveOrder" class="btn btn-lg btn-primary summary-btn-process-pay col-md-11">
                                            Process Purchase
                                        </a>
                                    @endif
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

@section('scripts')

<script src="{{ asset('js/shop/order/cart.js') }}" defer></script>

@endsection