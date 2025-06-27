<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    //

    public function index()
    {
        return view('index');
    }

    public function subscribe(Request $request)
    {
        $email = $request->input('email');

        Subscribe::create([
            'email' => $email,
        ]);

        return view('index');
    }


    public function retreive()
    {
        $rs = DB::table('projects')->orderBy('id', 'DESC')->get();
        return view('home',compact('rs')); 
    }

}
