<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];



        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres
        );


        return view('index', $viewModel);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $media_type = "")
    {
        if (!empty($media_type)) {
            if ($media_type === 'tv') {
                $movie = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/tv/' . $id . '?append_to_response=credits,videos,images')
                    ->json();
            } else {
                $movie = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
                    ->json();
            }
        } else {
            $movie = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
                ->json();
        }

        $viewModel = new MovieViewModel($movie);


        // dump($movie);
        return view('show', $viewModel);
    }
}
