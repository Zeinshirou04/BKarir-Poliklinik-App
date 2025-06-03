<table class="w-full text-left">
    <thead>
        <tr>
            <th class="pb-4 pt-2">No</th>
            <th class="pb-4 pt-2">ID Periksa</th>
            <th class="pb-4 pt-2">Nama Pasien</th>
            <th class="pb-4 pt-2">Tanggal Periksa</th>
            <th class="pb-4 pt-2">Catatan</th>
            <th class="pb-4 pt-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (is_null($periksas))
            <tr class="border-t-1 border-gray-300">
                <td colspan="5" class="pb-2 pt-4 text-center">Belum Ada Periksa</td>
            </tr>
        @else
            @foreach ($periksas as $periksa)
                <tr>
                    <th class="pb-2 pt-4">{{ $loop->index + 1 }}</th>
                    <td class="pb-2 pt-4">{{ $periksa->id }}</td>
                    <td class="pb-2 pt-4">{{ $periksa->pasien->nama }}</td>
                    @if (is_null($periksa->tgl_periksa))
                        <td class="pb-2 pt-4">Belum Ditentukan</td>
                    @else
                        <td class="pb-2 pt-4">{{ $periksa->tgl_periksa }}</td>
                    @endif
                    @if (is_null($periksa->catatan))
                        <td class="pb-2 pt-4">Belum Ditentukan</td>
                    @else
                        <td class="pb-2 pt-4">{{ $periksa->catatan }}</td>
                    @endif
                    <td class="py-2">
                        <button wire:click="emitDetailCheck({{ $periksa->id }})" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Detail</button>
                        <button wire:click="emitDetailEdit({{ $periksa->id }})" class="bg-blue-500 text-white px-3 py-1 rounded-md">Edit</button>
                        <button wire:click="destroy({{ $periksa->id }})" class="bg-red-500 text-white px-3 py-1 rounded-md">Delete</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
