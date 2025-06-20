<table class="w-full text-left">
    <thead>
        <tr>
            <th class="pb-4 pt-2">No</th>
            <th class="pb-4 pt-2">Poli</th>
            <th class="pb-4 pt-2">Dokter</th>
            <th class="pb-4 pt-2">Hari</th>
            <th class="pb-4 pt-2">No. Antrian</th>
            <th class="pb-4 pt-2">Status</th>
        </tr>
    </thead>
    <tbody>
        @if (is_null($janjiPeriksas) || count($janjiPeriksas) < 1)
            <tr class="border-t-1 border-gray-300">
                <td colspan="5" class="pb-2 pt-4 text-center">Belum Ada Periksa</td>
            </tr>
        @else
            @foreach ($janjiPeriksas as $janji)
                <tr>
                    <th class="pb-2 pt-4">{{ $loop->index + 1 }}</th>
                    @if (is_null($janji->dokter))
                        <td class="pb-2 pt-4">Belum Ditentukan</td>
                        <td class="pb-2 pt-4">Belum Ditentukan</td>
                    @else
                        <td class="pb-2 pt-4">{{ is_null($janji->dokter->poli) ? "Belum Memilih" : $janji->dokter->poli->nama }}</td>
                        <td class="pb-2 pt-4">{{ $janji->dokter->nama }}</td>
                    @endif
                    @if (is_null($janji->jadwalPeriksa))
                        <td class="pb-2 pt-4">Belum Ditentukan</td>
                    @else
                        <td class="pb-2 pt-4">{{ $janji->jadwalPeriksa->hari }}</td>
                    @endif
                    <td class="pb-2 pt-4">{{ $janji->no_antrian }}</td>
                    @if (is_null($janji->periksa))
                        <td class="pb-2 pt-4">Belum Diperiksa</td>
                    @else
                        <td class="pb-2 pt-4">{{ is_null($janji->periksa->tgl_periksa) ? "Belum Diperiksa" : "Sudah Diperiksa" }}</td>
                    @endif
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
