<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/ba0903e616.js" crossorigin="anonymous"></script>
    <title>BengKlik | Bengkel Koding Klinik</title>

    <!-- Vite Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <livewire:scripts />
    <div class="w-dvw h-dvh bg-gradient-to-br from-gray-300 to-gray-100 flex flex-col justify-center items-center">
        @yield('content')
    </div>
</body>

</html>
