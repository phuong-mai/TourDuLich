<?php

namespace App\Http\Controllers;
use DB;
use App\Tour;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $current_date = Carbon::now();
        $tours = DB::table('tour')
            ->join('type', 'tour.type_id', '=', 'type.type_id')

            //->where('price.price_start_date', '>=', $current_date, 'and', '<=', 'price.price_end_date')
            ->paginate(10);
        return view('pages.Tour.tour', ['tours' => $tours]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = DB::table('tour')->get();
        $types = DB::table('type')->get();

        return view('pages.Tour.tour_create', ['tours' => $tours, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $name = DB::table('tour')->where('tour_name', $data['tour'])->get()->first();;
        if($name != null)
        {
            return redirect('/tour')->with('failed',"Tên tour đã tồn tại!");
        }
        else
        {

        try{
            $tour = new Tour;
            $tour->tour_name = $data['tour'];
            $tour->tour_description = $data['description'];
            $tour->type_id = $data['type'];
            $tour->save();
            return redirect('/tour')->with('status',"Thêm thành công.");
        }
        catch(\Exception $e)
        {
            return redirect('/tour')->with('failed',"Thêm không thành công.");
        }
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
        $tours = DB::table('tour')->where('tour.tour_id',$id)->get();
        $types = DB::table('type')->get();
        return view('pages.Tour.tour_update', ['tours' => $tours , 'types' => $types]);
        // $tour = Tour::where('tour_id', '=', $id)->first();
        // return view('pages.Tour.tour_update',compact('tour'));
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
        $data = $request->input();
        try{
            $tour = new Tour();
            $tour->tour_name = $data['tour'];
            $tour->tour_description = $data['description'];
            $tour->type_id = $data['type'];
            DB::update('update tour set tour_name = ?, tour_description = ?, type_id = ?'
            ,[$tour->tour_name, $tour->tour_description, $tour->type_id, $id]);
            return redirect('/tour')->with('status',"Sửa thành công.");
        }
        catch(Exception $e){
            return redirect('/tour')->with('failed',"Sửa không thành công.");
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
        $deleted = Tour::where('tour_id', $id)->delete();
        return redirect()->back();
    }
}
