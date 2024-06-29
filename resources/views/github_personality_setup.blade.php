<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body id="body_element" class=" transition-all">

    {{-- This main is taking the whole height and containing the whole body --}}
    <main id="main_element" class="h-[100vh] bg-dark_gray transition-all">

    <nav class="w-full h-[64px] flex flex-col justify-center items-center bg-dark_gray " style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

        <img id="dark_mode_logo" class="cursor-pointer" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

    </nav>



    {{-- Personality Submit --}}
    <form action="{{ route('personality_setup') }}" method="POST" class="w-full flex flex-col justify-center items-center mt-8 transition-all md:mt-[25vh]">

        {{-- Cross site request forgery Protection --}}
        @csrf

            {{-- Select Personality Type Input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:mt-2 md:max-w-[500px]">
                <label id="select_label" for="personality" class="text-left text-white">Select Your Personality Type:</label>
            </div>
            <select name="personality" id="section_input" class="w-[90vw] border-none rounded-md md:max-w-[500px] bg-input_dark_mode text-white">
                <option id="option-1" value="1" class="text-white">Extroversion</option>
                <option id="option-2" value="2" class="text-white">Agreeableness</option>
                <option id="option-3" value="3" class="text-white">Openness</option>
                <option id="option-4" value="4" class="text-white">Conscientiousness</option>
                <option id="option-5" value="5" class="text-white">Neuroticism</option>
            </select>

            {{-- Submit button --}}
            <input type="submit" id="submit_button" value="Submit" class="mt-[4vh] mb-[4vh] h-12 w-[90%] rounded-md bg-light_mode_blue text-white hover:opacity-90 text-xl md:max-w-[350px] md:mb-[12vh]">

        </form>



    </main>



</body>
</html>