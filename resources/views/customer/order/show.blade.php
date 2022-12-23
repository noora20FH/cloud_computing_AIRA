@extends('layouts.customerIndex')
@section('content')
<div class="px-5">
    <h1 class="mt-3 text-center" style="text-transform: uppercase"><b> Order Detail </b></h1>
    <div class="col-md-8">
        <div class="mt-3 mb-5">
            <table class="table table-borderless">
                @foreach($pesan as $order)
                <tr>
                    <th>Name:</th>
                    <td> {{ $order->name }} </td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td> {{ $order->phone }} </td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td>{{ $order->country }}</td>
                </tr>
                <tr>
                    <th>Province:</th>
                    <td>{{ $order->province }}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>
                        {{ $order->address }},
                        {{ $order->postal_code }}
                    </td>
                </tr>
                <tr>
                    <th>Image Evidence:</th>
                    <td><img class="img-fluid img-responsive" src="{{ asset('storage/'.$order->image_evidence) }}"
                            style="height: 300px;"></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mt-3 mb-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td scope="row">{{ $order->name }}</td>
                        <td scope="row">{{ $order->qty }}</td>
                        <td scope="row">{{ $order->price }}</td>
                        <td><img class="img-fluid img-responsive" src="{{ asset('storage/'.$order->image) }}"
                            style="height: 100px; width:100px;"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 