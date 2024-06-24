<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
    <main id="main_element" class="h-[100vh] bg-light_gray transition-all"> 

    <nav class="w-full h-[64px] flex flex-col justify-center items-center bg-white " style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

        <img id="light_mode_logo" class="cursor-pointer" src="{{ asset('files/images/light_mode_logo.png') }}" width="88px" alt="Pic">

        {{-- Dark Mode Logo --}}
        <img id="dark_mode_logo" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

    </nav>

        <div id="dark_mode_toggle_button" class="w-full flex flex-col justify-center items-center mt-8 transition-all">

            <img id="light_mode_icon" class="cursor-pointer" src="{{ asset('files/images/light_mode_icon.png') }}" width = "64px" alt="">

            {{-- Dark Mode Icon --}}
            <img id="dark_mode_icon" class="cursor-pointer hidden" src="{{ asset('files/images/dark_mode_icon.png') }}" width = "64px" alt="">

        </div>



       @auth

                {{-- When User Is coming from 'Register' Page --}}

                @if(url()->previous() == route('register'))

                        <div class = "flex flex-col items-center mt-[20%]">

                            <h3 id="welcome_text" class="mt-[20%] text-center font-medium text-lg">WoooHooooo!!</h3>

                            <h2 id="user_name" class="mt-[3%] text-center font-medium text-4xl text-light_mode_blue">{{ auth()->user()->name }}</h2>

                            <p id="personality_text" class="mt-[4%] text-center font-medium text-lg">Let's open the treasure of `Personality_type` personality :)</p>

                            <a href="/treasure">

                                <button id="treasure_button" class="mt-[4%] h-12 w-80 rounded-md bg-light_mode_blue text-white">Treasure</button>

                            </a>

                            <h4 id="logout_text" class="mt-[4%]">Wanna log out instead? OK</h4>

                            <a id="logout_button" class="mt-[2%] text-light_mode_blue text-lg" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                        
                
              {{-- When The user is logged in or used remember key --}}
                 @else

                        <div class = "flex flex-col items-center mt-[20%]">

                            <h3 id="welcome_text" class="mt-[20%] text-center font-medium text-lg">Welcome Back</h3>

                            <h2 id="user_name" class="mt-[3%] text-center font-medium text-4xl text-light_mode_blue">{{ auth()->user()->name }}</h2>

                            <p id="personality_text" class="mt-[4%] text-center font-medium text-lg">Let's open the treasure of `Personality_type` personality :)</p>

                            <a href="/treasure">

                                <button id="treasure_button" class="mt-[4%] h-12 w-80 rounded-md bg-light_mode_blue text-white">Treasure</button>

                            </a>

                            <h4 id="logout_text" class="mt-[4%]">Wanna log out instead? OK</h4>

                            <a id="logout_button" class="mt-[2%] text-light_mode_blue text-lg" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>  
                
            

                @endif
         
         
                
       {{-- When The user is not logged in --}}
       {{-- It's the auth else --}}
        @else

            <div class = "flex flex-col items-center mt-[20%]">

                {{-- It's here just for preventing the css class related js error --}}
                <h3 id="welcome_text" class="mt-[20%] text-center font-medium text-lg hidden">Place Holder</h3>

                <h2 id="user_name" class="mt-[3%] text-center font-medium text-4xl text-light_mode_blue">Welcome</h2>

                <p id="personality_text" class="mt-[4%] text-center font-medium text-lg">Seems like you haven’t Registered yet! Please click the link below to see the magic :)</p>

                <a href="/treasure">

                    <button id="treasure_button" class="mt-[4%] h-12 w-80 rounded-md bg-light_mode_blue text-white">Register</button>

                </a>

                <h4 id="logout_text" class="mt-[4%]">Already have an account? Then, please Log In</h4>

                <a id="logout_button" class="mt-[2%] text-light_mode_blue text-lg" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log In
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>


       @endauth


    </main>
    


    <script>
            document.querySelector('#dark_mode_toggle_button').addEventListener('click', ()=>{

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
                    document.querySelector('nav').classList.toggle('bg-white');
                    document.querySelector('nav').classList.toggle('bg-dark_gray');



                    // Welcome text dark mode
                    document.getElementById('welcome_text').classList.toggle('text-white');



                    // User name dark mode
                    document.getElementById('user_name').classList.toggle('text-dark_mode_blue');
                    document.getElementById('user_name').classList.toggle('text-light_mode_blue');



                    // Personality text dark mode
                    document.getElementById('personality_text').classList.toggle('text-white');



                    // Treasure button dark mode
                    document.getElementById('treasure_button').classList.toggle('bg-dark_mode_blue');
                    document.getElementById('treasure_button').classList.toggle('bg-light_mode_blue');



                    // Logout text dark mode
                    document.getElementById('logout_text').classList.toggle('text-white');



                    // Logout button dark mode
                    document.getElementById('logout_button').classList.toggle('text-dark_mode_blue');
                    document.getElementById('logout_button').classList.toggle('text-light_mode_blue');



            })

    </script>



</body>
</html>