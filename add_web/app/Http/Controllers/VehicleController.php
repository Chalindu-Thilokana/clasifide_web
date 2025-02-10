<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $vehicles = Vehicle ::all();
                


        return view('addmin.Vehicle',compact('vehicles',));
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
    public function show(Vehicle $vehicle)
    {
        //
        $vehicles = auth()->user()->Vehicle;
        return view('user.user_vehicle',compact('vehicles',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle,$id)
    {
        //
        $update_data = auth()->user()->Vehicle->find($id);

        // uda methord eke wagema auth userge witharak update data ganna karanna puluwan same methord ekek
       // $user = Auth::user();
        //$fashion = $user->Fashion->find($id);
       // dd($update_data);

        return view('user.add_update',compact('update_data',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle,$id)
    {
        //
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->back();
    }
    public function delete(Vehicle $vehicle,$id)
    {
        //auth user nathuwa wena user kenek roue ekai id ekai gahala awoth delee karanna bari wenna
        $user = Auth::user();
        $vehicle = Vehicle::find($id);
        $user->$vehicle->delete();
        return redirect()->back();
    }
}
