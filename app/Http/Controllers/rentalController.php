<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rental;
use App\Models\Car;
use App\Models\Customer;

class rentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rentals = Rental::with('customer','car')->orderBy('carid', 'desc')->get();
        return view('admin.rentals.index',['rentals'=>$rentals]);
    }

    public function search(Request $request)
    {   
        if(isset($_GET['searchText'])){
            $searchText = $_GET['searchText'];
            $rentals = Rental::Where('location','LIKE','%'.$searchText.'%');
            return view('admin.rentals.index',['rentals'=>$rentals]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $rentals = Rental::all();
        $customers = Customer::all();
        $cars = Car::all();

        return view('admin.rentals.add-edit',[
        'rentals'=>$rentals,
        'customers'=>$customers,
        'cars'=>$cars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'custid' => 'required',
            'carid' => 'required',
            'rental_start' => 'required|date',
            'rental_expire' => 'required|date',
            'description' => 'required'
        ]);

        //$custid = Customer::where('first_name','LIKE',$request->custid)->pluck('custid')->first();

        $l = new Rental;
        $l->custid = $request->custid;
        $l->carid = $request->carid;
        $l->rental_start = $request->rental_start;
        $l->rental_expire = $request->rental_expire;
        $l->description = $request->description;
        $l->save();

        return redirect('rentals');
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
        $rentals = Rental::find($id);
        $customers = Customer::all();
        $cars = Car::all();

        return view('admin.rentals.add-edit',[
        'rentals'=>$rentals,
        'customers'=>$customers,
        'cars'=>$cars]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $p=Rental::find($id);
    //     $customers = Customer::all();
    //     $cars = Car::all();
    //     $p->custid = $request->$custid;
    //     $p->carid = $request->carid;
    //     $p->rental_start = $request->rental_start;
    //     $p->rental_expire = $request->rental_expire;
    //     $p->description = $request->description;
    //     $p->save();
    //     return redirect('rentals');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Rental::find($id);
        $p->delete();
        return redirect('rentals');
    }
}
