<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-emerald-700 dark:text-emerald-700 leading-tight">
          {{ __('Dashboard') }}
       </h2>
    </x-slot>
    <div class="py-12">
       <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6">
               <div class="w-[417px] h-[200px] relative">
                  <div class="w-[417px] h-[155px] left-0 top-[45px] absolute flex-col justify-start items-start gap-2.5 inline-flex">
                    <img class="w-[417px] h-[155px]" src="https://via.placeholder.com/417x155" />
                    <div class="w-24 h-8 bg-green-400 rounded-2xl"></div>
                    <div class="w-24 h-8 rounded-2xl border-4 border-green-700"></div>
                  </div>
                  <div class="w-[106px] h-[103px] left-[18px] top-0 absolute">
                    <div class="w-[106px] h-[103px] left-0 top-0 absolute bg-red-500 rounded-[68.50px] border-4 border-rose-100"></div>
                    <div class="w-[95px] h-[92px] left-[5px] top-[6px] absolute">
                      <div class="w-[95px] h-[92px] left-0 top-0 absolute bg-red-500 rounded-[68.50px]"></div>
                      <div class="w-[144.59px] h-[72.01px] left-[14px] top-[25px] absolute">
                      </div>
                    </div>
                  </div>
                  <div class="w-[76px] h-[41px] left-[138px] top-[51px] absolute flex-col justify-start items-start inline-flex">
                    <div class="text-gray-700 text-xl font-bold font-['Montserrat']">Waad</div>
                    <div class="text-rose-100/opacity-70 text-sm font-normal font-['Montserrat']">@waad01</div>
                  </div>
                  <div class="w-[330px] h-[68px] left-[45px] top-[125px] absolute text-stone-50 text-base font-normal font-['Montserrat']">Hi ! im trying to design this app is<br/>gonna be amazing</div>
                </div>

                 

                <form action="{{ route('song.search') }}" method="GET">
                    <input  type="text" name="query" placeholder="Search for a song" class="mb-8 mt-8 border-emerald-500 border-input bg-background dark:text-emerald-600 dark:bg-neutral-950
                    ring-offset-background placeholder:text-muted-foreground flex
                    h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm 
                    file:font-medium disabled:cursor-not-allowed disabled:opacity-50 focus:border-emerald-600"/>
                    <button type="submit" class="group relative h-12 w-48 overflow-hidden rounded-lg bg-emerald-600 hover:bg-emerald-700 text-lg shadow mb-4 ">Search</button>
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
                      <div class="group flex flex-col h-full bg-white border border-neutral-200 shadow-sm   dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                         <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-emerald-600 dark:text-emerald-500">
                            {{ $item->artists[0]->name }}
                            </span>
                            {{-- <span class="block mb-1 text-xs font-semibold uppercase text-emerald-600 dark:text-emerald-500">
                            {{ $item->id }}
                            </span> --}}
                            <div class="block mb-1 text-xs font-semibold uppercase text-emerald-600 dark:text-emerald-500">
                               @if($item->album->images)
                               <img src="{{ $item->album->images[0]->url }}" alt="image" class="object-cover w-full h-48">
                               @endif
                            </div>
                            <h3 class="text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">
                               {{ $item->name }}
                            </h3>
                            {{-- 
                            <p class="mt-3 text-neutral-500 dark:text-neutral-500">
                               A software that develops products for software developers and developments.
                            </p>
                            --}}
                         </div>
                         @if($leaderboard->join('favorites', 'favorites.song_id', '=', 'leaderboards.id')->where('leaderboards.song_id', $item->id)->where('favorites.user_id', auth()->user()->id)->count() == 0)
                         <form action="{{ route('favorite.store', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            {{-- Get auth user id --}}
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                            <input type="hidden" name="song_name" value="{{ $item->name }}">
                            <input type="hidden" name="artist_name" value="{{ $item->artists[0]->name }}">
                            {{-- if user haven't favorite the song before --}}
                            {{-- @if($leaderboard->where('songid', $item->id)->count() == 0) --}}
                            <button type="submit" name="song_id" value="{{ $item->id }}" 
                               class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium  
                               bg-white text-neutral-800 shadow-sm hover:bg-neutral-50 
                               dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">
                            Favorite</button>
                         </form>
                         @else
                         <form action="{{ route('favorite.destroy', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- if user have liked the song before --}}
                            <button type="submit" name="song_id" value="{{ $item->id }}" 
                               class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium  
                               bg-white text-neutral-800 shadow-sm hover:bg-neutral-50 
                               dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">
                            Unfavorite</button>
                            @endif
                         </form>
                      </div>
                      <!-- End Card -->
                      @endforeach
                   </div>
                </div>
                @else
                {{-- <p class="content-endml-2 text-xl font-semibold text-neutral-800 dark:text-neutral-300 dark:hover:text-white">No songs found</p> --}}
                @endif
             </div>
          </div>
       </div>
    </div>
 </x-app-layout>