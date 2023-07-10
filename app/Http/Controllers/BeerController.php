<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class BeerController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://api.punkapi.com/v2/beers?page=1&per_page=10');

        $beers = $response->json();
        $page = $request->input('page', 1);
        $perPage = 3;
        $beersCollection = new Collection($beers);
        $paginatedBeers = new LengthAwarePaginator(
            $beersCollection->forPage($page, $perPage),
            $beersCollection->count(),
            $perPage,
            $page,
            ['path' => $request->url()]
        );

        return view('beers', ['beers' => $paginatedBeers]);
    }


}
