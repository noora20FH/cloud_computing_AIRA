@extends('layouts.crudLayout')
@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header" style="background: #000000" >
            <h4 style="color: #ffff">Update Customer Information Data</h4>    

            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Sorry!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ route('customerData.profile') }}" id="myForm"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="address" aria-describedby="phone" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" aria-describedby="address" value="{{Auth::user()->address}}">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" class="form-control" id="country" aria-describedby="country" value="{{Auth::user()->country}}">
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" name="province" class="form-control" id="province" aria-describedby="province" value="{{Auth::user()->province}}">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" id="postal_code" aria-describedby="postal_code" value="{{Auth::user()->postal_code}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>    
        </div>
    </div>
</div>
@endsection