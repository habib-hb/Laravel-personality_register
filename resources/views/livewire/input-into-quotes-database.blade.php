
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
                <select wire:model="personality" onchange="select_personality_change(this)" name="personality" id="section_input" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
                    <option {{$personality == '1' ? 'selected' : ''}} id="option-1" value="1" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Extroversion</option>
                    <option {{$personality == '2' ? 'selected' : ''}}  id="option-2" value="2" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Agreeableness</option>
                    <option {{$personality == '3' ? 'selected' : ''}} id="option-3" value="3" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Openness</option>
                    <option  {{$personality == '4' ? 'selected' : ''}} id="option-4" value="4" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Conscientiousness</option>
                    <option {{$personality == '5' ? 'selected' : ''}} id="option-5" value="5" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Neuroticism</option>
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
                <input type="submit" id="submit_button" value="Add Quote" class="mt-[4vh] mb-[2vh] h-12 w-[90%] rounded-md {{$theme_mode == 'dark' ? 'bg-dark_mode_blue' : 'bg-light_mode_blue'}} text-white hover:opacity-90 text-xl md:max-w-[350px] md:mb-[12vh]">

                @if ($errors->any())
                <div class="text-red-500 text-sm">
                {{ $errors->first() }}
                </div>
                @endif

            </form>


            {{-- Session Message --}}
            <h2 id="session-message" class="flex flex-col items-center justify-center w-full {{$theme_mode == 'dark' ? 'text-dark_mode_blue bg-teal-300'  : 'text-light_mode_blue bg-teal-400' }} text-center font-normal font-['Inter'] mt-[2vh]  fixed top-4 z-10">

                @if (session()->has('message'))

                    <span class='p-5'>

                        <span class='text-[16px] underline'>Notification</span><br>

                        <span class='text-[24px]'>{{ session('message') }}</span>

                    </span>

                @endif

            </h2>



        {{-- The Quote List --}}
        <h2 id="quote_list_title" class="{{$theme_mode == 'dark' ? 'text-dark_mode_blue' : 'text-light_mode_blue' }} text-center text-[24px] font-normal font-['Inter'] mb-[2vh]">{{$current_personality_name}} Quote List</h2>

        <div class="flex flex-col gap-4 justify-center items-center mb-4">

            {{-- For each quote, new component --}}
            @foreach ($database_files_personality_quote_single_type as $quote)

                <div wire:key="{{$loop->index}}" class="quote_list_element_body w-[90vw] {{$theme_mode == 'dark' ? 'bg-input_dark_mode' : 'bg-zinc-100'}} rounded-lg relative p-5 shadow-xl">

                    <div class="quote_list_element_text text-center {{$theme_mode == 'dark' ? 'text-white' : 'text-black'}} text-xl font-normal mb-5">{{$quote->quote}}</div>

                    <div class="flex justify-between md:justify-center md:gap-8">

                        <button class="quote_list_element_edit_button w-[35vw] md:w-[200px] h-[6vh] {{$theme_mode == 'dark' ? 'bg-dark_mode_blue' : 'bg-light_mode_blue'}} rounded-lg text-white text-xl font-normal flex items-center justify-center" onclick="edit_quote({{$quote->id}} , `{{$quote->quote}}`)">Edit</button>

                        <button class="quote_list_element_delete_button w-[35vw] md:w-[200px]  h-[6vh] {{$theme_mode == 'dark' ? 'bg-dark_mode_red' : 'bg-light_mode_red'}} rounded-lg text-white text-xl font-normal flex items-center justify-center" onclick="delete_quote({{$quote->id}} , `{{$quote->quote}}`)">Delete</button>
                        {{--  wire:click="deleteQuote({{$quote->id}})" --}}

                    </div>

                </div>


            @endforeach

        </div>



          {{-- Pop-Up Edit Form HTML --}}
          <div id="popup_edit_body" class="fixed inset-0 items-center justify-center bg-black bg-opacity-80 hidden z-50">

              <div id="popup_edit_content" class="{{$theme_mode == 'dark' ? 'bg-input_dark_mode' : 'bg-white'}} p-6 rounded-md w-11/12 max-w-lg relative">

                  <span id="close_popup_edit_btn" class="absolute {{$theme_mode == 'dark' ? 'text-white' : 'text-black'}} top-4 right-4 text-4xl cursor-pointer hover:scale-125">&times;</span>

                  <h2 id="popup_edit_title" class="text-2xl {{$theme_mode == 'dark' ? 'text-white' : 'text-light_mode_blue'}} text-center mb-4">Edit Box</h2>

                  <form id="edit_quote_form" class="space-y-4 flex flex-col w-full items-center justify-center">

                      <div class="w-full">
                          {{-- A hidden Input field --}}
                          <input type="hidden" id="quote_edit_id" name="quote_edit_id" value="">

                          <label for="quote_edit_input" id="quote_edit_input_label" class="block text-sm font-medium {{$theme_mode == 'dark' ? 'text-white' : 'text-gray-700'}}">Quote:</label>

                          <input type="text" id="quote_edit_input" name="quote_edit_input" required class="mt-1 p-2 block w-full border  {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : 'bg-white text-black'}} border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                      </div>

                      <button id = "edit_popup_submit_button" type="submit" class="px-8 py-2  {{ $theme_mode == 'dark' ? 'bg-dark_mode_blue' : 'bg-light_mode_blue'}} text-white rounded">Submit</button>

                  </form>

              </div>

          </div>
            {{-- End Pop-Up Edit Form HTML --}}



        {{-- Pop-Up Delete Form HTML --}}
        <div id="popup_delete_body" class="fixed inset-0 items-center justify-center bg-black bg-opacity-80 hidden z-50">

            <div id="popup_delete_content" class="{{$theme_mode == 'dark' ? 'bg-input_dark_mode' : 'bg-white'}} p-6 rounded-md w-11/12 max-w-lg relative">

                <span id="close_popup_delete_btn" class="absolute {{$theme_mode == 'dark' ? 'text-white' : 'text-black'}} top-4 right-4 text-4xl cursor-pointer hover:scale-125">&times;</span>

                <h2 id="popup_delete_title" class="text-lg {{$theme_mode == 'dark' ? 'text-white' : 'text-light_mode_blue'}} text-center mb-4">Are you sure?</h2>

                <form id="delete_quote_form" class="space-y-4 flex flex-col w-full items-center justify-center">

                    <div class="w-full">

                        {{-- A hidden Input field --}}
                        <input type="hidden" id="quote_delete_id" name="quote_delete_id" value="">

                        <p id="deletable_quote" class="mt-1 p-2 block w-full border  {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : 'bg-white text-black'}} border-gray-300 rounded-md shadow-sm"></p>

                    </div>

                    <button id = "delete_popup_submit_button" type="submit" class="px-8 py-2  {{ $theme_mode == 'dark' ? 'bg-dark_mode_red' : 'bg-light_mode_red'}} text-white rounded">Delete</button>

                </form>

            </div>

        </div>
          {{-- End Pop-Up Delete Form HTML --}}



          {{-- JS Code --}}
          <script>

            // Changing Quotelist Data based on select personality type input change
                function select_personality_change(selected_item){

                    Livewire.dispatch('select_personality_based_data_change' , {personality: selected_item.value})

                }



            // ***Delete Quote Form Pop-up Script
                    // function deleteQuote(id) {
                    //     console.log(Livewire.dispatchTo);
                    //     Livewire.dispatch('delete_quote', {id: id});
                    // }
                        const close_popup_delete_btn = document.getElementById('close_popup_delete_btn');

                        const popup_delete_body = document.getElementById('popup_delete_body');

                        const delete_popup_form_submit = document.getElementById('delete_quote_form');


                        // Opening the delete popup with relevant values
                        function delete_quote (id, quote) {
                            popup_delete_body.classList.remove('hidden');
                            popup_delete_body.classList.add('flex');
                            document.getElementById('deletable_quote').innerHTML = quote;
                            document.getElementById('quote_delete_id').value = id;
                        };

                        // Submitting the delete form data to the livewire method
                        delete_popup_form_submit.addEventListener('submit', (e) => {
                            e.preventDefault();
                            Livewire.dispatch('delete_quote', {
                                id: document.getElementById('quote_delete_id').value
                            });
                            popup_delete_body.classList.remove('flex');
                            popup_delete_body.classList.add('hidden');
                        });

                        // Closing the delete popup
                        close_popup_delete_btn.addEventListener('click', () => {
                            popup_delete_body.classList.remove('flex');
                            popup_delete_body.classList.add('hidden');
                        });

                        // Close the popup_delete_body when clicking outside of the content
                        window.addEventListener('click', function(event) {
                            if (event.target == popup_delete_body) {
                                popup_delete_body.classList.remove('flex');
                                popup_delete_body.classList.add('hidden');
                            }
                        });





            // *** Edit Quote Form Pop-up Script
            //   const open_popup_btn = document.getElementById('open_popup_btn');

                        const close_popup_edit_btn = document.getElementById('close_popup_edit_btn');

                        const popup_edit_body = document.getElementById('popup_edit_body');

                        const edit_popup_form_submit = document.getElementById('edit_quote_form');



                        // Opening the edit popup with relevant values
                        function edit_quote (id, quote) {

                            popup_edit_body.classList.remove('hidden');

                            popup_edit_body.classList.add('flex');

                            // Place the edit quote in the input field
                            document.getElementById('quote_edit_input').value = quote;

                            // Place the id in the edit input field
                            document.getElementById('quote_edit_id').value = id;

                        };

                        // Submitting the edit form data to the livewire method
                        edit_popup_form_submit.addEventListener('submit', (e) => {

                                    e.preventDefault();

                                    Livewire.dispatch('edit_quote_submit', {
                                        id: document.getElementById('quote_edit_id').value,
                                        quote: document.getElementById('quote_edit_input').value
                                    });

                                    popup_edit_body.classList.remove('flex');

                                    popup_edit_body.classList.add('hidden');

                        });

                        close_popup_edit_btn.addEventListener('click', () => {

                            popup_edit_body.classList.remove('flex');

                            popup_edit_body.classList.add('hidden');
                        });

                        // Close the popup_edit_body when clicking outside of the content
                        window.addEventListener('click', (event) => {

                            if (event.target === popup_edit_body) {

                                popup_edit_body.classList.remove('flex');

                                popup_edit_body.classList.add('hidden');

                            }
                        });



              // ***Setup dark/light mode javascript based on localStorage value
            //   function themeMode(){
            //   if(localStorage.getItem('theme_mode') == 'dark') {
            //           // Input labels dark mode
            //         document.getElementById('select_label').classList.toggle('text-white');
            //         document.getElementById('quote_input_label').classList.toggle('text-white');



            //         // Selection Fields dark mode
            //         document.getElementById('section_input').classList.toggle('bg-input_dark_mode');
            //         document.getElementById('section_input').classList.toggle('text-white');

            //         document.getElementById('option-1').classList.toggle('text-white');
            //         document.getElementById('option-2').classList.toggle('text-white');
            //         document.getElementById('option-3').classList.toggle('text-white');
            //         document.getElementById('option-4').classList.toggle('text-white');
            //         document.getElementById('option-5').classList.toggle('text-white');



            //         // Name input dark mode
            //         document.getElementById('quote_input').classList.toggle('bg-input_dark_mode');
            //         document.getElementById('quote_input').classList.toggle('text-white');



            //         // Submit button dark mode
            //         document.getElementById('submit_button').classList.toggle('bg-dark_mode_blue');
            //         document.getElementById('submit_button').classList.toggle('bg-light_mode_blue');



                    // Quote List element section dark mode
                         // Query List title dark mode
                        //  document.getElementById('quote_list_title').classList.toggle('text-light_mode_blue');
                        //  document.getElementById('quote_list_title').classList.toggle('text-dark_mode_blue');

                        //  // query_list_element_body dark mode
                        //  document.querySelectorAll('.quote_list_element_body').forEach(function(element) {
                        //      element.classList.toggle('bg-zinc-100');
                        //      element.classList.toggle('bg-input_dark_mode');
                        //  });

                        //  // query_list_element_text dark mode
                        //  document.querySelectorAll('.quote_list_element_text').forEach(function(element) {
                        //      element.classList.toggle('text-white');
                        //      element.classList.toggle('text-black');
                        //  });

                        //  // query_list_element_edit_button dark mode
                        //  document.querySelectorAll('.quote_list_element_edit_button').forEach(function(element) {
                        //      element.classList.toggle('bg-dark_mode_blue');
                        //      element.classList.toggle('bg-light_mode_blue');
                        //  });

                        //  // query_list_element_delete_button dark mode
                        //  document.querySelectorAll('.quote_list_element_delete_button').forEach(function(element) {
                        //      element.classList.toggle('bg-light_mode_red');
                        //      element.classList.toggle('bg-dark_mode_red');
                        //  });



                    // Edit Popup dark mode
                         // Main box dark/light mode
                        // document.getElementById('popup_content').classList.toggle('bg-white');
                        // document.getElementById('popup_content').classList.toggle('bg-input_dark_mode');

                        // // Close Button dark/light mode
                        // document.getElementById('close_popup_btn').classList.toggle('text-black');
                        // document.getElementById('close_popup_btn').classList.toggle('text-white');

                        // // Title Dark/Light Mode
                        // document.getElementById('popup_title').classList.toggle('text-light_mode_blue');
                        // document.getElementById('popup_title').classList.toggle('text-white');

                        // // quote_edit_input_label dark/light mode
                        // document.getElementById('quote_edit_input_label').classList.toggle('text-gray-700');
                        // document.getElementById('quote_edit_input_label').classList.toggle('text-white');

                        // // quote_edit_input dark/light mode
                        // document.getElementById('quote_edit_input').classList.toggle('bg-white');
                        // document.getElementById('quote_edit_input').classList.toggle('bg-input_dark_mode');
                        // document.getElementById('quote_edit_input').classList.toggle('text-white');
                        // document.getElementById('quote_edit_input').classList.toggle('text-black');

                        // // edit_popup_submit_button dark/light mode
                        // document.getElementById('edit_popup_submit_button').classList.toggle('bg-light_mode_blue');
                        // document.getElementById('edit_popup_submit_button').classList.toggle('bg-dark_mode_blue');
              //} // If end

            //} // themeMode Function End

            // themeMode();

            </script>



    </div>





