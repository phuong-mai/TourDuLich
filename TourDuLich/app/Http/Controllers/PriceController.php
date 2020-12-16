<?php

namespace App\Http\Controllers;
use App\Price;
use App\Tour;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $prices = Price::join('tour as t', 'price.tour_id', '=', 't.tour_id')
        ->select('*', 't.tour_name as tour_name')
        ->paginate(10);
        return view('pages.Price.price',compact('prices'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        // $tour = Tour::all();
        $tour = Tour::all();
        return view('pages.Price.price_create', compact('tour'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Price;
        $new->fill($request->all());
        try{
            $new->save();
            return redirect('/price')->with('success','Thêm thành công.');
        }
        catch(\Exception $e)
        {
            return redirect('/price')->with('fail','Thêm không thành công.');
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
        $show = Price::where('price_id', '=', $id)
        ->join('tour as t', 'price.tour_id', '=', 't.tour_id')
        ->select('*')
        ->first();
        return view('pages.Price.price_detail',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tours = Tour::get();
        $price = Price::join('tour as t', 'price.tour_id', '=', 't.tour_id')
        ->where('price.price_id', '=', $id)
        ->first();
        return view('pages.Price.price_update', compact('price','tours'));
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
        $data = Price::where('price_id','=', $request->price_id)->first();
        $data->fill($request->all());
        try{
            $data->save();
            return redirect('/price')->with('success','Sửa thành công.');
        }
        catch(\Exception $e)
        {
            return redirect('/price')->with('fail','Sửa không thành công.');
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
        $deleted = Price::where('price_id',$request->price_id)->delete();
        return redirect()->back();
    }
}
