
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



        {{-- The Quote List --}}
        <h2 id="quote_list_title" class="text-light_mode_blue text-center text-[24px] font-normal font-['Inter'] mb-[2vh]">Quote List</h2>

        <div class="flex flex-col gap-4 justify-center items-center mb-4">

            {{-- For each quote, new component --}}
            @foreach ($database_files_personality_quote_single_type as $quote)

                <div wire:key="{{$loop->index}}" class="quote_list_element_body w-[90vw] bg-zinc-100 rounded-lg relative p-5">

                    <div class="quote_list_element_text text-center text-black text-xl font-normal mb-5">{{$quote->quote}}</div>

                    <div class="flex justify-between">

                        <button class="quote_list_element_edit_button w-[35vw] h-[6vh] bg-light_mode_blue rounded-lg text-white text-xl font-normal flex items-center justify-center" onclick="editQuote({{$quote->id}})">Edit</button>

                        <button class="quote_list_element_delete_button w-[35vw] h-[6vh] bg-light_mode_red rounded-lg text-white text-xl font-normal flex items-center justify-center" wire:click="deleteQuote({{$quote->id}})">Delete</button>

                    </div>

                </div>


            @endforeach

        </div>



          {{-- Testing HTML --}}
          <button id="openPopupBtn" class="px-4 py-2 bg-blue-500 text-white rounded">Open Edit Form</button>

          <div id="popup" class="fixed inset-0 items-center justify-center bg-black bg-opacity-80 hidden z-50">

              <div id="popupContent" class="bg-white p-6 rounded-md w-11/12 max-w-lg relative">

                  <span id="closePopupBtn" class="absolute text-black top-4 right-4 text-2xl cursor-pointer">&times;</span>

                  <h2 id="popupTitle" class="text-2xl text-light_mode_blue text-center mb-4">Edit Box</h2>

                  <form id="editForm" class="space-y-4 flex flex-col w-full items-center justify-center">

                      <div class="w-full">
                          <label for="quote_edit_input" id="quote_edit_input_label" class="block text-sm font-medium text-gray-700">Name:</label>
                          <input type="text" id="quote_edit_input" name="quote_edit_input" required class="mt-1 p-2 block w-full border bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                      </div>

                      <button id = "edit_popup_submit_button" type="submit" class="px-8 py-2 bg-light_mode_blue text-white rounded">Submit</button>

                  </form>

              </div>

          </div>



          {{-- JS Code --}}
          <script>

            // Testing Pop-up Script
            //   document.addEventListener('DOMContentLoaded', () => {
              const openPopupBtn = document.getElementById('openPopupBtn');
              const closePopupBtn = document.getElementById('closePopupBtn');
              const popup = document.getElementById('popup');

              openPopupBtn.addEventListener('click', () => {
                  popup.classList.remove('hidden');
                  popup.classList.add('flex');
              });

              closePopupBtn.addEventListener('click', () => {
                  popup.classList.remove('flex');
                  popup.classList.add('hidden');
              });

              // Close the popup when clicking outside of the content
              window.addEventListener('click', (event) => {
                  if (event.target === popup) {
                      popup.classList.remove('flex');
                      popup.classList.add('hidden');
                  }
              });
              //  });

            </script>



    </div>





