@extends('layouts.admin')
@section('content')
<br/>
<div class="container bg-white">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
            <h1>Customer Data</h1>
            </div><br><br>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ url('customerData/create') }}"> Input Customer Data</a>
            </div>

        </div>
    </div>

    <table class="table-bordered table">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Postal Code</th>

            <th>Action</th>
        </tr>
        @foreach($customers as $value)
        <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->phone}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->address}}</td>
            <td>{{$value->postal_code}}</td>
            <td>
                <!-- <form action="{{ url('customerData/destroy',$value->id) }}" method="POST"> -->

                <a class="btn btn-info" href="{{ url('customerData/show',$value->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ url('customerData/edit',$value->id) }}">Edit</a>
                <a href="{{ url('customerData/destroy/'.$value->id) }}" class="btn btn-danger">Delete</a>

<!--                 
                @csrf
                @method("DELETE")
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
                </form> -->
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
