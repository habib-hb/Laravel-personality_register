<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

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
        <div id="dark_mode_toggle_button" class="w-full flex flex-col justify-center items-center mt-[4vh] transition-all md:absolute md:top-[16px] md:items-end md:pr-4 md:mt-[0]">
            {{-- Light Mode Icon --}}
            <img id="light_mode_icon" class="cursor-pointer" src="{{ asset('files/images/light_mode_icon.png') }}" width = "64px" alt="">

            {{-- Dark Mode Icon --}}
            <img id="dark_mode_icon" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_icon.png') }}" width = "64px" alt="">

        </div>



        {{-- Opening Message --}}
        <h2 id="first_message" class="text-light_mode_blue text-center text-[32px] font-normal font-['Inter'] mt-[4vh]">Let’s Register :)</h2>



        {{-- The Github Button --}}
        <div class="flex flex-col justify-center items-center mt-[4vh]">

            <a href="auth/redirect" class="cursor-pointer flex flex-col items-center">
                <img src="{{ asset('files/images/github_button.png') }}" alt="Github logo" class="cursor-pointer hover:opacity-80 w-[94%] md:w-[300px]">
            </a>

        </div>
        {{-- Hr Line --}}
        <hr id="hr_line" class="bg-black mt-[4vh] md:h-[2px]">



    {{-- Form Starts- 5 inputs (section select with 5 options, name , email, password, confirm password) --}}
    <form action="{{ route('register') }}" method="POST" class="w-full flex flex-col justify-center items-center mt-8 transition-all md:mt-2">

        {{-- Cross site request forgery Protection --}}
        @csrf

            {{-- Select Personality Type Input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:mt-2 md:max-w-[500px]">
                <label id="select_label" for="personality" class="text-left">Select Your Personality Type:</label>
            </div>
            <select name="personality" id="section_input" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
                <option id="option-1" value="1" class="text-black">Extroversion</option>
                <option id="option-2" value="2" class="text-black">Agreeableness</option>
                <option id="option-3" value="3" class="text-black">Openness</option>
                <option id="option-4" value="4" class="text-black">Conscientiousness</option>
                <option id="option-5" value="5" class="text-black">Neuroticism</option>
            </select>
            @error('personality')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Name input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="name_input_label" for="name" class="text-left">Name:</label>
            </div>
            <input type="text" id="name_input" name="name" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Email input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="email_input_label" for="email" class="text-left">Email:</label>
            </div>
            <input type="email" id="email_input" name="email" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Password input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="password_input_label" for="password" class="text-left">Password:</label>
            </div>
            <input type="password" id="password_input" name="password" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
            @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Confirm Password input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="confirm_password_input_label" for="password_confirmation" class="text-left">Confirm Password:</label>
            </div>
            <input type="password" id="confirm_password_input" name="password_confirmation" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
            @error('password_confirmation')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Submit button --}}
            <input type="submit" id="submit_button" value="Register" class="mt-[4vh] mb-[4vh] h-12 w-[90%] rounded-md bg-light_mode_blue text-white hover:opacity-90 text-xl md:max-w-[350px] md:mb-[12vh]">

            @if ($errors->any())
            <div class="text-red-500 text-sm">
            {{ $errors->first() }}
            </div>
            @endif

        </form>



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

                                            // Restarting the livewire component
                                            Livewire.dispatch('restart');
                                        })
                                        .catch(error => {
                                            console.log('set_theme_mode console error: ', error);
                                        });

                     first_load_check = false;
                           // End Fetch POST request


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



                // Hr Line dark mode
                document.getElementById('hr_line').classList.toggle('bg-black');
                document.getElementById('hr_line').classList.toggle('bg-white');



                // Input labels dark mode
                document.getElementById('select_label').classList.toggle('text-white');
                document.getElementById('name_input_label').classList.toggle('text-white');
                document.getElementById('email_input_label').classList.toggle('text-white');
                document.getElementById('password_input_label').classList.toggle('text-white');
                document.getElementById('confirm_password_input_label').classList.toggle('text-white');



                // Selection Fields dark mode
                document.getElementById('section_input').classList.toggle('bg-input_dark_mode');
                document.getElementById('section_input').classList.toggle('text-white');

                document.getElementById('option-1').classList.toggle('text-white');
                document.getElementById('option-2').classList.toggle('text-white');
                document.getElementById('option-3').classList.toggle('text-white');
                document.getElementById('option-4').classList.toggle('text-white');
                document.getElementById('option-5').classList.toggle('text-white');



                // Name input dark mode
                document.getElementById('name_input').classList.toggle('bg-input_dark_mode');
                document.getElementById('name_input').classList.toggle('text-white');



                // Email input dark mode
                document.getElementById('email_input').classList.toggle('bg-input_dark_mode');
                document.getElementById('email_input').classList.toggle('text-white');



                // Password input dark mode
                document.getElementById('password_input').classList.toggle('bg-input_dark_mode');
                document.getElementById('password_input').classList.toggle('text-white');



                // Confirm Password input dark mode
                document.getElementById('confirm_password_input').classList.toggle('bg-input_dark_mode');
                document.getElementById('confirm_password_input').classList.toggle('text-white');



                // Submit button dark mode
                document.getElementById('submit_button').classList.toggle('bg-dark_mode_blue');
                document.getElementById('submit_button').classList.toggle('bg-light_mode_blue');



                // // Personality text dark mode
                // document.getElementById('personality_text').classList.toggle('text-white');



                // // Treasure button dark mode
                // document.getElementById('treasure_button').classList.toggle('bg-dark_mode_blue');
                // document.getElementById('treasure_button').classList.toggle('bg-light_mode_blue');



                // // Logout text dark mode
                // document.getElementById('logout_text').classList.toggle('text-white');



                // // Logout button dark mode
                // document.getElementById('logout_button').classList.toggle('text-dark_mode_blue');
                // document.getElementById('logout_button').classList.toggle('text-light_mode_blue');



        })



</script>



</body>
</html>
