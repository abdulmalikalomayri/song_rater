<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\Session as SpotifySession;

class SongController extends Controller
{
    public function search(Request $request)
    {

        // $collection = collect([1, 2, 3]);
        // dd($collection->all());

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

            return view('index', compact('results'));
        } else {
            // Handle error when token request fails
            return redirect()->back()->with('error', 'Unable to retrieve access token');
        }
    }
}
?>