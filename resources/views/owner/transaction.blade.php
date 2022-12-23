@extends('layouts.ownerIndex')
@section('content')
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
                                <th scope="col">No</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Tracking No</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Evidence</th>
                                <th scope="col">Confirmation</th>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td scope="row">{{ date('d-m-Y'), strtotime($order->created_at) }}</td>
                                <td scope="row">{{ $order->tracking_no }}</td>
                                <td scope="row">{{ $order->grand_total }}</td>
                                @if ($order->status == 0)
                                <td scope="row">Process</td>
                                <td scope="row"><img src="{{ asset('storage/'.$order->image_evidence) }}" style="width: 150px; height: 150px;"></td>
                                @elseif ($order->status == 1)
                                <td scope="row">Payment Verified</td>
                                <td scope="row">
                                @foreach($evidence as $ev)
                                    <img src="{{ asset('storage/'.$ev->image_evidence) }}">
                                @endforeach
                                </td>
                                @elseif ($order->status == 2)
                                <td scope="row">Shipping</td>
                                @elseif ($order->status == 3)
                                <td scope="row">Completed</td>
                                @else
                                <td scope="row">Order Reject</td>
                                @endif
                                <td>
                                    @if ($order->status == 0)
                                    <form action=" {{url('/update-order/'.$order->id.'/1')}} " method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Payment Verified</button>
                                    </form>
                                    @endif
                                    @if ($order->status == 1)
                                    <form action=" {{url('/update-order/'.$order->id.'/1')}} " method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Shipping verified</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
