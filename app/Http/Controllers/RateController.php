<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        // validate the request 
        // $request->validate([
        //     'name' => 'required',
        //     'song_id' => 'required',
        // ]);

        // echo var_dump($request->name);
        // add song to the database 
        // Rate::updateOrCreate(
        //     ['name' => $request->name, 'song_id' => $request->song_id],
        //     ['count' => Rate::where('name', $request->name)->where('song_id', $request->song_id)->value('count') + 1]
        // );

        $test = new Rate();
        dd($request->all());
        $rate->name = $request->name;
        
        $rate = new Rate();
        $rate->name = $request->name;
        $rate->song_id = $request->song_id;
        $rate->count = Rate::where('name', $request->name)->where('song_id', $request->song_id)->value('count') + 1;
        
        $rate->save();

        dd($rate);
        return redirect()->back()->with('success', 'Rate added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
