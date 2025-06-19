<div class="w-full py-3">
    <form wire:submit.prevent="update" class="w-full flex flex-col gap-4">
        <div class="flex flex-col gap-3">
            <div class="flex gap-4">
                <label for="nama_pasien" class="font-semibold w-40 py-1">
                    Nama Pasien
                </label>
                <input class="p-1 border-1 rounded-md" type="text" name="nama_pasien" id="nama_pasien"
                    wire:model="nama_pasien" placeholder="Masukkan Nama Pasien...">
            </div>
            <div class="flex gap-4">
                <label for="tgl_periksa" class="font-semibold w-40 py-1">
                    Tanggal Periksa
                </label>
                <input class="p-1 border-1 rounded-md" type="datetime-local" name="tgl_periksa" id="tgl_periksa"
                    wire:model="tgl_periksa">
            </div>
            <div class="flex gap-4">
                <label for="id_obat" class="font-semibold w-40">
                    Obat
                </label>
                <select class="p-1 border-1 rounded-md" name="id_obats" id="id_obats" wire:model="id_obats" multiple>
                    <option value="default">Tidak Ada</option>
                    @foreach ($obats as $obat)
                        <option value="{{ $obat->id }}">{{ $obat->nama_obat }} ( Rp. {{ number_format($obat->harga, 0, ',', '.') }} )</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-4">
                <label for="catatan" class="font-semibold w-40">
                    Catatan
                </label>
                <textarea name="catatan" id="catatan" class="p-1 border-1 rounded-md" rows="4" wire:model="catatan" placeholder="Masukkan Catatan..."></textarea>
            </div>
            <div class="flex gap-4">
                <label for="biaya_periksa" class="font-semibold w-40">
                    Biaya Periksa Dasar (Rp)
                </label>
                <input class="p-1 border-1 rounded-md" type="number" name="biaya_periksa" id="biaya_periksa"
                    wire:model="biaya_periksa" placeholder="Masukkan Biaya Periksa..." readonly>
            </div>
        </div>
        <button type="submit"class="bg-blue-500 text-white px-3 py-1 rounded-md w-min">Edit</button>
    </form>
</div>
