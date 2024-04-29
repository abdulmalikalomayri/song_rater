<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\User;

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
    public function store(Rate $rate, Request $request)
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

        // $test = new Rate();
        // dd($request->all());
        // $rate->name = $request->name;
        
        // $rate = new Rate();
        // $rate->name = $request->name;
        // $rate->song_id = $request->song_id;
        // $rate->count = Rate::where('name', $request->name)->where('song_id', $request->song_id)->value('count') + 1;
        
        // $rate->save();

        // dd($rate);

        // create a new rate record if it doesn't exist
         // create a new rate record if it doesn't exist
        // $collection = collect([$request->song_name, $request->song_id]);
        // dd($collection->all());

        // user likes a song
        // get auth user id
        // dd($request->song_id);
        
        
        // if the user have liked the song before, don't add to the rates table and return an error message
        if(Rate::where('name', $request->song_name)->exists()) {
            return redirect()->back()->with('error', 'You have already liked this song');
        }

            // add to rates table
        if(Rate::where('name', $request->song_name)->exists()) {
            
            $increment = Rate::where('name', $request->song_name)->value('count') +1;
            Rate::updateOrCreate(
                ["name" => $request->song_name],
                ["count" => $increment]
                // ['name' => $request->song_name, ]
                // ['count' => Rate::where('name', $request->name)->where('songid', $request->song_id)->value('count') + 1]
                // ['count' => Rate::where('name', $request->name)->value('count') + 1]
            );
        } 
        else {
            Rate::create([
                'name' => $request->song_name,
                'count' => 1
            ]);
        }


        // If the rate exists, increment its count, otherwise create a new rate with count 1
        $rate = Rate::updateOrCreate(
            ["name" => $request->song_name],
            ["count" => Rate::where('name', $request->song_name)->value('count') + 1]
        );

        // Create a new like with the id of the rate that was just created or updated
        $rate->likes()->create([
            'user_id' => 1, // Replace this with the id of the authenticated user
            'rate_id' => $rate->id
        ]);

        return redirect()->back()->with('success', 'Rate added successfully');

        // $rate->likes()->create([
        //     'user_id' => 1,
        //     'rate_id' => 1
        //     // 'rate_id' => Rate::where('name', $request->song_name)->value('id')
            
        // ]);

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
