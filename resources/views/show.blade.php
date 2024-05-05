@extends('layouts.main')
<!-- TAKES FROM THE 'main'.blade.php -->
@section('content')
@php
//dd($movie);
@endphp
<div class="movie-info">
    <div class="movie-info border-b border-primary-600">
        <div class="container mx-auto px-3 py-16 flex flex-col md:flex-row ">
            <img src="{{'https://image.tmdb.org/t/p/w500'.$movie['poster_path']}}" alt="movie" class="w-80 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mb-2">{{ $movie['title'] ?? $movie['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                            <g data-name="Layer 2">
                                <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star" />
                            </g>
                        </svg></span>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 . '%'}}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'] ?? $movie['first_air_date'])->format('M d, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                        {{ $genre['name']}}@if (!$loop->last), @endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 3) <div class="mr-8">
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                    </div>

                    @endif

                    @endforeach

                </div>


                <!-- EMBED WRAPPER -->
                <div x-data="{ isOpen: false }">
                    @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <button @click="isOpen = true" class="inline-flex items-center bg-orange-400 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-500 transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14V8l8 4-8 4z" />
                            </svg>
                            <span class="ml-2">Play Trailer</span>

                        </button>
                    </div>
                    @endif

                    <div style="background-color: rgba(0, 0, 0, 0.5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show.transition.opacity="isOpen">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-primary-700 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button @click="isOpen = false" class="text-3xl leading-none hover:text-secondary">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M18.3 5.71a.996.996 0 00-1.41 0L12 10.59 7.11 5.7A.996.996 0 105.7 7.11L10.59 12 5.7 16.89a.996.996 0 101.41 1.41L12 13.41l4.89 4.89a.996.996 0 101.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    @php
                                    $youtubeKey = $movie['videos']['results']['0']['key'];
                                    foreach($movie['videos']['results'] as $video) {
                                    if ($video['type'] == 'Trailer') {
                                    $youtubeKey = $video['key'];
                                    break;
                                    }
                                    }
                                    @endphp
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{$youtubeKey}}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- WRAPPER ENDS -->

        </div>
    </div>
</div> <!-- END OF MOVIE INFO -->

<!-- CAST FOR THE MOVIE -->

<div class="movie-cast border-b border-primary-600 bg-primary-600">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($movie['credits']['cast'] as $cast)
            @if ($loop->index < 5) <div class="mt-8">
                <img src="{{'https://image.tmdb.org/t/p/w300/'.$cast['profile_path']}}" alt="cast member">
                <div class="mt-4">{{$cast['name']}}</div>
                <div class="text-sm text-gray-400">{{$cast['character']}}</div>
        </div>
        @endif
        @endforeach
    </div>
</div>
</div>

<!-- END OF CAST FOR THE MOVIE -->

<div class="promo-images border-b border-primary-600">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($movie['images']['backdrops'] as $image)
            @if ($loop->index < 9) <div class="mt-8">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="Movie Image">
        </div>
        @endif
        @endforeach
    </div>
</div>


@endsection