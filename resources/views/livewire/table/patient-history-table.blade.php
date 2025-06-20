<div id="riwayat-table-container" class="w-full h-full rounded-md">
    <div id="riwayat-table-container-header"
        class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
        <div id="riwayat-table-container-label" class="h-full text-white flex items-center">
            <h3 class="font-semibold text-md">List Periksa</h3>
        </div>
    </div>
    <div id="riwayat-table" class="w-full bg-white px-8 py-4 rounded-b-md">
        <table class="w-full text-left table-fixed">
            <thead>
                <tr>
                    <th class="pb-4 pt-2 px-2 w-14">No</th>
                    <th class="pb-4 pt-2 px-2">Poli</th>
                    <th class="pb-4 pt-2 px-2">Nama Dokter</th>
                    <th class="pb-4 pt-2 px-2">Tanggal Periksa</th>
                    <th class="pb-4 pt-2 px-2">Catatan</th>
                    {{-- <th class="pb-4 pt-2 px-2">Obat</th> --}}
                    <th class="pb-4 pt-2 px-2">Status</th>
                    <th class="pb-4 pt-2 px-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (is_null($janjiPeriksas) || count($janjiPeriksas) < 1)
                    <tr class="border-t-1 border-gray-300">
                        <td colspan="7" class="pb-2 pt-4 text-center">Belum Ada Periksa</td>
                    </tr>
                @else
                    @foreach ($janjiPeriksas as $janji)
                        <tr>
                            <th class="pb-2 pt-4 px-2">{{ $loop->index + 1 }}</th>
                            <td class="pb-2 pt-4 px-2">{{ is_null($janji->dokter->poli) ? "Belum Memilih" : $janji->dokter->poli->nama }}</td>
                            <td class="pb-2 pt-4 px-2">{{ $janji->dokter->nama }}</td>
                            @if (is_null($janji->periksa))
                                <td class="pb-2 pt-4 px-2">Belum Ditentukan</td>
                            @else
                                <td class="pb-2 pt-4 px-2">
                                    {{ \Carbon\Carbon::parse(time: $janji->periksa->tgl_periksa)->format('Y-m-d') }}
                                </td>
                            @endif
                            @if (is_null($janji->periksa))
                                <td class="pb-2 pt-4 px-2">Belum Ditentukan</td>
                            @else
                                <td class="pb-2 pt-4 px-2">{{ $janji->periksa->catatan }}</td>
                            @endif
                            @if (is_null($janji->periksa))
                                <td class="pb-2 pt-4 px-2">Belum Diperiksa</td>
                            @else
                                <td class="pb-2 pt-4 px-2">
                                    {{ is_null($janji->periksa->tgl_periksa) ? 'Belum Diperiksa' : 'Sudah Diperiksa' }}
                                </td>
                            @endif
                            <td>
                                @if (is_null($janji->periksa))
                                    <button wire:click="emitCheckupInfo({{ $janji->id }})"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded-md">Info</button>
                                @else
                                    <button wire:click="emitCheckupHistory({{ $janji->id }})"
                                        class="bg-blue-500 text-white px-3 py-1 rounded-md">Riwayat</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>
</div>
