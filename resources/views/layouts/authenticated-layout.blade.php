<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BengKlik | Bengkel Koding Klinik</title>

    <!-- Vite Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <div class="w-dvw h-dvh bg-gradient-to-br from-gray-300 to-gray-100 flex flex-row justify-center items-center">
        <x-layouts.sidebar />
        <div class="w-full h-full px-12 py-8 flex flex-col">
            <x-layouts.header />
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>

</html>
