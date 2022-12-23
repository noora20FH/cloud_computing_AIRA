@extends('layouts.index')
@section('title_bar')
<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->
<!-- Start Top Search -->
<div class="all-title-box"></div>
<!-- End Top Search -->
@endsection
@section('content')
<!-- Start Cart  -->
@if(isset($errors)&& $errors != "[]")
<div style="background-color: rgb(233, 135, 135); text-align: center; font-size: 50px; padding: 50px">
    {{ $errors }}
</div>
@else
<div class="cart-box-main">
    <div class="container">
        <form action="{{ url('checkout') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{Auth::user()->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="email">Phone *</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="" value="{{Auth::user()->email}}">
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="" value="{{Auth::user()->address}}">
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="postalCode">Postal Code *</label>
                                    <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder=""  value="{{Auth::user()->postal_code}}">
                                    <div class="invalid-feedback"> Please enter your shipping Postal Code. </div>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="province">Province *</label>
                                    <input type="text" class="form-control" name="province" id="province" placeholder=""  value="{{Auth::user()->province}}">
                                    <div class="invalid-feedback"> Please enter your shipping Postal Code. </div>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="country">Country *</label>
                                    <input type="text" class="form-control" name="country" id="country" placeholder="" value="{{Auth::user()->country}}">
                                    <div class="invalid-feedback"> Please enter your shipping Country. </div>
                                    </select>
                                </div>


                            </div>
                            <div class="title-left">
                                <h3>Shipping Method</h3>
                            </div>
                            <div class="title"> <span>Expedition by J&T</span> </div>
                            <div class="d-block my-3">
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input"
                                            checked="checked">
                                        <label>Standard Delivery (JAVA AREA)</label>
                                        <span class="float-right font-weight-bold">Rp 10.000,00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="title-left">
                                <h3>Payment</h3>
                            </div>
                            <h3>We accept payments E-wallet via Linkaja, OVO, GOPAY, SHOPEEPAY, <br>while for banks we accept payments via transfer to BNI</h3>
                            <h2>E-wallet : 08516115085<br>BNI : 6650050060</h2>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload image evidence of transaction</label>
                                <input class="form-control" type="file" id="image" name="image">
                              </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">

                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @php $total = 0; $s1 = 0; $s2 = 0;@endphp
                                    @foreach($carts as $cart)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html">{{$cart->product->name}}</a>
                                            <div class="medium">Rp {{$cart->product->price}}<span class="mx-2">|</span> Qty: {{$cart->product_qty}} <span
                                                    class="mx-2">|</span> Subtotal: Rp {{$cart->product_qty*$cart->product->price}}</div>
                                           
                                        </div>
                                    </div>
                                    @php $total += $cart->product_qty*$cart->product->price; @endphp

                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold">Rp {{$total}}</div>
                                </div>
                                <div class="d-flex">
                                    <h4>Discount</h4>
                                    <div class="ml-auto font-weight-bold">Rp 0</div>
                                </div>
                                <hr>
                                <div class="d-flex">
                                    @if ($s1 == 0 or  $s2 == 0)
                                    @php $shipping = 10000;@endphp
                                    @else
                                    @php $shipping = 20000;@endphp
                                    @endif
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold">Rp {{$shipping}}</div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5">Rp {{$total+=$shipping}}</div>
                                    <input type="hidden" name="grand_total" value="{{$total}}">
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-12 d-flex shopping-box">
                            <button type="submit" class="ml-auto btn hvr-hover">
                            Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
<!-- End Cart -->
@endsection
