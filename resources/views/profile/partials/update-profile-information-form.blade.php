<section>
    <header>
        <h2 id="profile_update_information_form_title" class="text-lg font-medium text-gray-900 ">
            {{ __('Profile Information') }}
            {{-- dark:text-gray-100 --}}
        </h2>

        <p id="profile_update_information_form_description" class="mt-1 text-sm text-gray-600 ">
            {{ __("Update your account's profile information and email address.") }}
            {{-- dark:text-gray-400 --}}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label id="profile_name_label" class="text-black" for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label id="profile_email_label" for="email" class="text-black" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p id="profile_unverified_status_message" class="text-sm mt-2 text-gray-800 ">
                        {{-- dark:text-gray-200 --}}
                        {{ __('Your email address is unverified.') }}

                        <button id="profile_send_verification_email_button" form="send-verification" class="underline text-sm text-gray-600  hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                            {{-- dark:text-gray-400   dark:hover:text-gray-100  dark:focus:ring-offset-gray-800 --}}
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p id="profile_verification_link_sent_status" class="mt-2 font-medium text-sm text-green-600">
                            {{-- dark:text-green-400 --}}
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button id="profile_information_save_button" class="bg-light_mode_blue hover:opacity-90 text-white font-bold py-2 px-4 rounded" type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    id="profile_information_saved_status"
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
