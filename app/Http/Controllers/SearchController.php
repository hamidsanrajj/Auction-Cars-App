<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    //

    public function search()
    {

        if (isset($_GET['lot_number'])) {

            $lot_number = $_GET['lot_number'];
            
            $rs = DB::table('cars')->where('lot_number','=',$lot_number)->get();
            $rs1 = DB::table('biddings')->select('bid_amount')->where('lot_number','=',$lot_number)->orderBy('id', 'DESC')->get();
            return view('search-result',compact('rs','rs1')); 
            
        }
        else{

            echo "<h1>Error 404</h1>";
            echo "<h2>Page Not Found</h2>";
            //return view('search-result'); 
        }


}



    public function search_store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $place = $request->input('place');
        $city = $request->input('city');


        Search::create([
            'name' => $name,
            'email' => $email,
            'place' => $place,
            'city' => $city,
        ]);


        // $request->validate([
        //             'place' => $place,
        //         ]);


        $place = $place;
        $city = $city;
        
        $rs = DB::table('restaurant')->where('name','like','%'.$place.'%')->get();
        return view('search',compact('rs')); 

    }
    



}
