<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Requests\login_registerRequest;
use App\Models\Customer;
use Database\Seeders\customerSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Illuminate\Support\Facades\Date;


class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::get();
        return view ('customer.preview',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.login_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(login_registerRequest $request)
    {
        $customer=new Customer();
        $customer->firstName=$request->firstName;
        $customer->lastName=$request->lastName;
        $customer->phoneNumber=$request->phoneNumber;
        $customer->emailAddress=$request->emailAddress;
        $customer->save();
        Session::put('store','record stored successfully');
        return $this->index();
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
    public function edit(Customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(login_registerRequest $request, Customer $customer)
    {
        $customer->update([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'phoneNumber'=>$request->phoneNumber,
            'emailAddress'=>$request->emailAddress,
            ]);
        Session::put('update','record updated successfully');
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        Session::put('destroy','record deleted successfully');
        return $this->index();
    }
}
