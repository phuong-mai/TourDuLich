<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('pages.Customer.customer',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Customer.customer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Customer();
        $validator=Validator::make(($request->all()),$new->rules,$new->message);
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }
        $request['customer_birthday'] =date('Y-m-d H:i:s', strtotime($request->customer_birthday));
        $new->fill($request->all());
        try{
            $new->save();
            return redirect('/customer')->with('success','Thêm thành công');
        }
        catch(\Exception $e)
        {
            return redirect('/customer')->with('fail','Thêm thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::where('customer_id','=', $id)->first();
        return view('pages.Customer.customer_detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::where('customer_id', '=', $id)->first();
        return view('pages.Customer.customer_update',compact('customer'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $new = Customer::where('customer_id','=', $request->customer_id)->first();
        $validator=Validator::make(($request->all()),$new->rules,$new->message);
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }
        $request['customer_birthday'] =date('Y-m-d H:i:s', strtotime($request->customer_birthday));
        $new->fill($request->all());
        try{
            $new->save();
            return redirect('/customer')->with('success','thành công');
        }
        catch(\Exception $e)
        {
            return redirect('/customer')->with('fail','không thành công');
        }
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Customer::where('customer_id',$id)->delete();
        return redirect()->back();
    }
}
