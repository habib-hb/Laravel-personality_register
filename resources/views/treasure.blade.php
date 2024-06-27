<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <style>

        /* .quote_pc{
            margin-top: 30vh;
        }

        @media screen and (max-width: 800px) {

            .quote_pc{
                margin-top: 40vh;
            }
        } */

    </style>


</head>

<body id="body_element" class=" transition-all">

    {{-- This main is taking the whole height and containing the whole body --}}
    <main id="main_element" class="h-[100vh] bg-dark_gray transition-all">

    <nav class="w-full h-[64px] flex flex-col justify-center items-center bg-dark_gray " style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

        <img id="dark_mode_logo" class="cursor-pointer" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

    </nav>



    {{-- The Inspirational Quote --}}
    <h2 class="text-white text-center text-[32px] font-normal font-['Inter'] quote_pc mt-[30vh] md:mt-[30vh]">Quote</h2>

    

    {{-- The Repeat Magic Button --}}
    <div class="flex flex-col justify-center items-center">
    <button class="bg-[#222222] rounded-lg text-white mt-4 w-[200px] py-1 hover:opacity-90">Repeat The Magic</button>
    </div>




    </main>



</body>
</html>    