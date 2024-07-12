
    <div id="quotes_livewire_component">

        {{-- Form Starts- 5 inputs (section select with 5 options, name , email, password, confirm password) --}}
        <form wire:submit.prevent="submit" id="add_quote_form" class="w-full flex flex-col justify-center items-center mt-8 transition-all md:mt-2">
            {{-- action="{{ route('input-quotes-post') }}" method="POST"--}}

            {{-- Cross site request forgery Protection --}}
            @csrf

                {{-- Select Personality Type Input --}}
                <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:mt-2 md:max-w-[500px]">
                    <label id="select_label" for="personality" class="text-left {{$theme_mode == 'dark' ? 'text-white' : 'text-black'}}">Select The Personality Type:</label>
                </div>
                <select wire:model="personality" name="personality" id="section_input" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
                    <option id="option-1" value="1" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Extroversion</option>
                    <option id="option-2" value="2" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Agreeableness</option>
                    <option id="option-3" value="3" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Openness</option>
                    <option id="option-4" value="4" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Conscientiousness</option>
                    <option id="option-5" value="5" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Neuroticism</option>
                </select>
                @error('personality')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                {{-- Name input --}}
                <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                    <label id="quote_input_label" for="name" class="text-left {{$theme_mode == 'dark' ? 'text-white' : 'text-black'}}">New Quote:</label>
                </div>
                <input wire:model="quote_input" type="text" id="quote_input" name="quote_input" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
                @error('quote_input')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror



                {{-- Submit button --}}
                <input type="submit" id="submit_button" value="Add Quote" class="mt-[4vh] mb-[4vh] h-12 w-[90%] rounded-md {{$theme_mode == 'dark' ? 'bg-dark_mode_blue' : 'bg-light_mode_blue'}} text-white hover:opacity-90 text-xl md:max-w-[350px] md:mb-[12vh]">

                @if ($errors->any())
                <div class="text-red-500 text-sm">
                {{ $errors->first() }}
                </div>
                @endif

            </form>


            {{-- Session Message --}}
            <h2 id="session-message" class="{{$theme_mode == 'dark' ? 'text-dark_mode_blue' : 'text-light_mode_blue' }} text-center text-[16px] font-normal font-['Inter'] mt-[4vh]">

                @if (session()->has('message'))
                    {{ session('message') }}
                @endif

            </h2>



        {{-- The Quote List --}}
        <h2 id="quote_list_title" class="{{$theme_mode == 'dark' ? 'text-dark_mode_blue' : 'text-light_mode_blue' }} text-center text-[24px] font-normal font-['Inter'] mb-[2vh]">Quote List</h2>

        <div class="flex flex-col gap-4 justify-center items-center mb-4">

            {{-- For each quote, new component --}}
            @foreach ($database_files_personality_quote_single_type as $quote)

                <div wire:key="{{$loop->index}}" class="quote_list_element_body w-[90vw] {{$theme_mode == 'dark' ? 'bg-input_dark_mode' : 'bg-zinc-100'}} rounded-lg relative p-5">

                    <div class="quote_list_element_text text-center {{$theme_mode == 'dark' ? 'text-white' : 'text-black'}} text-xl font-normal mb-5">{{$quote->quote}}</div>

                    <div class="flex justify-between">

                        <button class="quote_list_element_edit_button w-[35vw] h-[6vh] {{$theme_mode == 'dark' ? 'bg-dark_mode_blue' : 'bg-light_mode_blue'}} rounded-lg text-white text-xl font-normal flex items-center justify-center" onclick="editQuote({{$quote->id}} , `{{$quote->quote}}`)">Edit</button>

                        <button class="quote_list_element_delete_button w-[35vw] h-[6vh] {{$theme_mode == 'dark' ? 'bg-dark_mode_red' : 'bg-light_mode_red'}} rounded-lg text-white text-xl font-normal flex items-center justify-center" onclick="deleteQuote({{$quote->id}})">Delete</button>
                        {{--  wire:click="deleteQuote({{$quote->id}})" --}}

                    </div>

                </div>


            @endforeach

        </div>



          {{-- Pop-Up HTML --}}
          <button id="openPopupBtn" class="px-4 py-2 bg-blue-500 text-white rounded">Open Edit Form</button>

          <div id="popup" class="fixed inset-0 items-center justify-center bg-black bg-opacity-80 hidden z-50">

              <div id="popupContent" class="{{$theme_mode == 'dark' ? 'bg-input_dark_mode' : 'bg-white'}} p-6 rounded-md w-11/12 max-w-lg relative">

                  <span id="closePopupBtn" class="absolute {{$theme_mode == 'dark' ? 'text-white' : 'text-black'}} top-4 right-4 text-2xl cursor-pointer">&times;</span>

                  <h2 id="popupTitle" class="text-2xl {{$theme_mode == 'dark' ? 'text-white' : 'text-light_mode_blue'}} text-center mb-4">Edit Box</h2>

                  <form id="editForm" class="space-y-4 flex flex-col w-full items-center justify-center">

                      <div class="w-full">
                          <label for="quote_edit_input" id="quote_edit_input_label" class="block text-sm font-medium {{$theme_mode == 'dark' ? 'text-white' : 'text-gray-700'}}">Quote:</label>
                          <input type="text" id="quote_edit_input" name="quote_edit_input" required class="mt-1 p-2 block w-full border bg-white {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : 'bg-white text-black'}} border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                      </div>

                      <button id = "edit_popup_submit_button" type="submit" class="px-8 py-2  {{ $theme_mode == 'dark' ? 'bg-dark_mode_blue' : 'bg-light_mode_blue'}} text-white rounded">Submit</button>

                  </form>

              </div>

          </div>



          {{-- JS Code --}}
          <script>
            // ***Delete Quote Function
            function deleteQuote(id) {
                console.log(Livewire.dispatchTo);
                Livewire.dispatch('deleteQuote', {id: id});
            }



            // ***Pop-up Script
              const openPopupBtn = document.getElementById('openPopupBtn');

              const closePopupBtn = document.getElementById('closePopupBtn');

              const popup = document.getElementById('popup');



               function editQuote (id, quote) {

                  popup.classList.remove('hidden');

                  popup.classList.add('flex');

                 // Place the quote in the input field
                  document.getElementById('quote_edit_input').value = quote;

              };

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



              // ***Setup dark/light mode javascript based on localStorage value
              function themeMode(){
              if(localStorage.getItem('theme_mode') == 'dark') {
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



                    // Quote List element section dark mode
                         // Query List title dark mode
                         document.getElementById('quote_list_title').classList.toggle('text-light_mode_blue');
                         document.getElementById('quote_list_title').classList.toggle('text-dark_mode_blue');

                         // query_list_element_body dark mode
                         document.querySelectorAll('.quote_list_element_body').forEach(function(element) {
                             element.classList.toggle('bg-zinc-100');
                             element.classList.toggle('bg-input_dark_mode');
                         });

                         // query_list_element_text dark mode
                         document.querySelectorAll('.quote_list_element_text').forEach(function(element) {
                             element.classList.toggle('text-white');
                             element.classList.toggle('text-black');
                         });

                         // query_list_element_edit_button dark mode
                         document.querySelectorAll('.quote_list_element_edit_button').forEach(function(element) {
                             element.classList.toggle('bg-dark_mode_blue');
                             element.classList.toggle('bg-light_mode_blue');
                         });

                         // query_list_element_delete_button dark mode
                         document.querySelectorAll('.quote_list_element_delete_button').forEach(function(element) {
                             element.classList.toggle('bg-light_mode_red');
                             element.classList.toggle('bg-dark_mode_red');
                         });



                    // Edit Popup dark mode
                        // Main box dark mode
                        document.getElementById('popupContent').classList.toggle('bg-white');
                        document.getElementById('popupContent').classList.toggle('bg-input_dark_mode');

                        // Close Button dark mode
                        document.getElementById('closePopupBtn').classList.toggle('text-black');
                        document.getElementById('closePopupBtn').classList.toggle('text-white');

                        // Title Dark Mode
                        document.getElementById('popupTitle').classList.toggle('text-light_mode_blue');
                        document.getElementById('popupTitle').classList.toggle('text-white');

                        // quote_edit_input_label dark mode
                        document.getElementById('quote_edit_input_label').classList.toggle('text-gray-700');
                        document.getElementById('quote_edit_input_label').classList.toggle('text-white');

                        // quote_edit_input dark mode
                        document.getElementById('quote_edit_input').classList.toggle('bg-white');
                        document.getElementById('quote_edit_input').classList.toggle('bg-input_dark_mode');
                        document.getElementById('quote_edit_input').classList.toggle('text-white');
                        document.getElementById('quote_edit_input').classList.toggle('text-black');

                        // edit_popup_submit_button dark mode
                        document.getElementById('edit_popup_submit_button').classList.toggle('bg-light_mode_blue');
                        document.getElementById('edit_popup_submit_button').classList.toggle('bg-dark_mode_blue');
              } // If end

            } // themeMode Function End

            // themeMode();

            </script>



    </div>





