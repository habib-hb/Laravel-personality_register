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





              @livewire('input-into-quotes-database')




        {{-- The Quote List --}}
        <h2 class="text-light_mode_blue text-center text-[24px] font-normal font-['Inter'] mb-[2vh]">Quote List</h2>
        <div class="flex flex-col gap-4 justify-center items-center mb-4">

            <div class="quote_list_element_body w-[90vw] h-[20vh] bg-zinc-100 rounded-lg relative p-5">
                <div class="text-center text-black text-xl font-normal mb-5">The quote Lorem Ipsum dada dada dafdsf fdsf fsdfdsf</div>
                <div class="flex justify-between">
                    <button class="w-[35vw] h-[6vh] bg-light_mode_blue rounded-lg text-white text-xl font-normal flex items-center justify-center">Edit</button>
                    <button class="w-[35vw] h-[6vh] bg-light_mode_red rounded-lg text-white text-xl font-normal flex items-center justify-center">Delete</button>
                </div>
            </div>


            <div class="quote_list_element_body w-[90vw] h-[20vh] bg-zinc-100 rounded-lg relative p-5">
                <div class="text-center text-black text-xl font-normal mb-5">The quote Lorem Ipsum dada dada dafdsf fdsf fsdfdsf</div>
                <div class="flex justify-between">
                    <button class="w-[35vw] h-[6vh] bg-light_mode_blue rounded-lg text-white text-xl font-normal flex items-center justify-center">Edit</button>
                    <button class="w-[35vw] h-[6vh] bg-light_mode_red rounded-lg text-white text-xl font-normal flex items-center justify-center">Delete</button>
                </div>
            </div>

            <div class="quote_list_element_body w-[90vw] h-[20vh] bg-zinc-100 rounded-lg relative p-5">
                <div class="text-center text-black text-xl font-normal mb-5">The quote Lorem Ipsum dada dada dafdsf fdsf fsdfdsf</div>
                <div class="flex justify-between">
                    <button class="w-[35vw] h-[6vh] bg-light_mode_blue rounded-lg text-white text-xl font-normal flex items-center justify-center">Edit</button>
                    <button class="w-[35vw] h-[6vh] bg-light_mode_red rounded-lg text-white text-xl font-normal flex items-center justify-center">Delete</button>
                </div>
            </div>


        </div>






            </main>



        @livewireScripts
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



            // Dark Mode Toggler By Clicking On The Icon
            document.querySelector('#dark_mode_toggle_button').addEventListener('click', ()=>{

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



                    // Input labels dark mode
                    document.getElementById('select_label').classList.toggle('text-white');
                    document.getElementById('quote_input_label').classList.toggle('text-white');



                    // Selection Fields dark mode
                    document.getElementById('section_input').classList.toggle('bg-input_dark_mode');
                    document.getElementById('section_input').classList.toggle('text-white');

                    document.getElementById('option-1').classList.toggle('text-white');
                    document.getElementById('option-2').classList.toggle('text-white');
                    document.getElementById('option-3').classList.toggle('text-white');
                    document.getElementById('option-4').classList.toggle('text-white');
                    document.getElementById('option-5').classList.toggle('text-white');



                    // Name input dark mode
                    document.getElementById('quote_input').classList.toggle('bg-input_dark_mode');
                    document.getElementById('quote_input').classList.toggle('text-white');



                    // Submit button dark mode
                    document.getElementById('submit_button').classList.toggle('bg-dark_mode_blue');
                    document.getElementById('submit_button').classList.toggle('bg-light_mode_blue');



            })



    </script>
</body>
</html>
