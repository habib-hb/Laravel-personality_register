<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes Input</title>
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" /> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body id="body_element" class="bg-light_gray transition-all">

        {{-- The best athlete wants his opponent at his best. --}}
        {{-- This main is taking the whole height and containing the whole body --}}
        <main id="main_element" class="h-[100%] bg-light_gray transition-all">

            <nav class="w-full h-[64px] flex flex-col justify-center items-center bg-slate-50 " style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

                <img id="light_mode_logo" class="cursor-pointer" src="{{ asset('files/images/light_mode_logo.png') }}" width="88px" alt="Pic">

                {{-- Dark Mode Logo --}}
                <img id="dark_mode_logo" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

            </nav>

                {{-- Dark Mode Toggle --}}
                <div id="dark_mode_toggle_button" class="w-full flex flex-col justify-center items-center mt-[4vh] transition-all md:absolute md:top-[16px] md:items-end md:pr-4 md:mt-[0]">
                    {{-- Light Mode Icon --}}
                    <img id="light_mode_icon" class="cursor-pointer" src="{{ asset('files/images/light_mode_icon.png') }}" width = "64px" alt="">

                    {{-- Dark Mode Icon --}}
                    <img id="dark_mode_icon" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_icon.png') }}" width = "64px" alt="">

                </div>



                {{-- Opening Message --}}
                <h2 id="first_message" class="text-light_mode_blue text-center text-[32px] font-normal font-['Inter'] mt-[4vh]">Let’s Add Some Magic :)</h2>



                {{-- The livewire component --}}
              @livewire('input-into-quotes-database')



            </main>



            {{-- @livewireScripts --}}
           {{-- ******************** Javascript Code ******************** --}}

           <script>

            // Reset Form Function
            function resetForm() {
                setTimeout(function() {
               document.getElementById('add_quote_form').reset();
                 }, 300);

                setTimeout(function() {
                    document.getElementById('session-message').style.display = 'none';
                }, 3000);
            }
                    // The on click event
                    document.getElementById('submit_button').addEventListener('click', resetForm);



            // Making the Delete session disappear after 5 seconds on the button click
            function reset_delete_msg_after_timeout() {
                    setTimeout(function() {
                    document.getElementById('session-message').style.display = 'none';
                    }, 5000);
                }

                        document.getElementById('delete_popup_submit_button').addEventListener('click', reset_delete_msg_after_timeout);




            // Making the Edit session disappear after 5 seconds on the popup form submit button click
            function reset_edit_msg_after_timeout() {
                    setTimeout(function() {
                    document.getElementById('session-message').style.display = 'none';
                    }, 5000);
                }

                        document.getElementById('edit_popup_submit_button').addEventListener('click', reset_edit_msg_after_timeout);




             // ***Setup dark/light mode javascript based on Laravel backend value
                    // Testing
                    var theme_mode_from_laravel = @json($theme_mode);

                    console.log("Coming From Controller Laravel : " , theme_mode_from_laravel);

             if(theme_mode_from_laravel == 'dark') {
                  // Body element dark mode
                  document.getElementById('body_element').classList.toggle('bg-light_gray');
                    document.getElementById('body_element').classList.toggle('bg-dark_gray');



                    // Main element dark mode
                    document.getElementById('main_element').classList.toggle('bg-light_gray');
                    document.getElementById('main_element').classList.toggle('bg-dark_gray');



                    // Dark mode logo
                    document.getElementById('light_mode_logo').classList.toggle('hidden');
                    document.getElementById('dark_mode_logo').classList.toggle('hidden');



                    // Dark mode icon
                    document.getElementById('light_mode_icon').classList.toggle('hidden');
                    document.getElementById('dark_mode_icon').classList.toggle('hidden');



                    // Nav element dark mode
                    document.querySelector('nav').classList.toggle('bg-slate-50');
                    document.querySelector('nav').classList.toggle('bg-dark_gray');



                    // // Welcome text dark mode
                    // document.getElementById('welcome_text').classList.toggle('text-white');



                    // First Message dark mode
                    document.getElementById('first_message').classList.toggle('text-dark_mode_blue');
                    document.getElementById('first_message').classList.toggle('text-light_mode_blue');

             }



            // ***Dark Mode Toggler By Clicking On The Icon
            document.querySelector('#dark_mode_toggle_button').addEventListener('click', async()=>{

                            // Tooggle conditional logic
                            theme_mode_from_laravel == 'dark' ?

                            theme_mode_from_laravel = 'light' :

                            theme_mode_from_laravel = 'dark'


                    // Fetch POST request
                   await fetch('{{ route('set_theme_mode') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            theme_mode: theme_mode_from_laravel
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


                // ***Setup dark/light mode javascript based on user click
                    // Body element dark/light mode
                    document.getElementById('body_element').classList.toggle('bg-light_gray');
                    document.getElementById('body_element').classList.toggle('bg-dark_gray');



                    // Main element dark/light mode
                    document.getElementById('main_element').classList.toggle('bg-light_gray');
                    document.getElementById('main_element').classList.toggle('bg-dark_gray');



                    // Dark/light mode logo
                    document.getElementById('light_mode_logo').classList.toggle('hidden');
                    document.getElementById('dark_mode_logo').classList.toggle('hidden');



                    // Dark/light mode icon
                    document.getElementById('light_mode_icon').classList.toggle('hidden');
                    document.getElementById('dark_mode_icon').classList.toggle('hidden');



                    // Nav element dark/light mode
                    document.querySelector('nav').classList.toggle('bg-slate-50');
                    document.querySelector('nav').classList.toggle('bg-dark_gray');



                    // // Welcome text dark/light mode
                    // document.getElementById('welcome_text').classList.toggle('text-white');



                    // First Message dark/light mode
                    document.getElementById('first_message').classList.toggle('text-dark_mode_blue');
                    document.getElementById('first_message').classList.toggle('text-light_mode_blue');



                    // Input labels dark/light mode
                    document.getElementById('select_label').classList.toggle('text-white');
                    document.getElementById('quote_input_label').classList.toggle('text-white');



                    // Selection Fields dark/light mode
                    document.getElementById('section_input').classList.toggle('bg-input_dark_mode');
                    document.getElementById('section_input').classList.toggle('text-white');

                    document.getElementById('option-1').classList.toggle('text-white');
                    document.getElementById('option-2').classList.toggle('text-white');
                    document.getElementById('option-3').classList.toggle('text-white');
                    document.getElementById('option-4').classList.toggle('text-white');
                    document.getElementById('option-5').classList.toggle('text-white');



                    // Name input dark/light mode
                    document.getElementById('quote_input').classList.toggle('bg-input_dark_mode');
                    document.getElementById('quote_input').classList.toggle('text-white');



                    // Submit button dark/light mode
                    document.getElementById('submit_button').classList.toggle('bg-dark_mode_blue');
                    document.getElementById('submit_button').classList.toggle('bg-light_mode_blue');


                    // input_into_quotes_database.blade.php - Livewire Section
                        // Quote List element section dark/light mode
                         // Query List title dark/light mode
                         document.getElementById('quote_list_title').classList.toggle('text-light_mode_blue');
                         document.getElementById('quote_list_title').classList.toggle('text-dark_mode_blue');

                         // query_list_element_body dark/light mode
                         document.querySelectorAll('.quote_list_element_body').forEach(function(element) {
                             element.classList.toggle('bg-zinc-100');
                             element.classList.toggle('bg-input_dark_mode');
                         });

                         // query_list_element_text dark/light mode
                         document.querySelectorAll('.quote_list_element_text').forEach(function(element) {
                             element.classList.toggle('text-white');
                             element.classList.toggle('text-black');
                         });

                         // query_list_element_edit_button dark/light mode
                         document.querySelectorAll('.quote_list_element_edit_button').forEach(function(element) {
                             element.classList.toggle('bg-dark_mode_blue');
                             element.classList.toggle('bg-light_mode_blue');
                         });

                         // query_list_element_delete_button dark/light mode
                         document.querySelectorAll('.quote_list_element_delete_button').forEach(function(element) {
                             element.classList.toggle('bg-light_mode_red');
                             element.classList.toggle('bg-dark_mode_red');
                         });



                    // // Edit Popup dark/light mode
                    //     // Main box dark/light mode
                    //     document.getElementById('popup_edit_content').classList.toggle('bg-white');
                    //     document.getElementById('popup_edit_content').classList.toggle('bg-input_dark_mode');

                    //     // Close Button dark/light mode
                    //     document.getElementById('close_popup_edit_btn').classList.toggle('text-black');
                    //     document.getElementById('close_popup_edit_btn').classList.toggle('text-white');

                    //     // Title Dark/Light Mode
                    //     document.getElementById('popup_edit_title').classList.toggle('text-light_mode_blue');
                    //     document.getElementById('popup_edit_title').classList.toggle('text-white');

                    //     // quote_edit_input_label dark/light mode
                    //     document.getElementById('quote_edit_input_label').classList.toggle('text-gray-700');
                    //     document.getElementById('quote_edit_input_label').classList.toggle('text-white');

                    //     // quote_edit_input dark/light mode
                    //     document.getElementById('quote_edit_input').classList.toggle('bg-white');
                    //     document.getElementById('quote_edit_input').classList.toggle('bg-input_dark_mode');
                    //     document.getElementById('quote_edit_input').classList.toggle('text-white');
                    //     document.getElementById('quote_edit_input').classList.toggle('text-black');

                    //     // edit_popup_submit_button dark/light mode
                    //     document.getElementById('edit_popup_submit_button').classList.toggle('bg-light_mode_blue');
                    //     document.getElementById('edit_popup_submit_button').classList.toggle('bg-dark_mode_blue');





            })



    </script>



        @livewireScripts
</body>
</html>
