<div class="w-full py-3">
    <article class="w-full flex flex-col">
        <div class="flex flex-col gap-3">
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Nama Pasien
                </h5>
                <p class="max-w-32 w-32">{{ $details->periksa->pasien->nama }}</p>
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Tanggal Periksa
                </h5>
                <p class="max-w-32 w-32">{{ $details->periksa->tgl_periksa === null ? 'Belum Ditentukan' : $details->periksa->tgl_periksa }}
                </p>
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Obat
                </h5>
                @if (is_null($details->obat))
                    <p class="max-w-32 w-32">Belum Ditentukan</p>
                @else
                    <p class="max-w-32 w-32">{{ $details->obat->nama_obat }}</p>
                @endif
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Catatan
                </h5>
                <p class="max-w-32 w-32">{{ $details->periksa->catatan=== null ? 'Belum Ditentukan' : $details->periksa->catatan }}
                </p>
            </div>
            <div class="flex gap-4">
                <h5 class="font-semibold w-32">
                    Biaya Periksa
                </h5>
                <p class="max-w-32 w-32">{{ $details->periksa->biaya_periksa === null ? 'Belum Ditentukan' : "Rp. " . number_format($details->periksa->biaya_periksa, 0, ',', '.') }}
                </p>
            </div>
        </div>
    </article>
</div>
