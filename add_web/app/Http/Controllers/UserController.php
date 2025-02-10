<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Add_create;
use Illuminate\Support\Facades\Auth;
use App\Models\Fashion;
use App\Models\Mobilephone;
use App\Models\Property;
use App\Models\Vehicle;
use App\Models\Catergory;
use App\Models\SubCategory;
class UserController extends Controller
{
    //

    public function index()
    {
       
        if(auth::id())
        {
            $userType = auth()->user()->userType;
            if ($userType == 'user' ){

                $user = Auth::user();

                // userta pamank adala data lorad kirima sadaha
                $fashion = $user->Fashion;
                $fashion_count=$fashion->count();


                $phone = $user->Mobilephone;
                $phone_count=$phone->count();

                $property = $user->Property;
                $property_count=$property->count();

                $vehicle = $user->Vehicle;
                $vehicle_count=$vehicle->count();

               
                $categories = Catergory::withCount('userPosts')->paginate(8);

                //dd($categories);


               
                
               // $subCategorys = SubCategory ::all();
               $add_creates = Add_create::with(['user', 'subCategory', 'catergory'])->get(); // Eager-load user, category, subcategory

                
               // $add_creates =  $user->Add_create;
                
                //$add_creates = Add_create ::all();


                return view('user.view_dashbord',compact('add_creates','fashion_count','phone_count','property_count','vehicle_count','categories',));
               
            }
        }
    }

    public function post()
    {
        
    }

   
}
