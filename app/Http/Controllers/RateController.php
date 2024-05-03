<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\User;
use App\Models\Like;

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
        
        
        // if the user have liked the song before, don't add to the rates table and return an error message
        if(Like::where('user_id', auth()->id() )->where('rate_id', Rate::where('songid', $request->song_id)->value('id'))->exists()){
            return redirect()->back()->with('error', 'You have already liked this song');
        }

            // add to rates table
        if(Rate::where('name', $request->song_name)->exists()) {
            
            $increment = Rate::where('name', $request->song_name)->value('count') +1;
            Rate::updateOrCreate(
                ["name" => $request->song_name],
                ["songid" => $request->song_id],
                ["count" => $increment]
   
            );
        } 
        else {
            Rate::create([
                'name' => $request->song_name,
                'count' => 1,
                'songid' => $request->song_id
            ]);
        }


        // If the rate exists, increment its count, otherwise create a new rate with count 1
        $rate = Rate::updateOrCreate(
            ["name" => $request->song_name],
            // ["count" => Rate::where('name', $request->song_name)->value('count') + 1]
        );

        // Create a new like with the id of the rate that was just created or updated
        $rate->likes()->create([
            'user_id' => auth()->id(), // Replace this with the id of the authenticated user
            'rate_id' => $rate->id
        ]);

        return redirect()->back()->with('success', 'Rate added successfully');


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
        // check if the rate exists
        // decrement the count of the rate
        if(!Rate::where('songid', $id)->exists()) {
            return redirect()->back()->with('error', 'Rate does not exist');
        }
        else {
            $decrement = Rate::where('songid', $id)->value('count') - 1;
            Rate::updateOrCreate(
                ["songid" => $id],
                ["count" => $decrement]
            );

        // if like exists, delete it
        $likes = Like::join('rates', 'likes.rate_id', '=', 'rates.id')
            ->where('likes.user_id', auth()->id())
            ->where('rates.songid', $id)
            ->get();

        if($likes->count() > 0) {
            Like::where('rate_id', $likes->first()->rate_id)->delete();
        }
            return redirect()->back()->with('success', 'Rate deleted successfully');
        }
        

        
    }
}
