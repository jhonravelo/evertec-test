@extends('layouts.shop')
@section('titulo','EvertecShop')
@section('estilos')

<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css') }}">

@endsection


@section('contenido')

<div class="super_container_inner">
  <div class="super_overlay"></div>
  <div class="products">
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-md-12">
          <h1 id="nameProduct" class="title-section row"></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-xs-12 text-center">
          <img id="image" style="height: 100%;zoom: 0.60">
        </div>
        <div class="cart-summary-section col-xl-6 col-lg-6 col-md-12 col-xs-12">
          <div class="summary-container">
            <h3 class="title-summary style-h3">Customer Information</h3>
            <ul class="summary">
              <li>
                <p>Full name <span class="color-red">*</span></p>
                <input type="text" class="form-control pull-xs-right subtotal-price" id="customer_name"
                  name="customer_name">
              </li>

              <li>
                <p>Email <span class="color-red">*</span></p>
                <input type="text" class="form-control pull-xs-right subtotal-price" id="customer_email"
                  name="customer_email">
              </li>
              <li>
                <p>Phone <span class="color-red">*</span></p>
                <input type="text" class="form-control pull-xs-right subtotal-price" style="margin-bottom: 20px"
                  id="customer_phone" name="customer_phone">
              </li>
              <li class="summary-pay row flex-around" style="border-bottom:0px ">
                <select class="form-control col-md-2" name="quantity" id="quantity">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                <a type="button" class="btn btn-sm btn-primary summary-btn-process-pay col-md-9"
                  style="font-size: 18px;font-weight: bold;color: white" onclick="saveOrder()">
                  Create Order
                </a>
              </li>
            </ul>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>












@endsection

@section('scripts')

<script src="{{ asset('js/shop/order/create.js') }}" defer></script>

@endsection