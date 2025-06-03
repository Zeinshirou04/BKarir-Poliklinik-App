<table class="w-full text-left">
    <thead>
        <tr>
            <th class="pb-4 pt-2">No</th>
            <th class="pb-4 pt-2">ID Periksa</th>
            <th class="pb-4 pt-2">Tanggal Periksa</th>
            <th class="pb-4 pt-2">Catatan</th>
            <th class="pb-4 pt-2">Harga</th>
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
                    @if (is_null($periksa->biaya_periksa))
                        <td class="pb-2 pt-4">Belum Ditentukan</td>
                    @else
                        <td class="pb-2 pt-4">Rp. {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                    @endif
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
