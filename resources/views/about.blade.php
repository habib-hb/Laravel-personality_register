<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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




        })



</script>



</body>
</html>
