<div>
    {{-- The Master doesn't talk, he acts. --}}



    {{-- The Inspirational Quote --}}
    <h2 id="quote_text" class="text-white text-center text-[32px] font-normal font-['Inter'] quote_pc mt-[30vh] md:mt-[30vh] px-4">{{$current_quote}}</h2>



    {{-- The Repeat Magic Button --}}
    <div class="flex flex-col justify-center items-center">

    <button id="repeat_magic_button" wire:click="quoteHunter" class="bg-[#222222] rounded-lg text-white mt-4 w-[200px] py-1 hover:opacity-90">Repeat The Magic</button>

    </div>



    {{-- Attempting Php to Javascript information transfer --}}
    <p id="php_to_javascript_data_transfer" class="hidden">{{$total_quotes}}</p>



      {{-- G-sap Library --}}

        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script>

            const text_colors = [
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
                    document.getElementById("quote_text").innerHTML = ":)";



                    // php_to_javascript_data_transfer
                    // php_data = document.getElementById("php_to_javascript_data_transfer").innerHTML;
                    // php_data = parseInt(php_data);
                    // console.log(typeof php_data);



                    // Kill the existing timeline if it exists
                    if (tl) {
                            tl.kill();
                        }

                    // G-sap Animation
                    tl = gsap.timeline({repeat: -1, yoyo: true});
                    tl.to("#quote_text", {color: "white", y: 0, duration: 0});
                    tl.to("#quote_text", {color: clickCount == 10 ? text_colors[0] : text_colors[clickCount] , y: -100, duration: 3});//text_colors[php_data]

                    // Resetting the clickCount
                    if (clickCount == 10) {
                            clickCount = 0;
                        }

                    })



        </script>



</div>
