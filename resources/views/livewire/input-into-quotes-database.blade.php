
    <div id="quotes_livewire_component">

        {{-- Form Starts- 5 inputs (section select with 5 options, name , email, password, confirm password) --}}
        <form wire:submit.prevent="submit" id="add_quote_form" class="w-full flex flex-col justify-center items-center mt-8 transition-all md:mt-2">
            {{-- action="{{ route('input-quotes-post') }}" method="POST"--}}

            {{-- Cross site request forgery Protection --}}
            @csrf

                {{-- Select Personality Type Input --}}
                <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:mt-2 md:max-w-[500px]">
                    <label id="select_label" for="personality" class="text-left">Select The Personality Type:</label>
                </div>
                <select wire:model="personality" name="personality" id="section_input" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
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
                <input wire:model="quote_input" type="text" id="quote_input" name="quote_input" class="w-[90vw] border-none rounded-md md:max-w-[500px]">
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


            {{-- Session Message --}}
            <h2 id="session-message" class="text-light_mode_blue text-center text-[16px] font-normal font-['Inter'] mt-[4vh]">

                @if (session()->has('message'))
                    {{ session('message') }}
                @endif

            </h2>



    </div>

