<div class="flex flex-col w-full gap-3" wire:ignore>
    <label for="{{ $name }}" class="font-semibold">{{ $label }}</label>
    @if ($type !== 'option' && $type !== 'time')
        <input type="{{ $type }}" @if (!is_null($minLength)) minlength="{{ $minLength }}" @endif
            @if (!is_null($maxLength)) maxlength="{{ $maxLength }}" @endif name="{{ $name }}"
            class="px-2 py-2 border-1 border-gray-800 rounded-md" placeholder="{{ $placeholder }}"
            wire:model="{{ $model }}" @disabled($disabled)>
    @elseif($type === 'option')
        <select name="{{ $name }}" class="px-2 py-2 border-1 border-gray-800 rounded-md"
            wire:model="{{ $model }}" @disabled($disabled)>
            {{ $slot }}
        </select>
    @elseif($type === 'time')
        <input type="{{ $type }}" name="{{ $name }}"
            class="px-2 py-2 border-1 border-gray-800 rounded-md" wire:model="{{ $model }}"
            @disabled($disabled)>
    @endif
</div>
