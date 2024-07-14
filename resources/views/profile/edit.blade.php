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

            <div id="profile_update_password_form" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div id="profile_delete_user_form" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>



    {{-- *** JAVASCRIPT CODE *** --}}
    <script>
        // Dark/light mode toggle button click operation
        document.getElementById('dark_mode_toggle_button').addEventListener('click', function() {

        // Toggle button dark/light mode icons
        document.getElementById('light_mode_icon').classList.toggle('hidden');
        document.getElementById('dark_mode_icon').classList.toggle('hidden');

        // Toggle body/app_main_div background color
        document.getElementById('app_main_div_body').classList.toggle('bg-gray-900');
        document.getElementById('app_main_div_body').classList.toggle('bg-gray-100');

        // Profile Welcome Text
        document.getElementById('profile_welcome_text').classList.toggle('text-gray-200');
        document.getElementById('profile_welcome_text').classList.toggle('text-gray-800');



        // Toggle navigation section
        // Profile Nav element
        document.getElementById('profile_nav').classList.toggle('bg-gray-800');
        document.getElementById('profile_nav').classList.toggle('border-gray-700');
        document.getElementById('profile_nav').classList.toggle('bg-gray-100');
        document.getElementById('profile_nav').classList.toggle('border-gray-100');

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
        // profile_update_password_form_title element
        document.getElementById('profile_update_password_form_title').classList.toggle('text-gray-100');
        document.getElementById('profile_update_password_form_title').classList.toggle('text-gray-900');

        // profile_update_password_form_description element
        document.getElementById('profile_update_password_form_description').classList.toggle('text-gray-400');
        document.getElementById('profile_update_password_form_description').classList.toggle('text-gray-600');

        // profile_password_saved_status element
        document.getElementById('profile_password_saved_status')?.classList.toggle('text-gray-400');
        document.getElementById('profile_password_saved_status')?.classList.toggle('text-gray-600');

        // Toggle Profile Delete Account Section
        // profile_delete_account_form_title element
        document.getElementById('profile_delete_account_form_title')?.classList.toggle('text-gray-100');
        document.getElementById('profile_delete_account_form_title')?.classList.toggle('text-gray-900');

        // profile_delete_account_form_description element
        document.getElementById('profile_delete_account_form_description')?.classList.toggle('text-gray-400');
        document.getElementById('profile_delete_account_form_description')?.classList.toggle('text-gray-600');

        // profile_delete_user_form_reassurance_alert element
        document.getElementById('profile_delete_user_form_reassurance_alert')?.classList.toggle('text-gray-100');
        document.getElementById('profile_delete_user_form_reassurance_alert')?.classList.toggle('text-gray-900');

        // profile_delete_user_form_reassurance_description element
        document.getElementById('profile_delete_user_form_reassurance_description')?.classList.toggle('text-gray-400');
        document.getElementById('profile_delete_user_form_reassurance_description')?.classList.toggle('text-gray-600');
        });




        // // Dark/light mode toggle button click operation
        // document.getElementById('dark_mode_toggle_button').addEventListener('click', function() {

        //     // Toggle button dark/light mode
        //     document.getElementById('light_mode_icon').classList.toggle('hidden');
        //     document.getElementById('dark_mode_icon').classList.toggle('hidden');



        //     // Body/ App_main_div element dark/light mode
        //     document.getElementById('app_main_div_body').classList.toggle('bg-gray-900');
        //     document.getElementById('app_main_div_body').classList.toggle('bg-gray-100');



        //     // Navigation Section Dark/light mode
        //         // Profile Nav element dark/light mode
        //         document.getElementById('profile_nav').classList.toggle('bg-gray-800 border-gray-700');
        //         document.getElementById('profile_nav').classList.toggle('bg-gray-100 border-gray-100');

        //         //profile_dropdown_button element dark/light mode
        //         document.getElementById('profile_dropdown_button').classList.toggle('text-gray-400  bg-gray-800  hover:text-gray-300');
        //         document.getElementById('profile_dropdown_button').classList.toggle('text-gray-500  bg-white  hover:text-gray-700');

        //         //profile_hamburger element dark/light mode
        //         document.getElementById('profile_hamburger').classList.toggle('hover:bg-gray-900 hover:text-gray-400 focus:text-gray-400 focus:bg-gray-900 focus:text-gray-400 text-gray-500');
        //         document.getElementById('profile_hamburger').classList.toggle('text-gray-400  hover:text-gray-500  hover:bg-gray-100 focus:bg-gray-100  focus:text-gray-500');

        //         //profile_dropdown_mobile element dark/light mode
        //         document.getElementById('profile_dropdown_mobile').classList.toggle('border-gray-600');
        //         document.getElementById('profile_dropdown_mobile').classList.toggle('border-gray-200');

        //         // profile_dropdown_mobile_name element dark/light mode
        //         document.getElementById('profile_dropdown_mobile_name').classList.toggle('text-gray-200');
        //         document.getElementById('profile_dropdown_mobile_name').classList.toggle('text-gray-800');



        //     // Profile Information Section Dark/light mode
        //        //profile_update_information_form_title element dark/light mode
        //        document.getElementById('profile_update_information_form_title').classList.toggle('text-gray-100');
        //        document.getElementById('profile_update_information_form_title').classList.toggle('text-gray-900');

        //        //profile_update_information_form_description element dark/light mode
        //        document.getElementById('profile_update_information_form_description').classList.toggle('text-gray-400');
        //        document.getElementById('profile_update_information_form_description').classList.toggle('text-gray-600');

        //        //profile_send_verification_email_button element dark/light mode
        //        document.getElementById('profile_send_verification_email_button').classList.toggle('text-gray-400   hover:text-gray-100  focus:ring-offset-gray-800');
        //        document.getElementById('profile_send_verification_email_button').classList.toggle('text-gray-600  hover:text-gray-900 focus:ring-indigo-500');

        //        //profile_verification_link_sent_status element dark/light mode
        //        document.getElementById('profile_verification_link_sent_status').classList.toggle('text-green-400');
        //        document.getElementById('profile_verification_link_sent_status').classList.toggle('text-green-600');

        //        //profile_information_saved_status element dark/light mode
        //        document.getElementById('profile_information_saved_status').classList.toggle('text-gray-400');
        //        document.getElementById('profile_information_saved_status').classList.toggle('text-gray-600');



        //     // Profile Password Section Dark/light mode
        //        //profile_update_password_form_title element dark/light mode
        //        document.getElementById('profile_update_password_form_title').classList.toggle('text-gray-100');
        //        document.getElementById('profile_update_password_form_title').classList.toggle('text-gray-900');

        //        //profile_update_password_form_description element dark/light mode
        //        document.getElementById('profile_update_password_form_description').classList.toggle('text-gray-400');
        //        document.getElementById('profile_update_password_form_description').classList.toggle('text-gray-600');

        //        //profile_password_saved_status element dark/light mode
        //        document.getElementById('profile_password_saved_status').classList.toggle('text-gray-400');
        //        document.getElementById('profile_password_saved_status').classList.toggle('text-gray-600');



        //     // Profile Delete Account Section Dark/light mode
        //        //profile_delete_account_form_title element dark/light mode
        //        document.getElementById('profile_delete_account_form_title').classList.toggle('text-gray-100');
        //        document.getElementById('profile_delete_account_form_title').classList.toggle('text-gray-900');

        //        //profile_delete_account_form_description element dark/light mode
        //        document.getElementById('profile_delete_account_form_description').classList.toggle('text-gray-400');
        //        document.getElementById('profile_delete_account_form_description').classList.toggle('text-gray-600');

        //        //profile_delete_user_form_reassurance_alert element dark/light mode
        //        document.getElementById('profile_delete_user_form_reassurance_alert').classList.toggle('text-gray-100');
        //        document.getElementById('profile_delete_user_form_reassurance_alert').classList.toggle('text-gray-900');

        //        //profile_delete_user_form_reassurance_description element dark/light mode
        //        document.getElementById('profile_delete_user_form_reassurance_description').classList.toggle('text-gray-400');
        //        document.getElementById('profile_delete_user_form_reassurance_description').classList.toggle('text-gray-600');












    </script>



</x-app-layout>
