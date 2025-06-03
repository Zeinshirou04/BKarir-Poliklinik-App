<a href="{{ route($route) }}" class="w-full">
    <div
        class="w-full px-8 py-4 {{ $active ? 'bg-blue-300 text-blue-900 hover:text-blue-50' : 'text-blue-50 hover:text-blue-100' }} hover:bg-blue-300/60 hover:cursor-pointer active:bg-blue-400 focus:bg-blue-300/60 transition-colors">
        @if ($icons != '')
            <i>{{ $icons }}</i>
        @endif
        <h1 class="font-semibold text-lg">{{ $label }}</h1>
    </div>
</a>
