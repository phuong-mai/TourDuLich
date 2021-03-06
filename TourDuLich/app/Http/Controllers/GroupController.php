<?php

namespace App\Http\Controllers;

use App\Group;
use App\Participant;
use App\Staff;
use App\Tour;
use Exception;
use Illuminate\Http\Request;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::orderBy('group_id', 'asc')->get();
        return view('pages.group.group', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::get();
        return view('pages.group.group_create', ['tours' => $tours]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $group = new Group();
            $group->fill($request->all());
            $group->save();
            return redirect('group')->with('status', 'Thêm thành công.');
        } catch (Exception $ex) {
            return redirect('group')->with('failed', 'Thêm không thành công.');
        }
        //
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
        $group = Group::join('tour', 'group.tour_id', '=', 'tour.tour_id')
            ->where('group.group_id', $id)
            ->get()
            ->first();
        return view('pages.group.group_detail', ['group' => $group]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $groups = Group::join('tour', 'group.tour_id', '=', 'tour.tour_id')
            ->where('group_id', $id)
            ->get();
        $tours = Tour::all();
        return view('pages.group.group_update', ['groups' => $groups, 'tours' => $tours]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $data = $request->all();
        $group = Group::findOrFail($id);
        try {
            $group->update($data);
            return redirect('group')->with('status', "Sửa thành công.");
        } catch (Exception $e) {
            return redirect('group')->with('failed', "Sửa không thành công");
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
        //
        Group::where('group_id', $id)->delete();
        Participant::where('group_id', $id)->delete();
        return redirect()->back();
    }

    public function chooseStaff($id)
    {
        $staffs = Staff::where('staff_id','!=' ,1)->get();
        // $group = new Group();
        // $group->tour_id =
        // $group->group_name = $request->input('group_name');
        // $group->group_start_date = $request->input('group_start_date');
        // $group->group_end_date = $request->input('group_end_date');
        // $group->group_plan = $request->input('group_plan');
        // DB::table('group')->where('group_id', $id)
        //     ->update([
        //         'tour_id' => $group->tour_id,
        //         'group_name' => $group->group_name,
        //         'group_start_date' => $group->group_start_date,
        //         'group_end_date' => $group->group_end_date,
        //         'group_plan' => $group->group_plan
        //     ]);
        // $data = $request->input();
        // $group = new Group();
        // $group->tour_id = $data['tour_id'];
        //     Group::where('group_id', $id)
        //         ->update(['tour_id' => $group->tour_id]);
        $participants = Participant::where('participant.group_id', $id)
                        ->join('group', 'group.group_id', '=', 'participant.group_id')
                        ->get()
                        ->first();
                    $array = explode(',', $participants->participant_staff);
                    $staffs2 = [];
                    foreach ($array as $item) {
                        if($item !=1)
                        {
                        $data = Staff::where('staff_id', $item)
                            ->get()
                            ->first();
                        $staffs2[] = $data;
                                        }
                        $array2=[2,4];
                        // dd( $array2);
                    }
        return view('pages.participant.choose_staff', ['staffs' => $staffs,'staffs2' => $array2,'id'=>$id]);
    }
}
