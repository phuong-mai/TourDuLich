<?php

namespace App\Http\Controllers;
use DB;
use DateTime;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PriceController extends Controller
{
    public function index() {
        $prices = DB::table('price')->join('tour', 'price.tour_id', '=', 'tour.tour_id')->get();
        foreach($prices as $price)
        {
            if($price->price_start_date)
            $price->price_start_date = date_format(new DateTime($price->price_start_date), 'd-m-Y ') ;
            if($price->price_end_date)
            $price->price_end_date = date_format(new DateTime($price->price_end_date), 'd-m-Y ') ;
        }
        //dd(typeof($prices[16]->price_start_date));
        return view('pages.price.price', ['prices' => $prices]);
    }

    public function oncreate() {
        $tours = DB::table('tour')->get();
        return view('pages.price.price_create',['tours' => $tours]);
    }

    public function onedit($id) {
        $prices = DB::table('price')->join('tour', 'price.tour_id', '=', 'tour.tour_id')->where('price.price_id',$id)->get();
        $tours = DB::table('tour')->get();
        foreach($prices as $price)
        {
            if($price->price_start_date)
            $price->price_start_date = date_format(new DateTime($price->price_start_date), 'd-m-Y ') ;
            if($price->price_end_date)
            $price->price_end_date = date_format(new DateTime($price->price_end_date), 'd-m-Y ') ;
        }
        return view('pages.price.price_update',['prices'=>$prices,'tours'=>$tours]);
    }

    public function PriceCreate(Request $request){
            $data = $request->input();
			try{
				$price = new Price;
                $price->price_value = $data['price'];
				$price->tour_id = $data['tour_id'];
                $price->price_start_date = $data['start_day'];
                $price->price_end_date = $data['end_day'];
                $price->save();
				return redirect('price')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('price')->with('failed',"operation failed");
			}
    }
    public function PriceEdit(Request $request,$id) {
        $data = $request->input();
			try{
                $price = new Price;
                $price->price_value = $data['price'];
				$price->tour_id = $data['tour_id'];
                $price->price_start_date = $data['start_day'];
                $price->price_end_date = $data['end_day'];
                DB::update('update price set price_value = ?,tour_id=?,price_start_date=?,price_end_date=? where price_id = ?'
                ,[$price->price_value,$price->tour_id,$price->price_start_date,$price->price_end_date,$id]);
                return redirect('price')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect('price')->with('failed',"operation failed");
            }
        }

}
