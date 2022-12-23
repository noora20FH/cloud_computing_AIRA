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
                    <li class="list-group-item"><b>Name: </b>{{$model->prod_name}}</li>
                    <li class="list-group-item"><b>Description: </b>{{$model->description}}</li>
                    <li class="list-group-item"><b>Price: </b>Rp {{$model->price}}</li>
                    <li class="list-group-item"><b>Weight: </b>{{$model->weight}} gram</li>
                    <li class="list-group-item"><b>Stock: </b>{{$model->stock}}</li>
                    <li class="list-group-item"><img src="{{ asset('storage/'.$model->image) }}" class ="cate-image" alt="image here" style="weight: 100px; height: 100px"></li>
                </ul>
            </div>
        <a class="btn btn-success mt-3" href="{{ url('products') }}">Back</a>
        </div>
    </div>
</div>
@endsection