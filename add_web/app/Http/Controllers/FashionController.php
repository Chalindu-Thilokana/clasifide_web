<?php

namespace App\Http\Controllers;

use App\Models\Fashion;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FashionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fashions = Fashion ::all();
        
                


        return view('addmin.fashion',compact('fashions',));
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
    public function show(Fashion $fashion)
    {
        //
        $fashions = auth()->user()->Fashion;
        return view('user.user_fashion',compact('fashions',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fashion $fashion,$id)
    {
        //
       
        $update_data = auth()->user()->Fashion->find($id);

        // uda methord eke wagema auth userge witharak update data ganna karanna puluwan same methord ekek
       // $user = Auth::user();
        //$fashion = $user->Fashion->find($id);
       // dd($update_data);

        return view('user.add_update',compact('update_data',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fashion $fashion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fashion $fashion,$id)
    {
        //
        $fashion = Fashion::find($id);
        $fashion->delete();
        return redirect()->back();
    }
    public function delete(Fashion $fashion,$id)
    {
        //
        $user = Auth::user();
        $fashion = Fashion::find($id);
        
        $user->$fashion->delete();
        return redirect()->back();
    }
}
