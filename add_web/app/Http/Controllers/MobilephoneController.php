<?php

namespace App\Http\Controllers;

use App\Models\Mobilephone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MobilephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mobilephones = Mobilephone ::all();
                


        return view('addmin.phone',compact('mobilephones',));
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
    public function show(Mobilephone $mobilephone)
    {
        //
        $mobilephones = auth()->user()->Mobilephone;
        return view('user.user_phone',compact('mobilephones',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobilephone $mobilephone,$id)
    {
        //

        $update_data = auth()->user()->Mobilephone->find($id);

        // uda methord eke wagema auth userge witharak update data ganna karanna puluwan same methord ekek
       // $user = Auth::user();
        //$fashion = $user->Fashion->find($id);
       // dd($update_data);

        return view('user.add_update',compact('update_data',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobilephone $mobilephone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobilephone $mobilephone,$id)
    {
        //
        $mobilephone = Mobilephone::find($id);
        $mobilephone->delete();
        return redirect()->back();
    }
    public function delete(Mobilephone $mobilephone,$id)
    {
        //
        $user = Auth::user();
        $mobilephone = Mobilephone::find($id);
        $user->$mobilephone->delete();
        return redirect()->back();
    }
}
