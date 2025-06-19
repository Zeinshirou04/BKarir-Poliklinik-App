<div class="flex flex-col w-full gap-3">
    <label for="{{ $name }}" class="font-semibold">{{ $label }}</label>
    <textarea class="px-2 py-2 border-1 border-gray-800 rounded-md" name="{{ $name }}" id="{{ $name }}"
        cols="{{ $cols }}" rows="{{ $rows }}" wire:model="{{ $model }}" placeholder="{{ $placeholder }}">

    </textarea>
</div>
