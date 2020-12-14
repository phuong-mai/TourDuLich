<?php

namespace App\Http\Controllers;
use DB;
use App\Tour;
use App\Group;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date =date('2020-04-08');
        // $statistical = Tour::join('group as g', 'tour.tour_id', '=', 'g.tour_id')
          $statistical = DB::table('tour')->join('group as g', 'g.tour_id', '=', 'tour.tour_id')
        ->join('cost as c', 'c.group_id', '=', 'g.group_id')
        ->join('price as p', 'p.tour_id', '=', 'g.tour_id')
        ->where('g.group_start_date','>=','p.price_start_date')
        ->where('g.group_start_date','>=','p.price_end_date')
        ->select(
            'g.tour_id AS tour_id',
            'g.group_name AS name',
            'tour.tour_name AS tour_name',

            DB::raw("count(g.tour_id) AS total_groups")
            )
        // ->get();
        ->groupBy('g.tour_id','g.group_name','tour.tour_name')
        ->paginate(10);
        // dd($statistical);
        return view('pages.index', ['statistical' => $statistical]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }
}