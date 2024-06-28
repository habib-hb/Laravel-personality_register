<div>
    {{-- The Master doesn't talk, he acts. --}}



    {{-- The Inspirational Quote --}}
    <h2 id="quote_text" class="text-white text-center text-[32px] font-normal font-['Inter'] quote_pc mt-[30vh] md:mt-[30vh]">{{$current_quote}}</h2>



    {{-- The Repeat Magic Button --}}
    <div class="flex flex-col justify-center items-center">
        <h2 wire:loading class="text-white text-center text-[32px] font-normal font-['Inter'] mt-[4vh]">Loading... {{$current_session_int}}</h2>
    <button wire:click="quoteHunter" class="bg-[#222222] rounded-lg text-white mt-4 w-[200px] py-1 hover:opacity-90">Repeat The Magic</button>
    </div>


    	{{-- References --}}
    {{-- // Electric Blue - #007BFF
    // Crimson Red - #DC143C
    // Gold - #FFD700
    // Lime Green - #32CD32
    // Cyan - #00FFFF
    // Magenta - #FF00FF
    // Turquoise - #40E0D0
    // Bright Pink - #FF69B4
    // Chartreuse Green - #7FFF00
    // Teal - #008080 --}}





      {{-- G-sap Library --}}

        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script>
            let tl = gsap.timeline({repeat: -1, yoyo: true});
            tl.to("#quote_text", {color: "#007BFF", y: -100, duration: 3});
        </script>

    {{-- @elseif($current_session_int == 1)
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script>
            let tl = gsap.timeline({repeat: -1, yoyo: true});
            tl.to("#quote_text", {color: "#DC143C", y: -100, duration: 3});
        </script>
    @elseif($current_session_int == 2)
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script>
            let tl = gsap.timeline({repeat: -1, yoyo: true});
            tl.to("#quote_text", {color: "#FFD700", y: -100, duration: 3});
        </script>
    @endif --}} 








</div>
