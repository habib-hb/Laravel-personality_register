<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body  class="font-sans antialiased">
        <div id="app_main_div_body" class="min-h-screen bg-light_gray ">
            {{-- dark:bg-gray-900 --}}
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>



        {{-- *** JAVASCRIPT CODE *** --}}
        <script>
            // Managing the dark mode from Backend php/Laravel Session
            document.addEventListener('DOMContentLoaded', function() {
                if(@json(session('theme_mode')) == 'dark'){

                    // Clicking the theme toggle button artificially
                    document.getElementById('dark_mode_toggle_button').click();

                     }
                else {
                    first_load_check = false;
                }
                });



            // Dark mode toggle button operation
                let first_load_check = true;
            document.querySelector('#dark_mode_toggle_button').addEventListener('click', async()=>{

                    // Setting theme mode session based on user click through api post request
                         // Fetch POST request
                    !first_load_check && await fetch('{{ route('set_theme_mode') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            theme_mode: @json(session('theme_mode')) == 'dark' ? 'light' : 'dark'

                                        })
                                    }).then(response => response.text())
                                    .then(data => {
                                            console.log('set_theme_mode console response: ', data);

                                            // Restarting the livewire component
                                            Livewire.dispatch('restart');
                                        })
                                        .catch(error => {
                                            console.log('set_theme_mode console error: ', error);
                                        });

                     first_load_check = false;



            // Toggle Logo dark/light mode icons
            document.getElementById('light_mode_logo').classList.toggle('hidden');
            document.getElementById('dark_mode_logo').classList.toggle('hidden');

            // Toggle button dark/light mode icons
            document.getElementById('light_mode_icon').classList.toggle('hidden');
            document.getElementById('dark_mode_icon').classList.toggle('hidden');

            // Toggle body/app_main_div background color
            document.getElementById('app_main_div_body').classList.toggle('bg-black');
            document.getElementById('app_main_div_body').classList.toggle('bg-light_gray');

            // Profile Welcome Text
            document.getElementById('profile_welcome_text').classList.toggle('text-gray-200');
            document.getElementById('profile_welcome_text').classList.toggle('text-gray-800');



            // Toggle navigation section
            // Profile Nav element
            document.getElementById('profile_nav').classList.toggle('bg-black');
            document.getElementById('profile_nav').classList.toggle('bg-slate-50');

            // profile_dropdown_button element
            document.getElementById('profile_dropdown_button').classList.toggle('text-gray-400');
            document.getElementById('profile_dropdown_button').classList.toggle('bg-gray-800');
            document.getElementById('profile_dropdown_button').classList.toggle('hover:text-gray-300');
            document.getElementById('profile_dropdown_button').classList.toggle('text-gray-500');
            document.getElementById('profile_dropdown_button').classList.toggle('bg-white');
            document.getElementById('profile_dropdown_button').classList.toggle('hover:text-gray-700');

            // profile_hamburger element
            document.getElementById('profile_hamburger').classList.toggle('hover:bg-gray-900');
            document.getElementById('profile_hamburger').classList.toggle('hover:text-gray-400');
            document.getElementById('profile_hamburger').classList.toggle('focus:text-gray-400');
            document.getElementById('profile_hamburger').classList.toggle('focus:bg-gray-900');
            document.getElementById('profile_hamburger').classList.toggle('text-gray-500');
            document.getElementById('profile_hamburger').classList.toggle('text-gray-400');
            document.getElementById('profile_hamburger').classList.toggle('hover:text-gray-500');
            document.getElementById('profile_hamburger').classList.toggle('hover:bg-gray-100');
            document.getElementById('profile_hamburger').classList.toggle('focus:bg-gray-100');
            document.getElementById('profile_hamburger').classList.toggle('focus:text-gray-500');

            // profile_dropdown_mobile element
            document.getElementById('profile_dropdown_mobile').classList.toggle('border-gray-600');
            document.getElementById('profile_dropdown_mobile').classList.toggle('border-gray-200');

            // profile_dropdown_mobile_name element
            document.getElementById('profile_dropdown_mobile_name').classList.toggle('text-gray-200');
            document.getElementById('profile_dropdown_mobile_name').classList.toggle('text-gray-800');



            // Toggle Profile Information Section
            //profile_update_information_form element
            document.getElementById('profile_update_information_form').classList.toggle('bg-gray-800');
            document.getElementById('profile_update_information_form').classList.toggle('bg-white');

            // profile_update_information_form_title element
            document.getElementById('profile_update_information_form_title').classList.toggle('text-gray-100');
            document.getElementById('profile_update_information_form_title').classList.toggle('text-gray-900');

            // profile_update_information_form_description element
            document.getElementById('profile_update_information_form_description').classList.toggle('text-gray-400');
            document.getElementById('profile_update_information_form_description').classList.toggle('text-gray-600');

            //profile_name_label element
            document.getElementById('profile_name_label')?.classList.toggle('text-black');
            document.getElementById('profile_name_label')?.classList.toggle('text-white');

            //profile_email_label element
            document.getElementById('profile_email_label')?.classList.toggle('text-black');
            document.getElementById('profile_email_label')?.classList.toggle('text-white');

            //profile_information_save_button element
            document.getElementById('profile_information_save_button').classList.toggle('bg-light_mode_blue');
            document.getElementById('profile_information_save_button').classList.toggle('bg-dark_mode_blue');


            //profile_unverified_status_message element
            document.getElementById('profile_unverified_status_message')?.classList.toggle('text-gray-200');
            document.getElementById('profile_unverified_status_message')?.classList.toggle('text-gray-800');

            // profile_send_verification_email_button element
            document.getElementById('profile_send_verification_email_button').classList.toggle('text-gray-400');
            document.getElementById('profile_send_verification_email_button').classList.toggle('hover:text-gray-100');
            document.getElementById('profile_send_verification_email_button').classList.toggle('focus:ring-offset-gray-800');
            document.getElementById('profile_send_verification_email_button').classList.toggle('text-gray-600');
            document.getElementById('profile_send_verification_email_button').classList.toggle('hover:text-gray-900');
            document.getElementById('profile_send_verification_email_button').classList.toggle('focus:ring-indigo-500');

            // profile_verification_link_sent_status element
            document.getElementById('profile_verification_link_sent_status')?.classList.toggle('text-green-400');
            document.getElementById('profile_verification_link_sent_status')?.classList.toggle('text-green-600');

            // profile_information_saved_status element
            document.getElementById('profile_information_saved_status')?.classList.toggle('text-gray-400');
            document.getElementById('profile_information_saved_status')?.classList.toggle('text-gray-600');

            // Toggle Profile Password Section
            // profile_update_password_form element
            document.getElementById('profile_update_password_form').classList.toggle('bg-gray-800');
            document.getElementById('profile_update_password_form').classList.toggle('bg-white');

            // profile_update_password_form_title element
            document.getElementById('profile_update_password_form_title').classList.toggle('text-gray-100');
            document.getElementById('profile_update_password_form_title').classList.toggle('text-gray-900');

            // profile_update_password_form_description element
            document.getElementById('profile_update_password_form_description').classList.toggle('text-gray-400');
            document.getElementById('profile_update_password_form_description').classList.toggle('text-gray-600');

            // update_password_current_password_label element
            document.getElementById('update_password_current_password_label')?.classList.toggle('text-black');
            document.getElementById('update_password_current_password_label')?.classList.toggle('text-white');

            // update_password_password_label element
            document.getElementById('update_password_password_label')?.classList.toggle('text-black');
            document.getElementById('update_password_password_label')?.classList.toggle('text-white');

            // update_password_password_confirmation_label element
            document.getElementById('update_password_password_confirmation_label')?.classList.toggle('text-black');
            document.getElementById('update_password_password_confirmation_label')?.classList.toggle('text-white');

            // update_password_save_button element
            document.getElementById('update_password_save_button').classList.toggle('bg-light_mode_blue');
            document.getElementById('update_password_save_button').classList.toggle('bg-dark_mode_blue');

            // profile_password_saved_status element
            document.getElementById('profile_password_saved_status')?.classList.toggle('text-gray-400');
            document.getElementById('profile_password_saved_status')?.classList.toggle('text-gray-600');

            // Toggle Profile Delete Account Section
            //profile_delete_user_form element
            document.getElementById('profile_delete_user_form').classList.toggle('bg-gray-800');
            document.getElementById('profile_delete_user_form').classList.toggle('bg-white');

            // profile_delete_account_form_title element
            document.getElementById('profile_delete_user_form_title').classList.toggle('text-gray-100');
            document.getElementById('profile_delete_user_form_title').classList.toggle('text-gray-900');

            // profile_delete_account_form_description element
            document.getElementById('profile_delete_user_form_description')?.classList.toggle('text-gray-400');
            document.getElementById('profile_delete_user_form_description')?.classList.toggle('text-gray-600');

            //profile_delete_user_form_body element
            document.getElementById('profile_delete_user_form_body').classList.toggle('bg-gray-800');
            document.getElementById('profile_delete_user_form_body').classList.toggle('bg-white');

            // profile_delete_user_form_reassurance_alert element
            document.getElementById('profile_delete_user_form_reassurance_alert')?.classList.toggle('text-gray-100');
            document.getElementById('profile_delete_user_form_reassurance_alert')?.classList.toggle('text-gray-900');

            // profile_delete_user_form_reassurance_description element
            document.getElementById('profile_delete_user_form_reassurance_description')?.classList.toggle('text-gray-400');
            document.getElementById('profile_delete_user_form_reassurance_description')?.classList.toggle('text-gray-600');
            });



        </script>
    </body>
</html>
