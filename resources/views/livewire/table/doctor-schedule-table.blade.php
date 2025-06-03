<table class="w-full text-left table-fixed">
    <thead>
        <tr>
            <th class="pb-4 pt-2">No</th>
            <th class="pb-4 pt-2">Hari</th>
            <th class="pb-4 pt-2">Jam Mulai</th>
            <th class="pb-4 pt-2">Jam Selesai</th>
            <th class="pb-4 pt-2">Status</th>
            <th class="pb-4 pt-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (is_null($jadwals) || empty($jadwals) || count($jadwals) < 1)
            <tr class="border-t-1 border-gray-300">
                <td colspan="6" class="pb-2 pt-4 text-center">Belum Ada Jadwal</td>
            </tr>
        @else
            @foreach ($jadwals as $jadwal)
                <tr>
                    <th class="py-2">{{ $loop->index + 1 }}</th>
                    <td class="py-2">{{ $jadwal->hari }}</td>
                    <td class="py-2">{{ \Carbon\Carbon::parse(time: $jadwal->jam_mulai)->format('H.i') }}</td>
                    <td class="py-2">{{ \Carbon\Carbon::parse(time: $jadwal->jam_selesai)->format('H.i') }}</td>
                    <td class="py-2 {{ $jadwal->status == 0 ? 'text-red-600' : 'text-green-600' }}">
                        {{ $jadwal->status == 0 ? 'Tidak Aktif' : 'Aktif' }}</td>
                    <td class="py-2">
                        @if ($jadwal->status === 0)
                            <button wire:click="emitActivate({{ $jadwal->id }})"
                                class="bg-green-500 text-white px-3 py-1 rounded-md">Aktifkan</button>
                        @else
                            <button wire:click="emitDeactivate({{ $jadwal->id }})"
                                class="bg-red-500 text-white px-3 py-1 rounded-md">Nonaktifkan</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
