<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('song.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search for a song" class="text-slate-950">
                    <button type="submit" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">Search</button>
                </form>

                @if(isset($results))
                        <!-- Card Blog -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Grid -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($results->tracks->items as $item)
                  
                            <!-- Card -->
                        <div class="group flex flex-col h-full bg-white border border-neutral-200 shadow-sm   dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600 dark:text-blue-500">
                            {{ $item->artists[0]->name }}
                            </span>
                            <h3 class="text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">
                            {{ $item->name }}
                            </h3>
                            {{-- <p class="mt-3 text-neutral-500 dark:text-neutral-500">
                            A software that develops products for software developers and developments.
                            </p> --}}
                        </div>
                       
                            <form action="{{ route('rate.store', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="song_name" value="{{ $item->name }}">
                                <button type="submit" name="song_id" value="{{ $item->artists[0]->id }}" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium  bg-white text-neutral-800 shadow-sm hover:bg-neutral-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">Upvote</button>
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
</x-app-layout>
