<aside class="w-1/5 h-min">
    <nav class="w-full">
        <a href="{{ route('profile.information.show', $user->id) }}" class="w-full">
            <button
                class="px-6 py-4 w-full {{ Route::is('profile.information.show') ? "bg-gray-400 text-white" : "" }} hover:bg-gray-400 hover:text-white focus:text-white focus:bg-gray-400 active:bg-gray-500 transition-colors rounded-md">
                <p class="font-semibold">
                    DATA DIRI
                </p>
            </button>
        </a>
    </nav>
</aside>
