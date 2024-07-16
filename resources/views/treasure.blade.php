<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body id="body_element" class=" transition-all">



    {{-- Livewire Element --}}
    @livewire('quoter')

    </main>


    @livewireScripts



</body>
</html>
