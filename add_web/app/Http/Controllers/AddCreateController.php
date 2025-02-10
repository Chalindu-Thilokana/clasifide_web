<?php

namespace App\Http\Controllers;

use App\Models\Add_create;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // For authentication

use App\Models\Fashion;
use App\Models\Mobilephone;
use App\Models\Property;
use App\Models\Vehicle;
use App\Models\Catergory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AddCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $subCategorys = SubCategory ::all();
        $catergorys = Catergory ::with('subCategory')->get();
        return view('user.add_create',compact('catergorys','subCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //




    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user ,)
    {
        //\


        $validatedData = $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string|max:36',
            'location' => 'required|string|max:255',
            'phone' => 'required|regex:/\d{10}/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048 |required',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048 |required',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048 |required',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        
$imagePath = null;
if ($request->hasFile('image')) {
    $image = $request->file('image');
   // $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
    $imagePath = $image->store('images', 'public');
}
$imagePath2 = null;
if ($request->hasFile('image2')) {
    $image2 = $request->file('image2');
   // $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
    $imagePath2 = $image2->store('images', 'public');
}

$imagePath3 = null;
if ($request->hasFile('image3')) {
    $image3 = $request->file('image3');
   // $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
    $imagePath3 = $image3->store('images', 'public');
$userId = Auth::id();


 $add_create=Add_create::create([

    'topic' => $validatedData['topic'],
    'description' => $validatedData['description'],
    'location' => $validatedData['location'],
    'price' => $validatedData['price'],
    'phone' => $validatedData['phone'],
    'catergory_id' => $validatedData['category'],
    'image' => $imagePath, // Store image path
    'image2' => $imagePath2, // Store image path
    'image3' => $imagePath3, // Store image path
    'user_id' => $userId,
         
        
   ]);
   
   return redirect()->back();


}
    }

    /**
     * Display the specified resource.
     */
    public function show(Add_create $add_create)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Add_create $add_create)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string|max:36',
            'location' => 'required|string|max:255',
            'phone' => 'required|regex:/\d{10}/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048 ',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048 ',
            'category' => 'required|string|in:Vehicle,Mobilephone,Property,Fashion',
            'price' => 'required|numeric|min:0',
        ]);


        
        
       
        $currentRecord = Fashion::find($id) ?: Mobilephone::find($id) ?: Property::find($id) ?: Vehicle::find($id);

        // If the record exists, determine its current category
     /*  if ($currentRecord) {
            $currentCategory = class_basename($currentRecord); // This gives us 'Fashion', 'Mobilephone', etc.
        } else {
            return redirect()->route('dashboard_user')->withErrors(['error' => 'Record not found.']);
        }*/
    
        // Prepare image paths
        $imagePath = $currentRecord->image ?? null;
        $imagePath2 = $currentRecord->image2 ?? null;
        $imagePath3 = $currentRecord->image3 ?? null;
                    
    
    
        // Assuming $id refers to the current record's ID in the original table
        //$imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

      // $imagePath2 = null;
        if ($request->hasFile('image2')) {
           $image2 = $request->file('image2');
             // $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
           $imagePath2 = $image2->store('images', 'public');
           }

        //  $imagePath3 = null;
        if ($request->hasFile('image3')) {
           $image3 = $request->file('image3');
            // $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
            $imagePath3 = $image3->store('images', 'public');
        }
        $user_Id = Auth::id();
        $currentCategory = null;
        // Fetch the original record from all tables (whichever one has the current entry)
        $fashion = Fashion::find($id);
        $mobilephone = Mobilephone::find($id);
        $property = Property::find($id);
        $vehicle = Vehicle::find($id);
    
        // Find the table that contains the record
        if ($fashion) {
            $currentCategory = 'Fashion';
        } elseif ($mobilephone) {
            $currentCategory = 'Mobilephone';
        } elseif ($property) {
            $currentCategory = 'Property';
        } elseif ($vehicle) {
            $currentCategory = 'Vehicle';
        }
    
        // Check if the category is being changed
        if ($currentCategory !== $validatedData['category']) {
            // Remove the old record from the original table
            switch ($currentCategory) {
                case 'Fashion':
                    $fashion->delete();
                    break;
                case 'Mobilephone':
                    $mobilephone->delete();
                    break;
                case 'Property':
                    $property->delete();
                    break;
                case 'Vehicle':
                    $vehicle->delete();
                    break;
            }
        }
    
        // Now update or create in the new table according to the new category
        switch ($validatedData['category']) {
            case 'Fashion':
                Fashion::updateOrCreate(['id' => $id], [
                    'topic' => $validatedData['topic'],
                    'description' => $validatedData['description'],
                    'phone' => $validatedData['phone'],
                    'image' => $imagePath,
                    'image2' => $imagePath2, // Store image path
                    'image3' => $imagePath3, // Store image path
                    'location' => $validatedData['location'],
                    'category' => $validatedData['category'],
                    'price' => $validatedData['price'],
                    'user_id' => $user_Id,
                    
                ]);
                return redirect()->route('dashboard_user');
               // break;
    
            case 'Mobilephone':
                Mobilephone::updateOrCreate(['id' => $id], [
                    'topic' => $validatedData['topic'],
                    'description' => $validatedData['description'],
                    'phone' => $validatedData['phone'],
                    'image' => $imagePath,
                    'image2' => $imagePath2, // Store image path
                    'image3' => $imagePath3, // Store image path
                    'location' => $validatedData['location'],
                    'category' => $validatedData['category'],
                    'price' => $validatedData['price'],
                    'user_id' => $user_Id,
                ]);
                return redirect()->route('dashboard_user');
                //break;
    
            case 'Property':
                Property::updateOrCreate(['id' => $id], [
                    'topic' => $validatedData['topic'],
                    'description' => $validatedData['description'],
                    'phone' => $validatedData['phone'],
                    'image' => $imagePath,
                    'image2' => $imagePath2, // Store image path
                    'image3' => $imagePath3, // Store image path
                    'location' => $validatedData['location'],
                    'category' => $validatedData['category'],
                    'price' => $validatedData['price'],
                    'user_id' => $user_Id,
                ]);
                return redirect()->route('dashboard_user');
               // break;
    
            case 'Vehicle':
                Vehicle::updateOrCreate(['id' => $id], [
                    'topic' => $validatedData['topic'],
                    'description' => $validatedData['description'],
                    'phone' => $validatedData['phone'],
                    'image' => $imagePath,
                    'image2' => $imagePath2, // Store image path
                    'image3' => $imagePath3, // Store image path
                    'location' => $validatedData['location'],
                    'category' => $validatedData['category'],
                    'price' => $validatedData['price'],
                    'user_id' => $user_Id,
                ]);
                return redirect()->route('dashboard_user');
                //break;
        }
    
    }
    



    public function destroy(Add_create $add_create,$id)
    {
        //
        $add_Create = Add_Create::find($id);
        $add_Create->delete();
        return redirect()->back();
    }

}