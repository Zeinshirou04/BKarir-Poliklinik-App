<table class="w-full text-left table-fixed">
    <thead>
        <tr>
            <th class="pb-4 pt-2 w-24">No Urut</th>
            <th class="pb-4 pt-2">Nama Pasien</th>
            <th class="pb-4 pt-2">Keluhan</th>
            <th class="pb-4 pt-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (is_null($janjiPeriksas) || count($janjiPeriksas) < 1)
            <tr class="border-t-1 border-gray-300">
                <td colspan="4" class="pb-2 pt-4 text-center">Belum Ada Pasien</td>
            </tr>
        @else
            @foreach ($janjiPeriksas as $janji)
                {{-- @foreach ($jadwal->janjiPeriksa as $janjiIndex => $janji) --}}
                <tr>
                    <th class="pb-2 pt-4">{{ $janji->no_antrian }}</th>
                    @if (!is_null($janji->pasien))
                        <td class="pb-2 pt-4">{{ $janji->pasien->nama }}</td>
                    @else
                        <td class="pb-2 pt-4">Tidak Diketahui</td>
                    @endif
                    <td class="pb-2 pt-4">{{ $janji->keluhan }}</td>
                    <td class="py-2">
                        @if (!is_null($janji->periksa))
                            <button wire:click="emitDetailCheck({{ $janji->periksa->id }})"
                                class="bg-blue-500 text-white px-3 py-1 rounded-md">Cek</button>
                            <button wire:click="emitDetailEdit({{ $janji->id }})"
                                class="bg-yellow-600 text-white px-3 py-1 rounded-md">Edit</button>
                        @else
                            <button wire:click="emitDetailEdit({{ $janji->id }})"
                                class="bg-blue-500 text-white px-3 py-1 rounded-md">Periksa</button>
                        @endif
                    </td>
                </tr>
                {{-- @endforeach --}}
            @endforeach
        @endif
    </tbody>
</table>
