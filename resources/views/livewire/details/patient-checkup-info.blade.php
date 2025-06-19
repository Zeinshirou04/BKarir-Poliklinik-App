<div id="riwayat-info-container" class="w-full h-full rounded-md">
    <div id="riwayat-info-container-header"
        class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
        <div id="riwayat-info-container-label" class="h-full text-white flex items-center">
            <h3 class="font-semibold text-md">Info Periksa</h3>
        </div>
    </div>
    <div id="riwayat-info-container-content" class="w-full bg-white px-8 py-4 rounded-b-md">
        <div id="riwayat-info-container-sublabel" class="text-black flex items-center mt-2">
            <h3 class="text-md">Informasi Detail Mengenai Jadwal Periksa Anda</h3>
        </div>
        <div id="riwayat-info-content" class="grid grid-cols-11 gap-3 mt-6">
            <div id="riwayat-info-content-left" class="col-span-5 flex flex-col gap-3">
                <div id="riwayat-poli-container"
                    class="flex gap-4 border-2 border-gray-300 rounded-md py-3 px-4 justify-between">
                    <div id="riwayat-poli-label" class="text-black flex items-center">
                        <h3 class="font-semibold text-md">Jenis Poli</h3>
                    </div>
                    <div id="riwayat-poli-content">
                        <p>{{ $janji->jadwalPeriksa->dokter->poli }}</p>
                    </div>
                </div>
                <div id="riwayat-dokter-container"
                    class="flex gap-4 border-2 border-gray-300 rounded-md py-3 px-4 justify-between">
                    <div id="riwayat-dokter-label" class="text-black flex items-center">
                        <h3 class="font-semibold text-md">Nama Dokter</h3>
                    </div>
                    <div id="riwayat-dokter-content">
                        <p>{{ $janji->jadwalPeriksa->dokter->nama }}</p>
                    </div>
                </div>
                <div id="riwayat-day-container"
                    class="flex gap-4 border-2 border-gray-300 rounded-md py-3 px-4 justify-between">
                    <div id="riwayat-day-label" class="text-black flex items-center">
                        <h3 class="font-semibold text-md">Hari Pemeriksaan</h3>
                    </div>
                    <div id="riwayat-day-content">
                        <p>{{ $janji->jadwalPeriksa->hari }}</p>
                    </div>
                </div>
            </div>
            <div id="riwayat-info-content-mid" class="col-span-5 flex flex-col gap-3">
                <div id="riwayat-start-container"
                    class="flex gap-4 border-2 border-gray-300 rounded-md py-3 px-4 justify-between">
                    <div id="riwayat-start-label" class="text-black flex items-center">
                        <h3 class="font-semibold text-md">Jam Mulai</h3>
                    </div>
                    <div id="riwayat-start-content">
                        <p>{{ $janji->jadwalPeriksa->jam_mulai }}</p>
                    </div>
                </div>
                <div id="riwayat-end-container"
                    class="flex gap-4 border-2 border-gray-300 rounded-md py-3 px-4 justify-between">
                    <div id="riwayat-end-label" class="text-black flex items-center">
                        <h3 class="font-semibold text-md">Jam Selesai</h3>
                    </div>
                    <div id="riwayat-end-content">
                        <p>{{ $janji->jadwalPeriksa->jam_selesai }}</p>
                    </div>
                </div>
            </div>
            <div id="riwayat-info-content-right" class="w-full h-full">
                <div id="riwayat-queue-container"
                    class="flex flex-col w-full h-full border-2 border-gray-300 rounded-md">
                    <div id="riwayat-queue-label" class="text-black w-full mt-4">
                        <h3 class="font-semibold text-md w-full text-center">No Antrian</h3>
                    </div>
                    <div id="riwayat-queue-content" class="w-full h-full p-4">
                        <div class="bg-blue-400 w-full h-full rounded-md flex items-center justify-center">
                            <p class="text-5xl text-white text-bold">{{ $janji->no_antrian }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button wire:click="emitReturn()" class="bg-red-500 text-white px-3 py-1 rounded-md">Kembali</button>
        </div>
    </div>
