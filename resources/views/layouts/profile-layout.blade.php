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
    <div class="w-dvw h-dvh bg-gradient-to-br from-gray-300 to-gray-100 flex justify-center py-44">
        <div class="max-w-3/5 w-full flex flex-col mx-auto gap-2">
            <a
                href="{{ $user->role === 'dokter' ? route('dashboard.doctor.overview') : route('dashboard.patient.overview') }}">
                <button>
                    <i class="fa-solid fa-xmark text-red-600 text-2xl"></i>
                </button>
            </a>
            <div class="flex gap-2 mt-4">
                <x-layouts.profile-sidebar />
                <div class="w-full">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
