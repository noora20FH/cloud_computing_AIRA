<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('users')->where('role_as', '0')->get();
        return view('admin.customerData.customerData', compact('customers'),  [
            "title" => "NAF-STORE-Admin",

        ]);

    }



    public function create()
    {
        $model = new User;
        return view(
            'admin.customerData.customerCreate', 
            compact('model')
    );
    }


    public function store(Request $request)
    {
        $model = new User;
        $model->name = $request->name;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->password = Hash::make($request['phone']);
        $model->address = $request->address;
        $model->postal_code = $request->postal_code;
        $model->save();
        return redirect('customerData');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::find($id);
        return view(
            'admin.customerData.customerDetail', 
            compact('model')
        );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        return view(
            'admin.customerData.customerEdit', 
            compact('model')
    );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'address' => 'required',
            'postal_code' => 'required', 
            ]);
            //Eloquent function to update the data
        $model = User::find($id);
        $model->name = $request->get('name');
        $model->email = $request->get('email');
        
        $model->password = $request->get('phone');
        $model->password =Hash::make($request['phone']); //Hash::make($request['phone']);
        $model->address = $request->get('address');
        $model->postal_code = $request->get('postal_code');

        $model->save();

        return redirect('customerData');
    }
    /**
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $customer=User::where('id', $id);
        $customer->delete();
        return redirect('customerData');

    }
    
    public function profile(Request $request)
    { 
        //validate the data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'postal_code' => 'required', 
            ]);
            //Eloquent function to update the data
        auth()->user()->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'address'=> $request->address,
            'country'=> $request->country,
            'province'=> $request->province,
            'postal_code'=> $request->postal_code,
        ]);

        return redirect('customerData');
    }
}