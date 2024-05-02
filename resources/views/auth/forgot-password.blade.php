<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-neutral-100 dark:bg-neutral-900">
        <div class="flex flex-col bg-white dark:bg-neutral-700 shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="mb-4 text-sm text-neutral-600 dark:text-neutral-200">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>          
          <div class="relative  h-px bg-neutral-300">
          </div>
          <div class="mt-4">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
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

    
        <div class="flex items-center justify-end mt-4">
            
        </div>
      
              <div class="flex w-full">
                
                <button type="submit" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-emerald-600 hover:bg-emerald-700 rounded py-2 w-full transition duration-150 ease-in">
                  <span class="mr-2 uppercase">Email Password Reset Link</span>
                  <span>
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </span>
                </button>
              </div>
            </form>
          </div>
          <div class="flex justify-center items-center mt-6">
            <a href="{{ route('login')}}" class="inline-flex items-center font-bold text-emerald-500 hover:text-emerald-700 text-xs text-center">
              <span class="ml-2">Go back to login</span>
            </a>
          </div>
        </div>
      </div>
</x-guest-layout>
