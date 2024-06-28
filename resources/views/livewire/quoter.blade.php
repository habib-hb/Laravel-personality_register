<div>
    {{-- The Master doesn't talk, he acts. --}}
    


    {{-- The Inspirational Quote --}}
    <h2 class="text-white text-center text-[32px] font-normal font-['Inter'] quote_pc mt-[30vh] md:mt-[30vh]">{{$current_quote}}</h2>

    

    {{-- The Repeat Magic Button --}}
    <div class="flex flex-col justify-center items-center">
        <h2 wire:loading class="text-white text-center text-[32px] font-normal font-['Inter'] mt-[4vh]">Loading...</h2>
    <button wire:click="quoteHunter" class="bg-[#222222] rounded-lg text-white mt-4 w-[200px] py-1 hover:opacity-90">Repeat The Magic</button>
    </div>



</div>
