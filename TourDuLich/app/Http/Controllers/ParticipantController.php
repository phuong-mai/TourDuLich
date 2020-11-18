<?php

namespace App\Http\Controllers;

use App\Group;
use App\Participant;
use App\Staff;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use PhpParser\Node\Expr\BinaryOp\Equal;
use Symfony\Component\Console\Input\Input;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $groups = Group::get();
        return view('pages.participant.participant', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
        $staffs = Participant::where('group_id', $id)
            ->get()
            ->first();
        if ($staffs->participant_staff != null) {
            return redirect('group');
        } else {
            Participant::where('group_id', $id)->delete();
            return redirect('group');
        }
    }

    public function update_list($id, $staff)
    {
        if ($staff == null) {
            Participant::where('group_id', $id)->delete();
            return redirect('group');
        } else {
            Participant::where('group_id', $id)
                ->update(['participant_staff' => $staff]);
            return redirect('group');
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
        //
        if (Participant::where('group_id', $id)->get()->first() != null) {
            $participants = Participant::where('participant.group_id', $id)
                ->join('group', 'group.group_id', '=', 'participant.group_id')
                ->get();
            $staffs = Participant::where('participant.group_id', $id)
                ->join('group', 'group.group_id', '=', 'participant.group_id')
                ->select('participant_staff')
                ->first();
            $staff = $staffs->participant_staff;
            $array = explode(',', $staff);
            $staffs = [];
            foreach ($array as $item) {
                $data = Staff::where('staff_id', $item)
                    ->get()
                    ->first();
                $staffs[] = $data;
            }
            return view('pages.participant.participant_update', ['participants' => $participants, 'staff' => $staff, 'staffs' => $staffs]);
        } else {
            $participant = new Participant();
            $participant->group_id = $id;
            $participant->save();
            $participants = Participant::where('participant.group_id', $participant->group_id)
                ->join('group', 'group.group_id', '=', 'participant.group_id')
                ->get()
                ->first();
            $array = explode(',', $participants->participant_staff);
            $staffs = [];
            foreach ($array as $item) {
                $data = Staff::where('staff_id', $item)
                    ->get()
                    ->first();
                $staffs[] = $data;
            }
            return view('pages.participant.participant_create', ['participants' => $participants, 'staffs' => $staffs]);
        }
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
        if ($request->input('participant_staff') != null) {
            $staffs = Participant::where('participant.group_id', $id)
                ->join('group', 'group.group_id', '=', 'participant.group_id')
                ->select('participant_staff')
                ->first();
            $staff = $staffs->participant_staff;
            if ($staff == null) {
                try {
                    $data = $request->input();
                    $participant = new Participant();
                    $participant->participant_staff = join(',', $data['participant_staff']);
                    Participant::where('group_id', $id)
                        ->update(['participant_staff' => $participant->participant_staff]);
                    $participants = Participant::where('participant.group_id', $id)
                        ->join('group', 'group.group_id', '=', 'participant.group_id')
                        ->get()
                        ->first();
                    $array = explode(',', $participants->participant_staff);
                    $staffs = [];
                    foreach ($array as $item) {
                        $data = Staff::where('staff_id', $item)
                            ->get()
                            ->first();
                        $staffs[] = $data;
                    }
                    return view('pages.participant.participant_create', ['participants' => $participants, 'staffs' => $staffs]);
                } catch (Exception $e) {
                    dd($e);
                }
            } else {
                try {
                    $data = $request->input();
                    $participant = new Participant();
                    $participant->participant_staff = join(',', $data['participant_staff']);
                    Participant::where('group_id', $id)
                        ->update(['participant_staff' => $participant->participant_staff]);
                    $participants = Participant::where('participant.group_id', $id)
                        ->join('group', 'group.group_id', '=', 'participant.group_id')
                        ->get();
                    $array = explode(',', join(',', $data['participant_staff']));
                    $staffs = [];
                    foreach ($array as $item) {
                        $data = Staff::where('staff_id', $item)
                            ->get()
                            ->first();
                        $staffs[] = $data;
                    }
                    return view('pages.participant.participant_update', ['participants' => $participants, 'staff' => $staff, 'staffs' => $staffs]);
                } catch (Exception $e) {
                    dd($e);
                }
            }
        } else {
            $participants = Participant::where('participant.group_id', $id)
                ->join('group', 'group.group_id', '=', 'participant.group_id')
                ->get()
                ->first();
            $array = explode(',', $participants->participant_staff);
            $staffs = [];
            foreach ($array as $item) {
                $data = Staff::where('staff_id', $item)
                    ->get()
                    ->first();
                $staffs[] = $data;
            }
            return view('pages.participant.participant_create', ['participants' => $participants, 'staffs' => $staffs]);
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
        Participant::where('group_id', $id)->delete();
        return redirect('group');
    }
}
