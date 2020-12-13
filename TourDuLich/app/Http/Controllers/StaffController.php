<?php

namespace App\Http\Controllers;
use App\Staff;
use Illuminate\Http\Request;
use Validator;
use DateTime;
use Illuminate\Database\Eloquent\Builder;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $staffs = Staff::paginate(10);
        return view('pages.Staff.staff',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Staff.staff_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $new = new Staff();
        $validator=Validator::make(($request->all()),$new->rules,$new->message);
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }
        $request['staff_birthday'] =date('Y-m-d H:i:s', strtotime($request->staff_birthday));
        $new->fill($request->all());
        try{
            $new->save();
            return redirect('/staff')->with('success','Thêm thành công.');
        }
        catch(\Exception $e)
        {
            return redirect('staff')->with('failed',"Thêm không thành công.");
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
        $staff=Staff::where('staff_id', '=', $id)->first();
        return view('pages.Staff.staff_detail',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff=Staff::where('staff_id', '=', $id)->first();
        return view('pages.Staff.staff_update',compact('staff'));
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
        $new = Staff::where('staff_id','=', $request->staff_id)->first();
        $validator=Validator::make(($request->all()),$new->rules,$new->message);
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }
        $request['staff_birthday'] =date('Y-m-d H:i:s', strtotime($request->staff_birthday));
        $new->fill($request->all());
        try{
            $new->save();
            return redirect('/staff')->with('success','Sửa thành công.');
        }
        catch(\Exception $e)
        {
            return redirect('/staff')->with('fail','Sửa không thành công.');
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
        $deleted = Staff::where('staff_id',$id)->delete();
        return redirect()->back();
    }
}
