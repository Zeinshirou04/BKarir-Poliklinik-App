<table class="w-full text-left table-fixed">
    <thead>
        <tr class="bg-gray-300">
            <th class="p-4 rounded-tl-lg w-16">No</th>
            <th class="p-4">Nama Obat</th>
            <th class="p-4">Kemasan</th>
            <th class="p-4">Harga</th>
            <th class="p-4 rounded-tr-lg">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (is_null($obats) || empty($obats) || count($obats) < 1)
            <tr class="border-t-1 border-gray-300">
                <td colspan="6" class="pb-2 pt-4 text-center">Belum Ada Obat</td>
            </tr>
        @else
            @foreach ($obats as $obat)
                <tr class="hover:bg-gray-100">
                    <th class="p-4 border-b-2 border-b-gray-200">{{ $loop->index + 1 }}</th>
                    <td class="p-4 border-b-2 border-b-gray-200">{{ $obat->nama_obat }}</td>
                    <td class="p-4 border-b-2 border-b-gray-200">{{ $obat->kemasan }}</td>
                    <td class="p-4 border-b-2 border-b-gray-200">Rp.
                        {{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td class="p-4 border-b-2 border-b-gray-200">
                        <button wire:click="restoreDrug({{ $obat->id }})"
                            class="bg-blue-500 text-white px-3 py-1 rounded-md">Pulihkan</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
