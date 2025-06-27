<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

class AdminController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('admin/login');
    }

    public function login(Request $request)
    {
        $myusername = $request->input('username');
        $mypassword = $request->input('password');

        $username = "admin";
        $password = "12345";

        if($username == $myusername && $password == $mypassword)
        {
            Session::put('username', $myusername);  
            $rs = Session::get('username');
            $rs1 = DB::table('cars')->select('id')->get()->count();
            $rs2 = DB::table('biddings')->select('id')->get()->count();
            $rs3 = DB::table('users')->select('id')->get()->count();
            return view('admin/admin/dist/pages/admin',compact('rs','rs1','rs2','rs3'));
        }
        else
        {
            echo "<script>alert('Invalid username or password')</script>";
        }
        
    }

    public function logout() {
        Session::flush();
        return view('index');
    }

    public function showDashboard()
    {
        return view('admin/admin/dist/pages/admin');
    }

    public function addCar()
    {
        return view('admin/admin/dist/pages/car');
    }

    public function addBid()
    {
        return view('admin/admin/dist/pages/bid');
    }

    public function addUser()
    {
        return view('admin/admin/dist/pages/user');
    }

    public function adminAddCar(Request $request){

        // $img = $request->input('img');
        // $imageName = time().'.'.$request->img->extension();  
        

        // $image_name = $request->file('img');
        // $imageName = time().'.'.$request->image_name->extension();
        // $doctor->image_name=  $imageName;
        // $request->image->move(public_path('app/public'), $imageName);


        $img1 = $request->input('img1');
        $img2 = $request->input('img2');
        $img3 = $request->input('img3');
        $img4 = $request->input('img4');
        $img5 = $request->input('img5');
        $img6 = $request->input('img6');

        // if($request->has('img1'))
        // {
        //     $img1 = $request->input('img1');
        //     $fileName = pathinfo($img1, PATHINFO_FILENAME);
        //     $extention = pathinfo($img1, PATHINFO_EXTENSION);
        //     $file = $fileName.'.'.$extention;
        //     $path = "/uploads";

            //echo $file;

        //     $upload_success = $img1->move(public_path().$path,$fileName);

        //     if ($upload_success) 
        //     {
        //         echo "uploaded";
        //     }
        //     else
        //     {
        //         echo "cannot upload";
        //     }

        // }
        // else
        // {
        //     echo "No";
        // }


        $name = $request->input('name');
        $location = $request->input('location');
        $lot_number = $request->input('lot_number');
        $vin = $request->input('vin');
        $odometer = $request->input('odometer');
        $retail_Val = $request->input('retail_Val');
        $cylinders = $request->input('cylinders');
        $bodyStyle = $request->input('bodyStyle');
        $color = $request->input('color');
        $engine_type = $request->input('engine_type');
        $transmission = $request->input('transmission');
        $drive = $request->input('drive');
        $vehicle_type = $request->input('vehicle_type');
        $fuel = $request->input('fuel');
        $keys = $request->input('keys');
        $highlight = $request->input('highlight');
        $primary_damage = $request->input('primary_damage');

        Car::create([
            'img1' => $img1,
            'img2' => $img2,
            'img3' => $img3,
            'img4' => $img4,
            'img5' => $img5,
            'img6' => $img6,
            'name' => $name,
            'location' => $location,
            'lot_number' => $lot_number,
            'vin' => $vin,
            'odometer' => $odometer,
            'retail_Val' => $retail_Val,
            'cylinders' => $cylinders,
            'bodyStyle' => $bodyStyle,
            'color' => $color,
            'engine_type' => $engine_type,
            'transmission' => $transmission,
            'vehicle_type' => $vehicle_type,
            'fuel' => $fuel,
            'keys' => $keys,
            'highlight' => $highlight,
            'primary_damage' => $primary_damage,
        ]);

        $rs = "1";
        return view('admin/admin/dist/pages/admin',compact('rs'));
    }

    public function retreiveCar(){
        $rs = DB::table('cars')->orderBy('id', 'DESC')->get();
        return view('index',compact('rs'));         
    }

    public function results()
    {
        $rs = DB::table('cars')->orderBy('id', 'DESC')->get();
        return view('admin/admin/dist/pages/admin',compact('rs'));         
    }
}
