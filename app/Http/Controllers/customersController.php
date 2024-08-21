<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

use App\Models\Customer;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('custid', 'desc')->get();
        return view('admin.customers.index',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.add-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $e = new Customer;

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dl' => 'required|digits:11',
            'contact_no' => 'required|digits:11',
            'address' => 'required'
        ]);

        if($request->hasfile('image_path')){
            $file = $request->file('image_path');
            $ext = $file->getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('images/customers/',$filename);
            $e->image_path = $filename;
        }
        $e->first_name = $request->first_name;
        $e->last_name = $request->last_name;
        $e->gender = $request->gender;
        $e->dl = $request->dl;
        $e->contact_no = $request->contact_no;
        $e->address = $request->address;
        $e->save();
        
        return redirect('customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::find($id);
        return view('admin.customers.add-edit',['customers'=>$customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $e=Customer::find($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dl' => 'required|digits:11',
            'contact_no' => 'required|digits:11',
            'address' => 'required'
        ]);

        if($request->hasfile('image_path')){

            // $image_name = $e->image_path;
            // File::delete($image_name);

            // $path = public_path().'/images/customers/'.$e->image_path;
            // unlink($path);

            $file = $request->file('image_path');
            $ext = $file->getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('images/customers/',$filename);
            $e->image_path = $filename;
        }

        $e->first_name = $request->first_name;
        $e->last_name = $request->last_name;
        $e->dl = $request->dl;
        $e->gender = $request->gender;
        $e->contact_no = $request->contact_no;
        $e->address = $request->address;
        $e->save();

        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Customer::find($id);
        if(isset($e->image_path)){
            $path = public_path().'/images/customers/'.$e->image_path;
            unlink($path);
        }
        $e->delete();
        return redirect('customers');
    }
}
