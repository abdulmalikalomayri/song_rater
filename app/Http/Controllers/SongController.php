<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\Session as SpotifySession;
use App\Models\Leaderboard;
use App\Models\Favorites;

class SongController extends Controller
{

    public function isSongNotFavorited($leaderboard, $item) {
        return $leaderboard->join('favorites', 'favorites.song_id', '=', 'leaderboard.id')
                           ->where('song_id', $item->id)
                           ->where('favorites.user_id', auth()->user()->id)
                           ->count() == 0;
    }

    public function search(Request $request)
    {   
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        // if request is empty
        if (!$request->input('query')) {
            return view('index');
        }

        $collection = collect([1, 2, 3]);
        // dd($collection->all());
        
        // how many songs are user likes
        $likes = Favorites::where('user_id', auth()->id())->get();

        $leaderboard = new Leaderboard();
        // $leaderboard->join('favorites', 'favorites.song_id', '=', 'leaderboard.id')->where('song_id', $item->id)->where('favorites.user_id', auth()->user()->id)->count() == 0;
        

        $session = new SpotifySession(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
         );

        // Request a access token using the Client Credentials Flow
        if ($session->requestCredentialsToken()) {
            $accessToken = $session->getAccessToken();

            $api = new SpotifyWebAPI();
            $api->setAccessToken($accessToken);

            $query = $request->input('query');
            $results = $api->search($query, 'track');

            // dd($results);

            return view('dashboard', compact('results', 'likes', 'leaderboard'));
        } else {
            // Handle error when token request fails
            return redirect()->back()->with('error', 'Unable to retrieve access token');
        }
    }

    public function storeFavorite(Request $request)
    {
        // check if the user is logged in
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        // if the user have liked the song before, don't add to the leaderboard table and return an error message
        if(Favorites::where('user_id', auth()->id() )->where('song_id', Leaderboard::where('song_id', $request->song_id)->value('id'))->exists()){
            return redirect()->back()->with('error', 'You have already liked this song');
        }

        // first time someone is liking the song or the song is not in the leaderboard table
        if(Leaderboard::where('name', $request->song_name)->exists()) {
            $increment = Leaderboard::where('name', $request->song_name)->value('count') +1;
            Leaderboard::updateOrCreate(
                ["name" => $request->song_name],
                ["songid" => $request->song_id],
                ["count" => $increment]
            );
        } 
        // if the song is not in the leaderboard table, increment the count by 1
        else {
            Leaderboard::create([
                'name' => $request->song_name,
                'count' => 1,
                'songid' => $request->song_id
            ]);
        }

        // add to user's favorite table 
        Favorites::create([
            'user_id' => auth()->id(),
            'song_id' => Leaderboard::where('songid', $request->song_id)->value('id')
        ]);

        return redirect()->back()->with('success', 'Song liked successfully');
    }

    public function destroyFavorite(Request $request)
    {
        // check if the user is logged in
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        // check if the user have liked the song before, if not return an error message
        if(!Favorites::where('user_id', auth()->id())->where('song_id', $request->id)->exists()){
            return redirect()->back()->with('error', 'You have not liked this song');
        }

        // delete from user's favorite song table
        Favorites::where('user_id', auth()->id())->where('song_id', $request->id)->delete();

        return redirect()->back()->with('success', 'Song unliked successfully');
    }

}
?>