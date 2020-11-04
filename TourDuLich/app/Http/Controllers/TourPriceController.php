<?php

namespace App\Http\Controllers;
use DB;
use App\TourPrice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TourPriceController extends Controller
{
    public function index() {
        $prices = DB::table('tour_price')->join('tours', 'tour_price.id_tour', '=', 'tours.id')->get();
        //dd($prices);
        return view('pages.price.price', ['prices' => $prices]);
    }
    public function oncreate() {
        $tours = DB::table('tours')->get();
        return view('pages.price.price_create',['tours' => $tours]);
    }

    public function onedit($id) {
        $prices = DB::table('tour_price')->join('tours', 'tour_price.id_tour', '=', 'tours.id')->where('tour_price.id',$id)->get();
        $tours = DB::table('tours')->get();
        return view('pages.price.price_update',['prices'=>$prices,'tours'=>$tours]);
    }

    public function PriceCreate(Request $request){

            $data = $request->input();
			try{
				$price = new TourPrice;
                $price->price = $data['price'];
				$price->id_tour = $data['id_tour'];
                $price->start_day = $data['start_day'];
                $price->end_day = $data['end_day'];
                $price->save();
				return redirect('TourPrice')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('TourPrice')->with('failed',"operation failed");
			}
    }
    public function PriceEdit(Request $request,$id) {
        $data = $request->input();
			try{
                $price = new TourPrice;
                $price->price = $data['price'];
				$price->id_tour = $data['id_tour'];
                $price->start_day = $data['start_day'];
                $price->end_day = $data['end_day'];
                DB::update('update tour_price set price = ?,id_tour=?,start_day=?,end_day=? where id = ?'
                ,[$price->price,$price->id_tour,$price->start_day,$price->end_day,$id]);
                return redirect('TourPrice')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect('TourPrice')->with('failed',"operation failed");
            }
        }

}
