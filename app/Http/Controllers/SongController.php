<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\Session as SpotifySession;
use App\Models\Rate;
use App\Models\Like;

class SongController extends Controller
{
    public function search(Request $request)
    {

        // if request is empty
        if (!$request->input('query')) {
            return view('index');
        }

        $collection = collect([1, 2, 3]);
        // dd($collection->all());
        
        // how many songs are user likes
        $likes = Like::where('user_id', auth()->id())->get();

        $rate = new Rate();

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

            return view('index', compact('results', 'likes', 'rate'));
        } else {
            // Handle error when token request fails
            return redirect()->back()->with('error', 'Unable to retrieve access token');
        }
    }
}
?>