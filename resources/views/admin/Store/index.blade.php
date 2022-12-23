@extends('layouts.admin')
@section('content')
<br/>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
            <h1>Store Data</h1>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ url('storeData/create') }}"> Input Store Data</a>
            </div>

        </div>
    </div>

    <table class="table-bordered table">
        <tr>
            <th>Owner Name</th>
            <th>Store Name</th>
            <th>Address</th>

            <th>Action</th>
        </tr>
        @foreach($stores as $value)
        <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->storeName}}</td>
            <td>{{$value->address}}</td>
            <td style="width: 30%;">
                <form action="{{ route('storeData.destroy',$value->id) }}" method="POST">            
                @csrf
                @method("DELETE")
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection