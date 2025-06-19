<div class="w-full py-3">
    <article class="w-full flex flex-col">
        <div class="flex flex-col gap-3">
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Nama Pasien
                </h5>
                <p class="max-w-52 w-52">{{ $periksa->pasien->nama }}</p>
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Tanggal Periksa
                </h5>
                <p class="max-w-52 w-52">
                    {{ $periksa->tgl_periksa === null ? 'Belum Ditentukan' : \Carbon\Carbon::parse(time: $periksa->tgl_periksa)->format('Y-m-d H.i') }}
                </p>
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Obat
                </h5>
                <div class="flex flex-col">
                    @if (is_null($detailPeriksas))
                        <p class="max-w-52 w-52">Belum Ditentukan</p>
                    @else
                        @foreach ($detailPeriksas as $detail)
                            <p class="max-w-52 w-52">{{ $detail->obat->nama_obat }} (Rp. {{ number_format($detail->obat->harga, 0, ',', '.') }})</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Catatan
                </h5>
                <p class="max-w-52 w-52">{{ $periksa->catatan === null ? 'Belum Ditentukan' : $periksa->catatan }}
                </p>
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Total Biaya Periksa
                </h5>
                <p class="max-w-52 w-52">
                    {{ $periksa->biaya_periksa === null ? 'Belum Ditentukan' : 'Rp. ' . number_format($periksa->biaya_periksa, 0, ',', '.') }}
                </p>
            </div>
        </div>
    </article>
</div>
