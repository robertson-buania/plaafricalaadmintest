<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status  class="mb-4 d-flex justify-content-center align-items-center" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div  style="display: flex;align-items: center; justify-content: center;flex-direction: column">
            <div style="display: flex; justify-content: center;flex-direction: column">
                <div>
                    <x-input-label style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem" for="email" :value="__('Email')" />
                    <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;"  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error  :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem"  for="password" :value="__('Password')" />

                    <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem"  id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" style="font-size: 1.5rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem"  class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class=" mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div style="display: flex;align-items: -center;justify-content: flex-end" class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif


                </div>
                <x-primary-button style="cursor: pointer;border-radius: 15px;border: 0;color: white;margin-top: 10px; padding: 15px 15px 5px 5px;background-color: rgba(231, 8, 8, 0.925)" class="ml-3 btn btn-primary">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

        </div>

    </form>

</x-guest-layout>
