<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __("Informations de l'utilisateur") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Modifier les informations liées à l'utilisateur.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label  style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem" for="name" :value="__('Nom')" />
            <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label  style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem" for="email" :value="__('Email')" />
            <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div style="display:flex; justify-content:center; align-items:center; flex-direction:column">
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button style="cursor: pointer;border-radius: 15px;border: 0;color: white;margin-top: 10px; padding: 10px 25px 10px 25px;background-color: rgba(231, 8, 8, 0.925); font-weight: 800;" form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div style="display:flex; justify-content:center; align-items:center; flex-direction:column" class="flex items-center gap-4">
           <div style="display:flex; justify-content:center; align-items:center; flex-direction:column">
            <x-primary-button style="cursor: pointer;border-radius: 15px;border: 0;color: white;margin-top: 10px; padding: 10px 25px 10px 25px;background-color: rgba(231, 8, 8, 0.925); font-weight: 800;">{{ __('Valider') }}</x-primary-button>

           </div>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Super.') }}</p>
            @endif
        </div>
    </form>
</section>
