<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="display: flex;align-items: center; justify-content: center;flex-direction: column">
            <div style="display: flex;justify-content: center;flex-direction: column">
                <div>
                    <x-input-label style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem"  for="name" :value="__('Name')" />
                    <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem"  for="email" :value="__('Email')" />
                    <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem" for="password" :value="__('Password')" />

                    <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;"  id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem"  for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;"  id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div style="display: flex;align-items: -center;justify-content: flex-end" class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>


                </div>

                <x-primary-button style="cursor: pointer;border-radius: 15px;border: 0;color: white;margin-top: 10px; padding: 15px 15px 5px 5px;background-color: rgba(231, 8, 8, 0.925)"  class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>

        <!-- Name -->

    </form>
</x-guest-layout>
