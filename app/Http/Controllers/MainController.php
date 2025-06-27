<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

class MainController extends Controller
{
    //
    public function index(){
        $rs = DB::table('cars')->orderBy('id', 'DESC')->get();
        return view('index',compact('rs'));
    }
}
