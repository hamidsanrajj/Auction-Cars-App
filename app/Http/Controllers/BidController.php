<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bidding;

class BidController extends Controller
{
    //

    public function index()
    {
        return view('bid');
    }    

    public function bidding(Request $request)
    {
        $car_id = $request->input('car_id');
        $bidder_name = $request->input('name');
        $bidder_email = $request->input('email');
        $bidder_phone = $request->input('phone');
        $bidder_city = $request->input('city');
        $bidder_country = $request->input('country');
        $bid_car_name = $request->input('car_name');
        $lot_number = $request->input('lot_number');
        $location = $request->input('location');
        $bid_amount = $request->input('bid_amount');

        Bidding::create([
            'car_id' => $car_id,
            'bidder_name' => $bidder_name,
            'bidder_email' => $bidder_email,
            'bidder_phone' => $bidder_phone,
            'bidder_city' => $bidder_city,
            'bidder_country' => $bidder_country,
            'bid_car_name' => $bid_car_name, 
            'lot_number' => $lot_number,
            'location' => $location,
            'bid_amount' => $bid_amount,
        ]);

        return view('bid-complete');
        //echo "bid done";        
    }
    
}
