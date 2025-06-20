<div class="w-full h-20 py-4 flex justify-between">
    <div class="w-1/2 h-full flex items-center">
        <h6 class="font-semibold text-gray-600">Senin, 20 Januari 2022</h6>
    </div>
    <div class="w-1/2 h-full flex items-center justify-end gap-4 relative">
        <div class=" h-full flex flex-col text-right">
            <div class="flex gap-2 items-center">
                <h5 class="text-lg font-semibold ">{{ Str::ucfirst($user->nama) }}</h5>
                <button id="profile-menu-dropdown-button">
                    <i
                        class="fa-solid fa-caret-down hover:cursor-pointer hover:text-gray-500 focus:text-gray-500 active:text-gray-700 transition-colors"></i>
                </button>
            </div>
            <p class="text-gray-700">
                {{ Str::ucfirst($user->role) }}
            </p>
        </div>
        <div class="h-10">
            <img class="rounded-full h-full" src="/assets/images/default-profile-picture.webp" alt="">
        </div>
        <div id="profile-menu-dropdown"
            class="bg-gradient-to-tr from-white to-gray-100 shadow rounded-lg flex-col w-1/6 absolute right-14 top-8 px-0.5 py-1 hidden opacity-0 transition-opacity duration-200">
            <a href="{{ route('profile.information.show', $user->id) }}" class="w-full">
                <div class="px-4 py-1">
                    <p>Profil Saya</p>
                </div>
            </a>
            <a href="{{ route('login.destroy') }}" class="w-full border-t-2 border-t-gray-200">
                <div class="px-4 py-1.5">
                    <p class="text-red-600">Logout</p>
                </div>
            </a>
        </div>

        <script>
            var button = document.getElementById('profile-menu-dropdown-button');
            var dropdown = document.getElementById('profile-menu-dropdown');

            button.addEventListener('click', function() {
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    dropdown.classList.add('flex');

                    requestAnimationFrame(() => {
                        dropdown.classList.remove('opacity-0');
                        dropdown.classList.add('opacity-100');
                    });
                } else {
                    dropdown.classList.remove('opacity-100');
                    dropdown.classList.add('opacity-0');

                    setTimeout(() => {
                        dropdown.classList.remove('flex');
                        dropdown.classList.add('hidden');
                    }, 200);
                }
            });

            document.addEventListener('click', function(event) {
                if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.remove('opacity-100');
                    dropdown.classList.add('opacity-0');

                    setTimeout(() => {
                        dropdown.classList.remove('flex');
                        dropdown.classList.add('hidden');
                    }, 200);
                }
            });
        </script>

    </div>
</div>
