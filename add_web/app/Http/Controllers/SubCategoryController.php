<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;


use App\Models\Catergory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $catergorys = Catergory ::all();
        
        return view('addmin.sub_catagory',compact('catergorys'));
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
    public function store(Request $request,SubCategory $subCategory,)
    {
        //
        

        $validatedData = $request->validate([
            'topic' => 'required|string|max:255',
         //'logo' => 'nullable|image|mimes:png|max:2048 |required', 
         'catergory' => 'required', // Ensure category exists
        ]);


/*
            $imagePath = null;

         if ($request->hasFile('logo')) {  // Check if 'logo' input field has a file
             $image = $request->file('logo');  // Retrieve the uploaded file
             $imagePath = $image->store('images', 'public');  // Store in storage/app/public/images
             } */

             try {


                $subCategory = SubCategory::create([
                    'name' => $validatedData['topic'],
                    'maincatergory_id' => $validatedData['catergory'] ,
              /* 'logo' => $imagePath,*/  ]);
            return redirect()->route('sub_category_show')->with('success', 'Subcategory created successfully!');
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }

    
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //SubCategory

        $catergorys = Catergory ::all();
        $subcatergorys = SubCategory ::all();

        return view('addmin.view_sub_catagory',compact('catergorys','subcatergorys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory,$id)
    {
        //

        
        //
        $catergorys = Catergory ::all();

        $subCategory = SubCategory::find($id);
        return view('addmin.update_sub_catagory', data: compact('subCategory','catergorys'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory,$id)
    {
        //


       
        
        $validatedData = $request->validate([
            'topic' => 'required|string|max:255',
         //'logo' => 'nullable|image|mimes:png|max:2048 |required', 
         'catergory' => 'required', // Ensure category exists
        ]);


/*
            $imagePath = null;

         if ($request->hasFile('logo')) {  // Check if 'logo' input field has a file
             $image = $request->file('logo');  // Retrieve the uploaded file
             $imagePath = $image->store('images', 'public');  // Store in storage/app/public/images
             } */
             try {
             $subCategory = SubCategory::find($id);


                $subCategory->update([
                    'name' => $validatedData['topic'],
                    'maincatergory_id' => $validatedData['catergory'] ,
              /* 'logo' => $imagePath,*/  ]);
            //return redirect()->route('sub_category_show');
            return redirect()->route('sub_category_show')->with('success', 'Subcategory updatee successfully!');

        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory,$id)
    {
        //

        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->back();

        
    }
}
