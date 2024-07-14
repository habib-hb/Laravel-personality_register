<section>
    <header>
        <h2 id="profile_update_password_form_title" class="text-lg font-medium text-gray-900 ">
            {{--  dark:text-gray-100 --}}
            {{ __('Update Password') }}
        </h2>

        <p id="profile_update_password_form_description" class="mt-1 text-sm text-gray-600 ">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
            {{-- dark:text-gray-400 --}}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label id="update_password_current_password_label" class="text-black" for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label id="update_password_password_label" class="text-black" for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label id="update_password_password_confirmation_label" class="text-black" for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button id="update_password_save_button" class="bg-light_mode_blue hover:opacity-90 text-white font-bold py-2 px-4 rounded" type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    id="profile_password_saved_status"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 "
                    {{-- dark:text-gray-400 --}}
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
