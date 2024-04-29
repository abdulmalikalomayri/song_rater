<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-950">Search for a song/artist</h1>
                    <form action="{{ route('song.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search for a song" class="text-slate-950">
                    <button type="submit" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow mb-4">Search</button>
                </form>

                {{-- send success alert if vote submited --}}
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                
                @if(isset($results))
                        <!-- Card Blog -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Grid -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($results->tracks->items as $item)
                  
                            <!-- Card -->
                        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm   dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600 dark:text-blue-500">
                            {{ $item->artists[0]->name }}
                            </span>
                            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600 dark:text-blue-500">
                            {{ $item->id }}
                            </span>
                            <div class="block mb-1 text-xs font-semibold uppercase text-blue-600 dark:text-blue-500">
                            @if($item->album->images)
                                <img src="{{ $item->album->images[0]->url }}" alt="image" class="object-cover w-full h-48">
                            @endif
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
                            {{ $item->name }}
                            </h3>
                             
                            {{-- <p class="mt-3 text-gray-500 dark:text-neutral-500">
                            A software that develops products for software developers and developments.
                            </p> --}}
                        </div>
                            @if($rate->join('likes', 'likes.rate_id', '=', 'rates.id')->where('songid', $item->id)->where('likes.user_id', auth()->user()->id)->count() == 0)
                            <form action="{{ route('rate.store', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- Get auth user id --}}
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                                <input type="hidden" name="song_name" value="{{ $item->name }}">
                                {{-- if user haven't rate the song before --}}
                                {{-- @if($rate->where('songid', $item->id)->count() == 0) --}}
                                    <button type="submit" name="song_id" value="{{ $item->id }}" 
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium  
                                    bg-white text-gray-800 shadow-sm hover:bg-gray-50 
                                    dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">
                                    Upvote</button>
                            </form>
                            
                            @else
                                <form action="{{ route('rate.destroy', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                {{-- if user have liked the song before --}}
                                <button type="submit" name="song_id" value="{{ $item->id }}" 
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium  
                                    bg-white text-gray-800 shadow-sm hover:bg-gray-50 
                                    dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">
                                    Downvote</button>
                                @endif
                                <div>{{ $likes->count() }}</div>
                            </form>
                        </div>
                        <!-- End Card -->
                        @endforeach
                    </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>