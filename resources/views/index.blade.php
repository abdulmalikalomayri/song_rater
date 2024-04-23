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
                    <form action="{{ route('song.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search for a song" class="text-slate-950">
                    <button type="submit" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">Search</button>
                </form>

                @if(isset($results))
                    <ul>
                        @foreach($results->tracks->items as $item)
                            <div class="inline">
                                <li>{{ $item->name }} by {{ $item->artists[0]->name }}</li>
                                <!-- add rate song upvote -->
                                {{-- <form action="{{ route('rate.store') }}" method="PUT"> --}}
                                    <form action="{{ route('rate.store', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="song_name" value="{{ $item->song_name }}">
                                    <button type="submit" name="song_id" value="{{ $item->artists[0]->id }}" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">Upvote</button>
                                </form>
                            <div>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>