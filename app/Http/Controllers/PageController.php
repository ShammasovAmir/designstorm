<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Project;

class PageController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages.home', compact('user'));
    }

    public function results(Request $request) {
        // 'https://api.unsplash.com/search/photos?query=office&client_id='
        $search = $request->search;
        
        return redirect('search/'.urlencode($search));
    }

    public function search(Request $request, $keyword) {
        $search = $keyword;
        $client = new Client();

        $url = 'https://api.unsplash.com/search/photos?query='
            .urlencode($search)
            .'&per_page=30&client_id='
            .env('UNSPLASH_KEY');
        $res = $client->request('GET', $url);

        $data = $res->getBody();
        $data = json_decode($data);

        $filtered_data  = [];
        $array_info     = [];

        if (Auth::check()) {
            $inspirations_array = Project::where('user_id', Auth::id())
                ->where('active', 1)
                ->first()
                ->inspirations;

            foreach ($inspirations_array as $image) {
                array_push($array_info, $image->image_info);
            }
        }

        foreach ($data->results as $result) {
            $tags = $result->tags;
            foreach ($tags as $tag) {
                $title = strtolower($tag->title);
                switch ($title) {
                    case 'design':
                        array_push($filtered_data, $result);
                        break;
                    case 'product design':
                        array_push($filtered_data, $result);
                        break;
                    case 'web design':
                        array_push($filtered_data, $result);
                        break;
                    case 'app design':
                        array_push($filtered_data, $result);
                        break;
                    case 'architecture design':
                        array_push($filtered_data, $result);
                        break;
                    case 'interior design':
                        array_push($filtered_data, $result);
                        break;
                    case 'ui design':
                        array_push($filtered_data, $result);
                        break;
                    case 'ux design':
                        array_push($filtered_data, $result);
                        break;
                    case 'product':
                        array_push($filtered_data, $result);
                        break;
                    case 'web':
                        array_push($filtered_data, $result);
                        break;
                    case 'app':
                        array_push($filtered_data, $result);
                        break;
                    case 'architecture':
                        array_push($filtered_data, $result);
                        break;
                    case 'interior':
                        array_push($filtered_data, $result);
                        break;
                    case 'ui':
                        array_push($filtered_data, $result);
                        break;
                    case 'ux':
                        array_push($filtered_data, $result);
                        break;
                    default:
                        break;
                }
            }
        }

        $user = Auth::user();
        return view('pages.results', compact(
            'user', 
            'filtered_data', 
            'search', 
            'array_info'
        ));
    }
}
