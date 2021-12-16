<?php

namespace App\Http\Controllers;

use App\Project;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.home', compact('user'));
    }

    public function results(Request $request)
    {
        // 'https://api.unsplash.com/search/photos?query=office&client_id='
        $search = $request->search;

        return redirect('search/' . urlencode($search));
    }

    public function search(Request $request, $keyword)
    {
        $search = $keyword;
        $client = new Client();

        $url = 'https://api.unsplash.com/search/photos?query='
        . urlencode($search)
        . '&per_page=30&client_id='
        . env('UNSPLASH_KEY');
        $res = $client->request('GET', $url);

        $data = $res->getBody();
        $data = json_decode($data);

        $filtered_data = [];
        $array_info = [];
        $active_inspiration_set = false;

        if (Auth::check()) {
            $active_inspiration = Project::where('user_id', Auth::id())
                ->where('active', 1)
                ->first();

            if (is_object($active_inspiration)) {
                $inspirations_array = $active_inspiration->inspirations;
                $active_inspiration_set = true;

                foreach ($inspirations_array as $image) {
                    array_push($array_info, $image->image_info);
                }
            }
        }

        $filtered_data = $data->results;

        $user = Auth::user();
        return view('pages.results', compact(
            'user',
            'filtered_data',
            'search',
            'array_info',
            'active_inspiration_set'
        ));
    }
}
