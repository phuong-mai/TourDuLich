<?php

namespace App\Http\Controllers;
use App\Cost;
use App\Tour;
use App\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $costs = Cost::join('group as g', 'cost.group_id', '=', 'g.group_id')
        ->select('cost.*', 'g.group_name as group_name')
        ->paginate(10);
        return view('pages.Cost.cost',compact('costs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        // $tour = Tour::all();
        $group = Group::all();
        return view('pages.Cost.cost_create', compact('group'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Cost;
        $request['cost_total'] = $request->cost_hotel + $request->cost_food + $request->cost_vehicle + $request->cost_another;
        $new->fill($request->all());
        try{
            $new->save();
            return redirect('/cost')->with('success','Thêm thành công.');
        }
        catch(\Exception $e)
        {
            return redirect('/cost')->with('fail','Thêm không thành công.');
          //  return $e;
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
        $show = Cost::where('cost_id', '=', $id)
        ->join('group as g', 'cost.group_id', '=', 'g.group_id')
        ->select('*')
        ->first();
        return view('pages.Cost.cost_detail',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::get();
        $cost = Cost::join('group as g', 'cost.group_id', '=', 'g.group_id')
        ->where('cost.cost_id', '=', $id)
        ->first();
        return view('pages.Cost.cost_update', compact('cost','groups'));
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
        $data = Cost::where('cost_id','=', $request->cost_id)->first();
        $request['cost_total'] = $request->cost_hotel + $request->cost_food + $request->cost_vehicle + $request->cost_another;
        $data->fill($request->all());
        try{
            $data->save();
            return redirect('/cost')->with('success','Sửa thành công.');
        }
        catch(\Exception $e)
        {
            return redirect('/cost')->with('fail','Sửa không thành công.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleted = Cost::where('cost_id',$request->cost_id)->delete();
        return redirect()->back();
    }
}
