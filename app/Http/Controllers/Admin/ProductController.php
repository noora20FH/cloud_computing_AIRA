<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index (){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add (){
        $products = Product::all();
        return view('admin.product.add', compact('products'));
    }

    public function store (Request $request){
        // ddd($request); 
        $products = new Product();
        // if(request->hasFile('image')){
        //     $file = request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename= time(). '.'.$ext;
        //     $file->move('assets/uploads/products/',$filename);
        //     $products->image =$filename;
        // }
        if($request->file('image'))
        {
            $products->image = $request->file('image')->store('post-images');

        }

        $products->prod_name = $request->input('prod_name');
        $products->description = $request->input('description');
        
        $products->price = $request->input('price');
        $products->weight = $request->input('weight');
        $products->stock = $request->input('stock');
        $products->save();
        return redirect('/dashboard')->with('status', "Product Added Successfully");
        
    }
    public function edit($id)
    {
        $products = Product::find($id);
        return view(
            'admin.product.edit', 
            compact('products')
        );
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        // if($request->hasFile('image')){
        //     $path='assets/uploads/category/'.$category->image;
        //     if(File::exists($path)){
        //         File::delete($path);
        //     }

        //     // $file = $request->file('image');
        //     // $ext = $file->getClientOriginalExtension();
        //     // $filename= time(). '.'.$ext;
        //     // $file->move('assets/uploads/products/',$filename);
        //     // $products->image =$filename;

        // }
        if($request->file('image'))
        {
            $products->image = $request->file('image')->store('post-images');

        }
        $products->prod_name = $request->input('prod_name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->weight = $request->input('weight');
        $products->stock = $request->input('stock');
        $products->update();
        // //validate the data
        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required',
        //     // 'password' => 'required',
        //     'address' => 'required',
        //     'postal_code' => 'required', 
        //     ]);
        //     //Eloquent function to update the data
        // $model = User::find($id);
        // $model->name = $request->get('name');
        // $model->phone = $request->get('phone');
        // $model->email = $request->get('email');
        // $model->password = $request->get('phone');
        // $model->address = $request->get('address');
        // $model->postal_code = $request->get('postal_code');
        // $model->save();

        return redirect('products')->with('status','Updated Successfully');
    }

    public function show($id)
    {
        $model = Product::find($id);
        return view(
            'admin.product.detail', 
            compact('model')
        );
    }

    public function destroy(Request $request, $id)
    {
        $products= Product::find($id);
        if($request->file('image'))
        {
            $products->image = $request->file('image')->store('post-images');

        }
        $products->delete();
        return redirect('products');
    }

}