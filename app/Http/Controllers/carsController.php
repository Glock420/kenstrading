<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;

class carsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cars = Car::orderBy('carid', 'desc')->get();
        return view('admin.cars.index',['cars'=>$cars]);
    }

    public function search(Request $request)
    {   
        if(isset($_GET['searchText'])){
            $searchText = $_GET['searchText'];
            $cars = Car::Where('brand','LIKE','%'.$searchText.'%');
            return view('admin.cars.index',['cars'=>$cars]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {   
         $carid = Car::all();
         return view('admin.cars.add-edit',['cars'=>$carid]);
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
            'price' => 'required',
            'carname' => 'required',
            'brand' => 'required',
            'description' => 'required'
        ]);
        
        $p = new Car;
        $p->price = $request->price;
        $p->carname = $request->carname;
        $p->brand = $request->brand;
        $p->description = $request->description;
        $p->save();

        return redirect('cars');
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
    public function edit($carid)
    {
        $cars = Car::find($carid);
        return view('admin.cars.add-edit',['cars'=>$cars]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $carid)
    {
        $request->validate([
            'price' => 'required',
            'carname' => 'required',
            'brand' => 'required',
            'description' => 'required'
        ]);

        $p = Car::find($carid);
        $p->price = $request->price;
        $p->carname = $request->carname;
        $p->brand = $request->brand;
        $p->description = $request->description;
        $p->save();

        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Car::find($id);
        $p->delete();
        return redirect('cars');
    }
}
