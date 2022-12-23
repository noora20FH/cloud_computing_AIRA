@extends('layouts.crudLayout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Customer Detail
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name: </b>{{$model->name}}</li>
                    <li class="list-group-item"><b>Phone: </b>{{$model->phone}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$model->email}}</li>
                    <li class="list-group-item"><b>Address: </b>{{$model->address}}</li>
                    <li class="list-group-item"><b>Postal Code: </b>{{$model->postal_code}}</li>
                </ul>
            </div>
        <a class="btn btn-success mt-3" href="{{ url('customerData') }}">Back</a>
        </div>
    </div>
</div>
@endsection