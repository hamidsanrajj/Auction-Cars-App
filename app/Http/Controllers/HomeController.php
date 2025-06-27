<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Car;
use App\Models\Bidding;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $rs = DB::table('cars')->orderBy('id', 'DESC')->paginate(8);
        $rs3 = DB::table('biddings')->where('car_id','=',$id)->orderBy('id', 'DESC')->take(1)->get();
        $user_id = auth()->user()->id;
        //echo $user_id;
        return view('home',compact('rs','rs3','user_id'));
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $rs1 = DB::table('cars')->where('id','=',$id)->get();
        //echo $rs1;
        return view('detail',compact('rs1','id'));
    }

    public function bid(Request $request) 
    {
        $id = $request->input('id');
        $rs2 = DB::table('cars')->where('id','=',$id)->get();
        $rs3 = DB::table('biddings')->select('bid_amount')->where('car_id','=',$id)->orderBy('id', 'ASC')->take(1)->get();
        $rs5 = DB::table('biddings')->select('bid_amount')->where('car_id','=',$id)->orderBy('id', 'DESC')->take(1)->get();
        $rs6 = DB::table('biddings')->select('bid_amount')->where('car_id','=',$id)->get();
        $rs7 = Bidding::whereRaw('bid_amount = (select max(`bid_amount`) from biddings)')->get();
        //not relevant
        $rs4 = DB::table('biddings')->select('bid_amount')->where('car_id','=',$id)->orderBy('id', 'DESC')->take(1)->get();
        $lot_number = DB::table('biddings')->select('lot_number')->where('car_id','=',$id)->get();
        $lot_number = explode('[{"lot_number":" "}]', $lot_number, 1);
        $lot_number = implode(",",$lot_number);
        $lot_number = trim($lot_number,'[{"lot_number":" "}]');
        $actual_bid = DB::table('biddings')->select('bid_amount')->where('lot_number','=',$lot_number)->orderBy('id', 'ASC')->take(1)->get();
        $current_bid = DB::table('biddings')->select('bid_amount')->where('lot_number','=',$lot_number)->orderBy('id', 'DESC')->take(1)->get();
        $max_bid = DB::table('biddings')->select('bid_amount')->where('lot_number','=',$lot_number)->orderBy('id', 'DESC')->take(1)->get();
        //dd($lot_number->toArray());
        //print_r($rs7);
        //echo $rs7;
        return view('bid',compact('rs2','id','rs3','rs5','actual_bid','current_bid','max_bid'));
    }

    // public function bid_amount(Request $request)
    // {
    //     $id = $request->input('id');
    //     $rs3 = DB::table('biddings')->where('id','=',$id)->get();
    //     return view('bid',compact('rs3'));    
    // }

    public function bid_triggered(Request $request) 
    {
        $id = $request->input('id');
        $rs2 = DB::table('cars')->where('id','=',$id)->get();
        $rs3 = DB::table('biddings')->where('id','=',$id)->orderBy('bid_amount', 'DESC')->take(1)->get();
        //$rs4 = DB::table('biddings')->select('bid_amount')->where('id','=',$id)->orderBy('id', 'DESC')->take(1)->get();
        //echo $rs4;
        return view('bid',compact('rs2','rs3','id'));
    }
}
