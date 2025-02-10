<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Catergory;
use Illuminate\Http\Request;

class CatergoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('addmin.catagory');
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
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
         'logo' => 'nullable|image|mimes:png|max:2048 |required', ]);


            $imagePath = null;

         if ($request->hasFile('logo')) {  // Check if 'logo' input field has a file
             $image = $request->file('logo');  // Retrieve the uploaded file
             $imagePath = $image->store('images', 'public');  // Store in storage/app/public/images
}

            $catergory=Catergory::create([

            'name' => $validatedData['name'], 
               'logo' => $imagePath,  ]);
            return redirect()->route('category_show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catergory $catergory)
    {
        //
        $catergorys = Catergory ::all();
        return view('addmin.view_catagory',compact('catergorys'));
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catergory $catergory,$id)
    {
        //
        $catergory = Catergory::find($id);
        return view('addmin.update_catagory', data: compact('catergory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catergory $catergory,$id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
        'logo' => 'nullable|image|mimes:png|max:2048 ',]);
             

           $currentRecord = Catergory::find($id);
            $imagePath = $currentRecord->logo ?? null;
           
       

       if ($request->hasFile('logo')) {  // Check if 'logo' input field has a file
        $image = $request->file('logo');  // Retrieve the uploaded file
        $imagePath = $image->store('images', 'public');  }// Store in storage/app/public/images
        $catergory = Catergory::find($id);

        
        $catergory->update([

            'name' => $validatedData['name'],
           'logo' => $imagePath, ]);
            

            return redirect()->route('category_show');


        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catergory $catergory,$id)
    {
        //
      
        $catergory = Catergory::find($id);
        $catergory->delete();
        return redirect()->back();
    }


    public function getSubcategories(Request $request, Catergory $catergory, SubCategory $subCategory,)         
    {
        $categoryId = $request->input('category_id');
        $subCategorys = SubCategory::where('category_id', $categoryId)->get();
        return response()->json(['subCategorys' => $subCategorys]); }
    
}
