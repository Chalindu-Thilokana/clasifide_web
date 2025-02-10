<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $propertys = Property ::all();
                


        return view('addmin.property',compact('propertys',));

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
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
        $propertys = auth()->user()->Property;
        return view('user.user_property',compact('propertys',));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property,$id)
    {
        //
        $update_data = auth()->user()->Property->find($id);

        // uda methord eke wagema auth userge witharak update data ganna karanna puluwan same methord ekek
       // $user = Auth::user();
        //$fashion = $user->Fashion->find($id);
       // dd($update_data);

        return view('user.add_update',compact('update_data',));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property,$id)
    {
        //

        $property = Property::find($id);
        $property->delete();
        return redirect()->back();
    }
    public function delete(Property $property,$id)
    {
        //
        $user = Auth::user();
        $property = Property::find($id);
        $user->$property->delete();
        return redirect()->back();
    }
}
