<x-app-layout>


        <h2 id="profile_welcome_text" class="text-center mt-8 font-semibold text-xl text-gray-800  leading-tight">
            {{-- dark:text-gray-200 --}}
            {{ __('Profile') }}
        </h2>




        {{-- Dark/light mode toggle button --}}
        <div id="dark_mode_toggle_button" class="w-full flex flex-col justify-center items-center mt-8 transition-all">

            <img id="light_mode_icon" class="cursor-pointer" src="{{ asset('files/images/light_mode_icon.png') }}" width = "64px" alt="">

            {{-- Dark Mode Icon --}}
            <img id="dark_mode_icon" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_icon.png') }}" width = "64px" alt="">

        </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div id="profile_update_information_form" class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                {{-- dark:bg-gray-800 --}}
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div id="profile_update_password_form" class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                    {{-- dark:bg-gray-800 --}}
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div id="profile_delete_user_form" class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                {{-- dark:bg-gray-800 --}}
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>


{{-- Javascript Codes are written on the layouts/app.blade.php file --}}
   


</x-app-layout>
