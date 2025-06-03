<div class="w-full h-20 py-4 flex justify-between">
    <div class="h-full flex items-center">
        <h6 class="font-semibold text-gray-600">Senin, 20 Januari 2022</h6>
    </div>
    <div class="h-full flex items-center gap-4">
        <div class="flex flex-col text-right">
            <h5 class="text-lg font-semibold ">{{ $name }}</h5>
            <a href="{{ route('login.destroy') }}" class="text-red-600">
                Logout
            </a>
        </div>
        <div class="h-10">
            <img class="rounded-full h-full" src="/assets/images/default-profile-picture.webp" alt="">
        </div>
    </div>
</div>
