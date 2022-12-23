@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
            <div class="card-body">
                <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                   @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="prod_name" value='{{$products->prod_name}}'>
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control" >{{$products->description}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3 ml-3">
                            <label for="">Price</label> 
                            <input type="number" class="form-control" name="price" value='{{$products->price}}'>
                        </div>
                        <div class="col-md-6 mb-3 ml-3">
                            <label for="">Weight</label> 
                            <input type="number" class="form-control" name="weight" value='{{$products->weight}}'>
                        </div>
                        <div class="col-md-6 mb-3 ml-3">
                            <label for="">Stock</label> 
                            <input type="number" class="form-control" name="stock" value='{{$products->stock}}'>
                        </div>
                        <br/>
                        <!-- <div class="col-md-12 ">
                            <input type="file" name="image" class="form-control">
                        </div> -->
                        @if($products->image)
                        <img src="{{ asset('storage/'.$products->image) }}" alt="Product image" class="ml-3">
                        @endif

                        <div class="col-md-12 mb-3">
                            
                            <input class="form-control" type="file" id="image" name="image" >
                        </div>
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>   
                </form>
            </div>
    </div>
@endsection
