<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Add_create;
use App\Models\Fashion;
use App\Models\Mobilephone;
use App\Models\Property;
use App\Models\Vehicle;
use App\Models\Catergory;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index()
    {
       
        if(auth::id())
        {
            $userType = auth()->user()->userType;
            if ($userType == 'admin' ){

                $fashion_count = Fashion::count();
                $phone_count = Mobilephone::count();
                $property_count = Property::count();
                $vehicle_count = Vehicle::count();
                $add_creates = Add_create ::all();
               $catergory = Catergory ::all();
                $categories = Catergory::withCount('post')->paginate(8);
               
                

                return view('addmin.admin_view_Dashboard',compact('add_creates','fashion_count','phone_count','property_count','vehicle_count','catergory','categories'));

            }
            /*
           else if ($userType == 'user' ){

                
                return view('user.view_dashbord');

            }
            else{



                return redirect()->back();
            } */
        }
       // 
      
    }
    public function store(Request $request,$id)
    {
        //
        $add_Create = Add_Create::find($id);
       
/*
        switch ($add_Create->category) {
            case 'Fashion':
                Fashion::create([
                    'topic' => $add_Create->topic,
                    'description' => $add_Create->description,
                    'phone' => $add_Create->phone,
                    'image' => $add_Create->image,
                    'image2' => $add_Create->image2,
                    'image3' => $add_Create->image3,
                    'location' => $add_Create->location,
                    'category' => $add_Create->category,
                    'price' => $add_Create->price,
                    'user_id' => $add_Create->user_id,
                ]);
                break;

            case 'Mobilephone':
                Mobilephone::create([
                    'topic' => $add_Create->topic,
                    'description' => $add_Create->description,
                    'phone' => $add_Create->phone,
                    'image' => $add_Create->image,
                    'image2' => $add_Create->image2,
                    'image3' => $add_Create->image3,
                    'category' => $add_Create->category,
                    'location' => $add_Create->location,
                    'price' => $add_Create->price,
                    'user_id' => $add_Create->user_id,
                ]);
                break;

            case 'Property':
                Property::create([
                    'topic' => $add_Create->topic,
                    'description' => $add_Create->description,
                    'phone' => $add_Create->phone,
                    'image' => $add_Create->image,
                    'image2' => $add_Create->image2,
                    'image3' => $add_Create->image3,
                    'category' => $add_Create->category,
                    'location' => $add_Create->location,
                    'price' => $add_Create->price,
                    'user_id' => $add_Create->user_id,
                ]);
                break;

            case 'Vehicle':
                Vehicle::create([
                    'topic' => $add_Create->topic,
                    'description' => $add_Create->description,
                    'phone' => $add_Create->phone,
                    'image' => $add_Create->image,
                    'image2' => $add_Create->image2,
                    'image3' => $add_Create->image3,
                    'category' => $add_Create->category,
                    'location' => $add_Create->location,
                    'price' => $add_Create->price,
                    'user_id' => $add_Create->user_id,
                ]);
                break;

                

    } */

    Post::create([
        'topic' => $add_Create->topic,
        'description' => $add_Create->description,
        'phone' => $add_Create->phone,
        'image' => $add_Create->image,
        'image2' => $add_Create->image2,
        'image3' => $add_Create->image3,
        'catergory_id' => $add_Create->catergory_id,
        'location' => $add_Create->location,
        'price' => $add_Create->price,
        'user_id' => $add_Create->user_id,
    ]);
    

    //email ekat user ge email eka gannw 
    $mail = User::find($add_Create->user_id)->email;


    //dd($mail);
    $data = [
        'title' => 'addvertisment posted!',
        'message' => 'Your advertisement has been successfully posted on [Website Name]. It is now live and visible to potential buyers. You can manage or edit your ad anytime from your dashboard.
Thank you for choosing .'
    ];
     //email mail class eke call karala mail eka yawanw 
    Mail::to($mail)->send(new TestMail($data));



    $add_Create->delete();
    return redirect()->back();



    }

    public function hold(Request $request,$id)
    {  
        $add_Create = Add_Create::find($id);
        $add_Create->update([ 'status'=>'HOLD',


    ]);
    return redirect()->back();


    }


    public function rejected(Request $request,$id)
    {  
        $add_Create = Add_Create::find($id);
        //$add_Create->update([ 'status'=>'HOLD',

        $add_Create->delete();
        return redirect()->back();


    //]);



    }
}
