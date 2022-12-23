@extends('layouts.crudLayout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Add Store
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{url('storeData')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="form-label">Owner Name</label>
                        <select class="form-control" name="user_id">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Store Name</label>
                        <input type="text" name="storeName" class="form-control" id="phone" aria-describedby="storeName" >
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" aria-describedby="address" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>    
        </div>
    </div>
</div>

@endsection