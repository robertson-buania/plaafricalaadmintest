<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Mise à jour du Mot de passe') }}
        </h2>


    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem" for="current_password" :value="__('Ancien Mot de passe')" />
            <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" class="mt-2" />
        </div>

        <div>
            <x-input-label  style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem" for="password" :value="__('Nouveau Mot de passe')" />
            <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;"/>
        </div>

        <div>
            <x-input-label  style="font-size: 1.2rem; padding: 5px 3px 5px 3px;margin-bottom: 1rem" for="password_confirmation" :value="__('Confirmer  Mot de passe')" />
            <x-text-input style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" style="border-radius: 5px;border:0.5px solid rgba(0, 0, 0, 0.212);font-size: 1.2em; padding: 5px 3px 5px 3px;margin-bottom: 1rem;margin-left: 1.7rem;" />
        </div>

        <div style="display:flex; justify-content:center; align-items:center; flex-direction:column" class="flex items-center gap-4">
            <x-primary-button style="display:block;cursor: pointer;border-radius: 15px;border: 0;color: white;margin-top: 10px; padding: 10px 25px 10px 25px;background-color: rgba(231, 8, 8, 0.925); font-weight: 800;">{{ __('Valider') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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
