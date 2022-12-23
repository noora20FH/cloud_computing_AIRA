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
<!-- Start Wishlist  -->

@if(isset($errors)&& $errors != "[]")
<div style="background-color: rgb(233, 135, 135); text-align: center; font-size: 50px; padding: 50px">
    {{ $errors }}
</div>
@else
<div class="wishlist-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product Name</th>
                                <th>Unit Price </th>
                                <th>Stock</th>
                                <th>Add to Cart</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wl)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{$wl->product->image}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                        {{$wl->product->name}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>Rp {{$wl->product->price}}</p>
                                </td>@if ($wl->product->stock > 0)
                                <td class="quantity-box">In Stock</td>
                                @else
                                <td class="quantity-box">Out of  Stock</td>
                                @endif

                                <td class="add-pr">
                                    {{-- <a class="btn hvr-hover" href="#">Add</a> --}}
                                    <form action="/add_to_cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$wl->product['id']}}">
                                        <input type="hidden" name="product_store" value="{{$wl->product['store_id']}}">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    <a href="{{ url('deletewl/'.$wl->id) }}">
                                    </form>
                                </td>
                                <td class="remove-pr">
                                    <a href="{{ url('deletewl/'.$wl->id) }}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- End Wishlist -->

@endsection
