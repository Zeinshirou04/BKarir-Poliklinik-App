<div id="riwayat-detail-container" class="w-full h-full rounded-md">
    <div id="riwayat-detail-container-header"
        class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
        <div id="riwayat-detail-container-label" class="h-full text-white flex items-center">
            <h3 class="font-semibold text-md">Detail Periksa</h3>
        </div>
    </div>
    <div id="riwayat-detail-container-content" class="w-full bg-white px-8 py-4 rounded-b-md">
        <div id="riwayat-detail-container-sublabel" class="h-full text-black flex items-center mt-2">
            <h3 class="text-md">Silahkan pergi ke bagian administrasi untuk melakukan pembayaran!</h3>
        </div>
        <div id="riwayat-detail-content" class="flex flex-col gap-4 mt-6">
            <div id="riwayat-detail-overview-content" class="border-2 rounded-md border-gray-300">
                <div id="riwayat-detail-content-label" class="h-full text-black flex items-center px-4 py-2">
                    <h3 class="font-semibold text-md">Detail Pemeriksaan</h3>
                </div>
                <div id="riwayat-detail-overview" class="flex gap-4 border-t-2 border-gray-300 p-4">
                    <div id="riwayat-detail-tanggal" class="w-1/2">
                        <div id="riwayat-detail-tanggal-label" class="text-black flex items-center">
                            <h3 class="font-semibold text-md">Tanggal Periksa</h3>
                        </div>
                        <div id="riwayat-detail-tanggal-content">
                            <p>{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('Y-m-d H.i') }}</p>
                        </div>
                    </div>
                    <div id="riwayat-detail-catatan" class="w-1/2">
                        <div id="riwayat-detail-catatan-label" class="text-black flex items-center">
                            <h3 class="font-semibold text-md">Catatan Dokter</h3>
                        </div>
                        <div id="riwayat-detail-tanggal-content">
                            <p>{{ $periksa->catatan }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="riwayat-detail-obat-content" class="border-2 rounded-md border-gray-300">
                <div id="riwayat-obat-content-label" class="h-full text-black flex items-center px-4 py-2">
                    <h3 class="font-semibold text-md">Resep Obat</h3>
                </div>
                <div id="riwayat-detail-obat" class="flex flex-col gap-4 border-t-2 border-gray-300 p-4">
                    @foreach ($periksa->obat as $obat)
                        <div id="riwayat-detail-obat-{{ $obat->id }}" class="w-full flex justify-between">
                            <div class="text-black flex items-center">
                                <h3 class="font-semibold text-md">{{ $obat->nama_obat }}</h3>
                            </div>
                            <div id="riwayat-detail-tanggal-content">
                                <p>Rp. {{ number_format($obat->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="riwayat-detail-price-content" class="border-2 rounded-md border-gray-300">
                <div id="riwayat-detail-price-label" class="h-full text-black flex items-center px-4 py-2">
                    <h3 class="font-semibold text-md">Biaya Periksa</h3>
                </div>
                <div id="riwayat-detail-price" class="flex gap-4 border-t-2 border-gray-300 p-4 justify-between">
                    <div id="riwayat-detail-price-label" class="text-black flex items-center">
                        <h3 class="font-semibold text-md">Total Biaya</h3>
                    </div>
                    <div id="riwayat-detail-price-content">
                        <p>Rp. {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button wire:click="emitReturn()" class="bg-red-500 text-white px-3 py-1 rounded-md">Kembali</button>
        </div>
    </div>
</div>
