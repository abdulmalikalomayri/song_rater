<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<div class="min-h-screen flex flex-col items-center justify-center bg-neutral-300  dark:bg-neutral-900">
    <div class="flex flex-col bg-white dark:bg-neutral-700 shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
      <div class="font-medium self-center text-xl sm:text-2xl uppercase text-neutral-800 dark:text-neutral-100">Create a new account</div>

      <div class="mt-10">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="flex flex-col mb-6">
            <x-input-label for="name" :value="__('Name')"  class="mb-1 text-xs sm:text-sm tracking-wide text-neutral-600" />
            <div class="relative">
              <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-neutral-400">
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
              </div>
              <input id="name" type="name" name="name" class="text-sm sm:text-base placeholder-neutral-500 pl-10 pr-4 rounded-lg border border-neutral-400 w-full py-2 focus:outline-none focus:border-emerald-400" placeholder="Name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
          </div>

          <div class="flex flex-col mb-6">
            <x-input-label for="email" :value="__('Email')"  class="mb-1 text-xs sm:text-sm tracking-wide text-neutral-600" />
            <div class="relative">
              <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-neutral-400">
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
              </div>
              <input id="email" type="email" name="email" class="text-sm sm:text-base placeholder-neutral-500 pl-10 pr-4 rounded-lg border border-neutral-400 w-full py-2 focus:outline-none focus:border-emerald-400" placeholder="E-Mail Address" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
          </div>
          
          <div class="flex flex-col mb-6">
            <x-input-label for="password" :value="__('Password')" class="mb-1 text-xs sm:text-sm tracking-wide text-neutral-600" />
            <div class="relative">
              <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-neutral-400">
                <span>
                  <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                </span>
              </div>
              <x-text-input id="password" class=" text-sm sm:text-base placeholder-neutral-500 pl-10 pr-4 rounded-lg border border-neutral-400 w-full py-2
              focus:outline-none focus:border-emerald-400" placeholder="Password"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                 <x-input-error :messages="$errors->get('password')" class="text-sm sm:text-base placeholder-neutral-500 pl-10 pr-4 rounded-lg border border-neutral-400 w-full py-2 focus:outline-none focus:border-emerald-400" placeholder="Password" />
                 </div>
          </div>


          <div class="flex flex-col mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-1 text-xs sm:text-sm tracking-wide text-neutral-600" />
            <div class="relative">
              <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-neutral-400">
                <span>
                  <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                </span>
              </div>
              <x-text-input id="password_confirmation" class="dark:bg-white text-sm sm:text-base placeholder-neutral-700 pl-10 pr-4 rounded-lg border border-neutral-400 w-full py-2
              focus:outline-none focus:border-emerald-400" placeholder="Confirm Password"
                              type="password"
                              name="password_confirmation"
                              required autocomplete="current-password" />
                 <x-input-error :messages="$errors->get('password_confirmation')" class="text-sm sm:text-base placeholder-neutral-700 pl-10 pr-4 rounded-lg border border-neutral-400 w-full py-2 focus:outline-none focus:border-emerald-400" placeholder=" Confirm Password" />
            </div>
          </div>
          
          <div class="flex w-full">
            <button type="submit" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-emerald-600 hover:bg-emerald-700 rounded py-2 w-full transition duration-150 ease-in">
              <span class="mr-2 uppercase">Sign-up</span>
              <span>
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </span>
            </button>
          </div>

          <div class="flex justify-center items-center mt-6">
            <a href="{{ route('login')}}" class="inline-flex items-center font-bold text-emerald-500 hover:text-emerald-700 text-xs text-center">
              <span>
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
              </span>
              <span class="ml-2">Already have an account.</span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-auth-layout>
