<?php

namespace App\Http\Controllers;

use App\Group;
use App\Participant;
use App\Staff;
use App\Tour;
use Exception;
use GuzzleHttp\Psr7\Message;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

use function Psy\debug;

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
        $tours = DB::table('tour')->get();
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
            $x = $group->id;
            $participant = new Participant();
            $participant->group_id = $x;
            $participant->save();
            return redirect('group/create')->with('status', $x);
        } catch (Exception $ex) {
            return redirect('group')->with('failed', "operation failed");
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
            ->join('participant', 'participant.group_id', '=', 'group.group_id')
            ->where('group.group_id', $id)
            ->get()
            ->first();
        $participant = Participant::where('participant.group_id', $id)
            ->get()
            ->first();
        $array = explode(',', $participant->participant_staff);
        $staffs = [];
        foreach ($array as $item) {
            $staff = Staff::where('staff_id', $item)
                ->get()
                ->first();
            $staffs[] = $staff;
        }
        return view('pages.group.group_detail', ['group' => $group, 'staffs' => $staffs]);
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
        $participant = Participant::where('participant.group_id', $id)
            ->get()
            ->first();
        $array = explode(',', $participant->participant_staff);
        $staffs = [];
        foreach ($array as $item) {
            $staff = Staff::where('staff_id', $item)
                ->get()
                ->first();
            $staffs[] = $staff;
        }
        return view('pages.group.group_update', ['groups' => $groups, 'tours' => $tours, 'staffs' => $staffs]);
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
        //
        $data = $request->input();
        try {
            $group = new Group();
            $group->tour_id = $data['tour_id'];
            dd ($data['tour_id']);
            $group->group_name = $data['group_name'];
            $group->group_start_date = $data['group_start_date'];
            $group->group_end_date = $data['group_end_date'];
            $group->group_plan = $data['group_plan'];
            DB::table('group')->where('group_id', $id)
                ->update([
                    'tour_id' => $group->tour_id,
                    'group_name' => $group->group_name,
                    'group_start_date' => $group->group_start_date,
                    'group_end_date' => $group->group_end_date,
                    'group_plan' => $group->group_plan
                ]);
            return redirect('group')->with('status', "Update successfully");
        } catch (Exception $e) {
            return redirect('group')->with('failed', "Operation failed");
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
        return redirect('group');
    }

    public function chooseStaff($id)
    {
        $staffs = Staff::get();
        $id_group = $id;
        
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
        return view('pages.group.choose_staff', ['staffs' => $staffs, 'id_group' => $id_group]);
    }
}
