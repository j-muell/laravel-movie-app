@extends('layouts.main')
<!-- TAKES FROM THE 'main'.blade.php -->


@section('content')
<div class="movie-info">
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-3 py-16 flex">
            <img src="{{asset('img/dune2.webp')}}" alt="movie" class="w-96">
            <div class="ml-24">
                <h2 class="text-4xl font-semibold mb-2">Dune: Part II</h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <span><svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                            <g data-name="Layer 2">
                                <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star" />
                            </g>
                        </svg></span>
                    <span class="ml-1">85%</span>
                    <span class="mx-2">|</span>
                    <span>March 1, 2024</span>
                    <span class="mx-2">|</span>
                    <span>Action, Adventure, Drama</span>
                </div>

                <p class="text-gray-300 mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ipsam, velit nihil incidunt provident in dignissimos consectetur dolores mollitia ipsa temporibus aut quis voluptatibus ut modi suscipit doloremque maiores doloribus voluptas accusamus nobis tempore unde porro. Doloribus voluptates, molestiae, minima deserunt laborum, labore quisquam odio maiores magnam illum consequatur provident?

                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Denis Villeneuve</div>
                            <div class="text-sm text-gray-400">Director, Screenplay</div>
                        </div>
                        <div class="ml-8">
                            <div>Frank Herbert</div>
                            <div class="text-sm text-gray-400">Novel</div>
                        </div>
                        <div class="ml-8">
                            <div>John Spaihts</div>
                            <div class="text-sm text-gray-400">Screenplay</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="flex items-center bg-orange-400 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-500 transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14V8l8 4-8 4z" />
                        </svg>
                        <span class="ml-2">Play Trailer</span>

                    </button>
                </div>

            </div>
        </div>



    </div>
</div> <!-- END OF MOVIE INFO -->

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <div class="mt-8">
                <img src="{{asset('img/timothee.webp')}}" alt="">
                <div class="mt-4">Timothee Chalamet</div>
                <div class="text-sm text-gray-400">Paul Atreides</div>
            </div>
            <div class="mt-8">
                <img src="{{asset('img/zendaya.webp')}}" alt="">
                <div class="mt-4">Zendaya</div>
                <div class="text-sm text-gray-400">Chani</div>
            </div>
            <div class="mt-8">
                <img src="{{asset('img/jessica.webp')}}" alt="">
                <div class="mt-4">Rebecca Ferguson</div>
                <div class="text-sm text-gray-400">Jessica</div>
            </div>
            <div class="mt-8">
                <img src="{{asset('img/stilgar.webp')}}" alt="">
                <div class="mt-4">Javier Bardem</div>
                <div class="text-sm text-gray-400">Stilgar</div>
            </div>
            <div class="mt-8">
                <img src="{{asset('img/gurney.webp')}}" alt="">
                <div class="mt-4">Josh Brolin</div>
                <div class="text-sm text-gray-400">Gurney Halleck</div>
            </div>
        </div>
    </div>
</div>




@endsection