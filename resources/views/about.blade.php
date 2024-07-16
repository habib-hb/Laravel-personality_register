<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body id="body_element" class="bg-light_gray transition-all">

    {{-- This main is taking the whole height and containing the whole body --}}
    <main id="main_element" class="h-[100%] bg-light_gray transition-all">

    <nav class="w-full h-[64px] flex flex-col justify-center items-center bg-slate-50 " style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

        <img id="light_mode_logo" class="cursor-pointer" src="{{ asset('files/images/light_mode_logo.png') }}" width="88px" alt="Pic">

        {{-- Dark Mode Logo --}}
        <img id="dark_mode_logo" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

    </nav>

    {{-- Dark Mode Toggle --}}
    <div id="dark_mode_toggle_button" class="w-full flex flex-col justify-center items-center mt-[4vh] transition-all   md:absolute md:top-[16px] md:items-end md:pr-4 md:mt-[0]">
            {{-- Light Mode Icon --}}
            <img id="light_mode_icon" class="cursor-pointer" src="{{ asset('files/images/light_mode_icon.png') }}" width = "64px" alt="">

            {{-- Dark Mode Icon --}}
            <img id="dark_mode_icon" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_icon.png') }}" width = "64px" alt="">

    </div>



        {{-- Opening Message --}}
        <h2 id="first_message" class="text-light_mode_blue text-center text-[32px] font-normal font-['Inter'] mt-[4vh]">About</h2>

        <br><br>

        {{-- The about message --}}
        <p id="about_message" class="w-[90%] md:w-[50%] text-lg text-center font-['Inter'] mx-auto">Hi, I'm Habib. I enjoy electron manipulation as a hobby. This site is a pet project close to my heart. It also includes magical contributions and feedback from my best friend, Albina. You might not know her, but trust me, she is awesome. <br><br>Building this site has helped me learn and understand so many things in such a fun way that I could never have imagined.<br><br> Thank you for taking the time to explore this passion piece of mine. If you don't mind, I would be extremely grateful if you could give me some feedback about your experience with it below.</p> <br><br>



        {{-- The feedback form --}}
        <form action="{{ route('feedback') }}" method="POST" class="w-full flex flex-col justify-center items-center mt-8 transition-all md:mt-2">

            {{-- CSRF Protected --}}
            @csrf

                {{-- Email input --}}
                <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:mt-2 md:max-w-[500px]">
                    <label id="feedback_input_label" for="feedback_input" class="text-center mb-4 md:mb-0">Feedback</label>
                </div>
                <textarea required id="feedback_input" name="feedback" class="w-[90vw] border-none rounded-md md:mt-2 md:max-w-[500px]"></textarea>
                @error('feedback_input')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                {{-- Log In button --}}
                <input type="submit" id="feedback_submit_button" value="Send Feedback" class="mt-[2vh] md:mt-[4vh] mb-[4vh] h-12 w-[60%] md:w-[90%] rounded-md bg-light_mode_blue text-white hover:opacity-90 text-xl md:max-w-[350px] md:mb-[12vh]">

            </form>



         {{-- Text :Technologies I used  --}}
          <h2 id="technologies_used_message_header" class="text-light_mode_blue text-center text-[32px] font-normal font-['Inter'] mt-20 md:mt-0">Technologies I used</h2>
            <ul id="technologies_used_list" class="max-w-[100px] text-lg text-center font-['Inter'] mx-auto" style="list-style-type: disc;">
                <li>PHP</li>
                <li>MySQL</li>
                <li>Laravel</li>
                <li>Blade</li>
                <li>Livewire</li>
                <li>JavaScript</li>
                <li>Tailwind</li>
                <li>Vite</li>
                <li>Git</li>
                <li>Smtp</li>
                <li>Apache</li>
                <li>GPT 4</li>
                <li>Codeium</li>
                <li>Icon 8</li>
                <li>Figma</li>
            </ul>

           <br><br><br><br><br><br><br><br>



    </main>



    {{-- ******************** Javascript Code ******************** --}}

    <script>
        // Managing the dark mode from Backend php/Laravel Session
        document.addEventListener('DOMContentLoaded', function() {
                if(@json($theme_mode) == 'dark'){

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
                                            theme_mode: @json($theme_mode) == 'dark' ? 'light' : 'dark'

                                        })
                                    }).then(response => response.text())
                                    .then(data => {
                                            console.log('set_theme_mode console response: ', data);

                                            // // Restarting the livewire component
                                            // Livewire.dispatch('restart');
                                        })
                                        .catch(error => {
                                            console.log('set_theme_mode console error: ', error);
                                        });

                     first_load_check = false;



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

                // About message dark mode
                document.getElementById('about_message').classList.toggle('text-white');

                // feedback_input_label dark mode
                document.getElementById('feedback_input_label').classList.toggle('text-white');

                // feedback_input dark mode
                document.getElementById('feedback_input').classList.toggle('text-white');
                document.getElementById('feedback_input').classList.toggle('bg-input_dark_mode');

                // feedback_submit_button dark mode
                document.getElementById('feedback_submit_button').classList.toggle('bg-dark_mode_blue');
                document.getElementById('feedback_submit_button').classList.toggle('bg-light_mode_blue');

                //technologies_used_message_header dark mode
                document.getElementById('technologies_used_message_header').classList.toggle('text-dark_mode_blue');
                document.getElementById('technologies_used_message_header').classList.toggle('text-light_mode_blue');

                // technologies_used_list dark mode
                document.getElementById('technologies_used_list').classList.toggle('text-white');




        })



</script>



</body>
</html>
