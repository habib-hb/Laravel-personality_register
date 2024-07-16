<div id="profile_popup" class="absolute top-0 h-full w-full bg-black hidden opacity-0 transition-opacity duration-700 ease-in-out">
    <!-- Close Button -->
    <div id="profile_popup_close_btn" class="close-btn absolute top-4 right-4 text-white cursor-pointer text-6xl hover:scale-125">&times;</div>

    <!-- Profile Details -->
    <div class="text-center text-white mt-[20vh]">
        <h1 class="text-4xl">{{ auth()->user()->name }}</h1>
        <p class="text-lg">Personality Type: {{ isset($personality) ? $personality : 'Personality_type' }}</p>
    </div>

    <!-- Options -->
    <div class="text-center text-blue-400 mt-8">
        <a href="/profile" class="block my-2 text-2xl hover:text-3xl">Edit Profile</a>
        <a href="/input_quotes" class="block my-2 text-2xl hover:text-3xl">Manage Quotes</a>
        <a href="/change_personality" class="block my-2 text-2xl hover:text-3xl">Change Personality</a>
        <a href="/about" class="block my-2 text-2xl mt-36 hover:text-3xl">About</a>
    </div>
</div>
