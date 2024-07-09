<div>
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



        {{-- Form Starts- 5 inputs (section select with 5 options, name , email, password, confirm password) --}}
        <form action="{{ route('register') }}" method="POST" class="w-full flex flex-col justify-center items-center mt-8 transition-all md:mt-2">

            {{-- Cross site request forgery Protection --}}
            @csrf

                {{-- Select Personality Type Input --}}
                <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:mt-2 md:max-w-[500px]">
                    <label id="select_label" for="personality" class="text-left">Select The Personality Type:</label>
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
                    <label id="quote_input_label" for="name" class="text-left">New Quote:</label>
                </div>
                <input type="text" id="quote_input" name="quote_input" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
                @error('quote_input')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror



                {{-- Submit button --}}
                <input type="submit" id="submit_button" value="Add Quote" class="mt-[4vh] mb-[4vh] h-12 w-[90%] rounded-md bg-light_mode_blue text-white hover:opacity-90 text-xl md:max-w-[350px] md:mb-[12vh]">

                @if ($errors->any())
                <div class="text-red-500 text-sm">
                {{ $errors->first() }}
                </div>
                @endif

            </form>



        </main>



        {{-- ******************** Javascript Code ******************** --}}

        <script>
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
</div>
