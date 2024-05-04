<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Favorite Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
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
                
                @if(isset($favorites))
                        <!-- Card Blog -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Grid -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($favorites as $item)
                  
                            <!-- Card -->
                        <div class="group flex flex-col h-full bg-white border border-neutral-200 shadow-sm   dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-emerald-600 dark:text-emerald-500">
                            {{ $item->song_name }}
                            </span>
                            <h3 class="text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">
                            {{ $item->artist_name }}
                            </h3>
                             
                            <p class="mt-3 text-neutral-600 dark:text-neutral-300">
                            vote {{ $item->count }}
                            </p>
                        </div>
                            
                                 <form action="{{ route('favorite.destroy', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                {{-- if user have liked the song before --}}
                                <button type="submit" name="song_id" value="{{ $item->id }}" 
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium  
                                    bg-white text-neutral-800 shadow-sm hover:bg-neutral-50 
                                    dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">
                                    Downvote</button>
                             </form>
                        </div>
                        <!-- End Card -->
                        @endforeach
                    </div>
                    </div>
               
                @else
                    <p class="content-endml-2 text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">You don't have a favorite song!</p>

                @endif
        </div>
    </div>
</x-app-layout>
