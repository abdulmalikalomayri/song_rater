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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFavorite(Request $request)
    {

        // dd($request->artist_name);

        // check if the user is logged in
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        // if the user have liked the song before, don't add to the leaderboard table and return an error message
        if(Favorites::where('user_id', auth()->id() )->where('song_id', Leaderboard::where('song_id', $request->song_id)->value('id'))->exists()){
            return redirect()->back()->with('error', 'You have already liked this song');
        }

       // if the song has been liked before, increment the count by 1
        if(Leaderboard::where('song_name', $request->song_name)->exists()) {
            $increment = Leaderboard::where('song_name', $request->song_name)->value('count') +1;
            Leaderboard::updateOrCreate(
                ["song_name" => $request->song_name],
                ["song_id" => $request->song_id],
                ["count" => $increment],
                ['artist_name' => $request->artist_name]
            );
        } 
        // if the song have not been liked before, add to the leaderboard table and set the count to 1
        else {
            Leaderboard::create([
                'song_name' => $request->song_name,
                'artist_name' => $request->artist_name,
                'song_id' => $request->song_id,
                'count' => 1
            ]);
        }

        // add to user's favorite table 
        Favorites::create([
            'user_id' => auth()->id(),
            'song_id' => Leaderboard::where('song_id', $request->song_id)->value('id'),
            'artist_name' => $request->artist_name
        ]);

        return redirect()->back()->with('success', 'Song liked successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function destroyFavorite(string $id)
    {
        if(!Leaderboard::where('song_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Rate does not exist');
        }
        else {
            $decrement = Leaderboard::where('song_id', $id)->value('count') - 1;
            Leaderboard::updateOrCreate(
                ["song_id" => $id],
                ["count" => $decrement]
            );

        // if like exists, delete it
        $favorite = Favorites::join('leaderboards', 'favorites.song_id', '=', 'leaderboards.id')
            ->where('favorites.user_id', auth()->id())
            ->where('leaderboards.song_id', $id)
            ->get();

        $favorite[0]->delete();

             
            return redirect()->back()->with('success', 'Rate deleted successfully');
        }
    }


    public function leaderboard() 
    {
        $leaderboard = Leaderboard::orderBy('count', 'desc')->paginate(10);
        return view('leaderboard', compact('leaderboard'));
    }

    // user favorite songs list
    public function favorites() 
    {
        $favorites = Leaderboard::join('favorites', 'favorites.song_id', '=', 'leaderboards.id')->where('favorites.user_id', auth()->user()->id)->get();

        
         
        return view('profile.favoritesongs', compact('favorites'));
    }

}
?>