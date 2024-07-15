 {{-- This main is taking the whole height and containing the whole body --}}
 <main id="main_element" class="h-[100vh] {{$treasure_theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-light_gray'}} transition-all">

    <nav class="w-full h-[64px] flex flex-col justify-center items-center {{$treasure_theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-slate-50'}} " style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

        <img id="dark_mode_logo" class="cursor-pointer {{$treasure_theme_mode == 'dark' ? '' : 'hidden'}}" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

        <img id="light_mode_logo" class="cursor-pointer {{$treasure_theme_mode == 'dark' ? 'hidden' : ''}}" src="{{ asset('files/images/light_mode_logo.png') }}" width="88px" alt="Pic">

    </nav>



<div>
    {{-- The Master doesn't talk, he acts. --}}



    {{-- The Inspirational Quote --}}
    <h2 id="quote_text" class=" {{$treasure_theme_mode == 'dark' ? 'text-white' : 'text-black'}} text-center text-[32px] font-normal font-['Inter'] quote_pc mt-[30vh] md:mt-[30vh] px-4">{{$current_quote}}</h2>



    {{-- The Repeat Magic Button --}}
    <div class="flex flex-col justify-center items-center">

         <button id="repeat_magic_button" wire:click="quoteHunter" class=" {{$treasure_theme_mode == 'dark' ? 'bg-[#222222]' : 'bg-light_mode_blue'}} rounded-lg text-white mt-4 w-[200px] py-1 hover:opacity-90">Repeat The Magic</button>

         {{-- Disabled version of the button above --}}
         <button id="repeat_magic_button_disabled" class="{{$treasure_theme_mode == 'dark' ? 'bg-[#222222]' : 'bg-light_mode_blue'}} rounded-lg text-white mt-4 w-[200px] py-1 hover:opacity-90 hidden">Repeat The Magic</button>



    </div>


    {{-- The Change Theme Mode Button --}}
    <div class="flex flex-col justify-center items-center">

    <button id="change_treasure_theme_mode_button" wire:click="change_treasure_theme_mode" class=" {{$treasure_theme_mode == 'dark' ? 'bg-[#222222]' : 'bg-light_mode_blue'}} rounded-lg text-white mt-4 w-[200px] py-1 hover:opacity-90 text-center">Change Theme</button>

    </div>



    {{-- Attempting Php to Javascript information transfer --}}
    <p id="php_to_javascript_data_transfer" class="hidden">{{$total_quotes}}</p>



      {{-- G-sap Library --}}

        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script>
            // Limiting the repeated clicks of the repeat magic button
            document.getElementById("repeat_magic_button").addEventListener("click", function() {

                document.getElementById("repeat_magic_button_disabled").classList.toggle("hidden");
                document.getElementById("repeat_magic_button").classList.toggle("hidden");

            })



             // Quote Text Colors Operation
                    if(@json($treasure_theme_mode) == 'dark'){
                    text_colors = [
                        "#007BFF",
                        "#DC143C",
                        "#FFD700",
                        "#32CD32",
                        "#00FFFF",
                        "#FF00FF",
                        "#40E0D0",
                        "#FF69B4",
                        "#7FFF00",
                        "#008080"
                    ]
                    } else {
                    text_colors = [
                        "#2980B9",  // Darker Soft Blue
                        "#117A65",  // Darker Mint Green
                        "#C0392B",  // Darker Coral
                        "#6C3483",  // Darker Lavender
                        "#B7950B",  // Darker Mustard Yellow
                        "#D35400",  // Darker Peach
                        "#148F77",  // Darker Teal
                        "#6C3483",  // Darker Dusty Rose
                        "#1E8449",  // Darker Seafoam Green
                        "#4D5656"   // Darker Gray
                    ]
                    }



            // php_to_javascript_data_transfer
            let php_data_total_quotes = document.getElementById("php_to_javascript_data_transfer").innerHTML;
            php_data_total_quotes = parseInt(php_data_total_quotes);
            console.log(typeof php_data_total_quotes);


            // G-sap Animation
            let tl = gsap.timeline({repeat: -1, yoyo: true});
            tl.to("#quote_text", {color: text_colors[0], y: -100, duration: 3});



            // Things to do after the button is clicked in addition to the php method
            let clickCount = 0;
            document.getElementById("repeat_magic_button").addEventListener("click", () => {

                    clickCount++;

                    // Emptying the quote_text element
                    document.getElementById("quote_text").innerHTML = ":)"; // It will imidiately show up after the livewire click and keep showing until the livedata gets back



                    // Kill the existing timeline if it exists
                    if (tl) {
                            tl.kill();
                        }

                    // G-sap Animation
                    tl = gsap.timeline({repeat: -1, yoyo: true});
                    tl.to("#quote_text", {color: dark_mode_check_change_theme_button ? 'white' : 'black', y: 0, duration: 0}); // dark_mode_check_change_theme_button - this variable is from below. The default is dark mode
                    tl.to("#quote_text", {color: clickCount == 10 ? text_colors[0] : text_colors[clickCount] , y: -100, duration: 3});//text_colors[php_data]

                    // Resetting the clickCount
                    if (clickCount == 10) {
                            clickCount = 0;
                        }

                    })



                // The change theme button operation
                let dark_mode_check_change_theme_button = true; // default is dark mode
                document.getElementById("change_treasure_theme_mode_button").addEventListener("click", () => {

                        // Altering the theme mode immediately
                        dark_mode_check_change_theme_button = !dark_mode_check_change_theme_button;

                        clickCount++;

                       // Changing the theme mode in javascript before the livewire change on the backend occurs. It's kind of a hacky way of doing it to have the real time change within javascript.
                        // Quote Text Colors Operation
                            if(dark_mode_check_change_theme_button){
                            text_colors = [
                                "#007BFF",
                                "#DC143C",
                                "#FFD700",
                                "#32CD32",
                                "#00FFFF",
                                "#FF00FF",
                                "#40E0D0",
                                "#FF69B4",
                                "#7FFF00",
                                "#008080"
                            ]
                            } else {
                            text_colors = [
                                "#2980B9",  // Darker Soft Blue
                                "#117A65",  // Darker Mint Green
                                "#C0392B",  // Darker Coral
                                "#6C3483",  // Darker Lavender
                                "#B7950B",  // Darker Mustard Yellow
                                "#D35400",  // Darker Peach
                                "#148F77",  // Darker Teal
                                "#6C3483",  // Darker Dusty Rose
                                "#1E8449",  // Darker Seafoam Green
                                "#4D5656"   // Darker Gray
                            ]
                            }

                        // Emptying the quote_text element
                        document.getElementById("quote_text").innerHTML = ":)"; // It will imidiately show up after the livewire click and keep showing until the livedata gets back



                        // Kill the existing timeline if it exists
                        if (tl) {
                                tl.kill();
                            }

                        // G-sap Animation
                        tl = gsap.timeline({repeat: -1, yoyo: true});
                        tl.to("#quote_text", {color: dark_mode_check_change_theme_button ? 'white' : 'black', y: 0, duration: 0});
                        tl.to("#quote_text", {color: clickCount == 10 ? text_colors[0] : text_colors[clickCount] , y: -100, duration: 3});//text_colors[php_data]

                        // Resetting the clickCount
                        if (clickCount == 10) {
                                clickCount = 0;
                            }

                        })



        </script>



</div>

 </main>
