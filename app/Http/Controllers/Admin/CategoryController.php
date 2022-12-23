<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function store(Request $request){ //same as store(Request $request)
        // ddd($request); //Dump,Die,Debug
        // return $request->file('image')->store('post-images');
       $category = new Category();
        //    if($request->hasFile('image'))
        //    {
        //        $file = $request->file('image');
        //        $ext = $file->getClientOriginalExtension();
        //        $filename = time().'.'.$ext;
        //        $file->move('assets/uploads/category',$filename);
        //        $category->image = $filename;

        //    }
           if($request->file('image'))
           {
               $category->image = $request->file('image')->store('post-images');

           }
        
       $category->name = $request->input('name');
       $category->slug = $request->input('slug');
       $category->description = $request->input('description');
       $category->status = $request->input('status') == TRUE ? '1':'0';
       $category->popular = $request->input('popular') == TRUE ? '1':'0';
       $category->meta_title = $request->input('meta_title');
       $category->meta_descrip = $request->input('meta_description');
       $category->meta_keywords = $request->input('meta_keywords');
       $category->save();
       return redirect('/dashboard')->with('status',"Category Added Successfully");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view(
            'admin.category.edit', 
            compact('category')
        );
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

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
            $category->image = $request->file('image')->store('post-images');

        }
        $category->name = $request->input('name');
       $category->slug = $request->input('slug');
       $category->description = $request->input('description');
       $category->status = $request->input('status') == TRUE ? '1':'0';
       $category->popular = $request->input('popular') == TRUE ? '1':'0';
       $category->meta_title = $request->input('meta_title');
       $category->meta_descrip = $request->input('meta_description');
       $category->meta_keywords = $request->input('meta_keywords');
       $category->update();
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

        return redirect('dashboard')->with('status','Updated Successfully');
    }

    

    public function destroy($id)
    { 
        User::where('id', $id)->delete();
        return redirect()->route('customerData.index');
        
    }

}
