<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                <h1 class="text-2xl font-semibold text-neutral-800 dark:text-neutral-100">Leaderboard</h1>

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

                @if(isset($leaderboard))
                @foreach($leaderboard as $item)
                  
                <!-- Card -->
                <div class="group flex flex-col h-full bg-white border border-neutral-200 shadow-sm   dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-4 md:p-6">
                    <div class="flex">
                        <h3 class="mr-4 text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">
                        {{ $loop->iteration }}
                        </h3>
                        
                        <spadn class="ml-3 text-xs font-semibold uppercase text-emerald-600 dark:text-emerald-500">
                        {{ $item->artist_name }}
                        </span> 
                        
                        <div class="flex justify-between content-end">
                            <h3 class=" content-endml-2 text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">
                                {{ $item->song_name }}
                            </h3> 
                        </div>
                         
                         
                    </div>
                    <div class="text-right content-endml-2 text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">vote {{$item->count}}</div>
                </div>
                
                </div>
                <!-- End Card -->
            @endforeach

 
                @else
                    <p class="content-endml-2 text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">No leaderboard found</p>

                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
