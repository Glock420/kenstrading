<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Worker;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Rental;

use Session;
use Hash;

class workerController extends Controller
{
    //load login page
    public function login()
    {
        return view('workerlogin');
    }

    //user login process
    public function loginuser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Worker::where('email','=',$request->email)->first();

        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('loginId',$user->workerid);
                $data = Worker::where('workerid','=',Session::get('loginId'))->first();

                $total_cars = Car::count();
                $total_customers = Customer::count();
                $total_rentals = Rental::count();

                $request->session()->put('fullname', $data->fullname);
                $request->session()->put('acctype', $data->acctype);
                $request->session()->put('user', $data);
                
                return view('admin.dashboard', compact('data'), [
                    'total_cars' => $total_cars,
                    'total_customers' => $total_customers,
                    'total_rentals' => $total_rentals
                ]);
            }
            else
                return back()->with('fail','Wrong password');
        }    
        else
            return back()->with('fail','Account does not exist');
    }

    //load register page
    public function register()
    {
        return view('createaccount');
    }

    //user registration process
    public function registeruser(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:workers',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        $user = new Worker();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $new = $user->save();

        if($new)
        {
            $user2 = Worker::where('email','=',$request->email)->first();
            $request->session()->put('loginId',$user2->workerid);
            $workers = Worker::all();
            return view('accountindex',compact('workers'));
        }
        else
            return back()->with('fails','Registration Failed');
    }

    //load updateaccount page
    public function edit($id)
    {
        $data = Worker::where('workerid','=',$id)->first();
        return view('updateaccount',compact('data'));
    }

    public function edituser(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'password' => 'required',
            'acctype' => 'required'
        ]);

        $workerid = $request->workerid;
        $fullname = $request->fullname;
        $password = $request->password;
        $acctype = $request->acctype;

        Worker::where('workerid','=',$workerid)->update([
            'fullname' => $fullname,
            'password' => Hash::make($password),
            'acctype' => $acctype
        ]);

        $workers = Worker::all();
        return view('accountindex',compact('workers'));
    }

    //loads accountindex page
    public function list()
    {
        $workers = Worker::all();
        return view('accountindex',compact('workers'));
    }

    //user account deletion process
    public function deleteuser($id)
    {
        Worker::where('workerid','=',$id)->delete();
        return back();
    }

    public function aboutus()
    {
        return view('layouts/about');
    }
}
