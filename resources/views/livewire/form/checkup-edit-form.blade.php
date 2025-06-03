<div class="w-full py-3">
    <form wire:submit.prevent="update" class="w-full flex flex-col gap-4">
        <div class="flex flex-col gap-3">
            <div class="flex gap-4">
                <label for="nama_pasien" class="font-semibold w-32 py-1">
                    Nama Pasien
                </label>
                <input class="p-1 w-36 border-1 rounded-md" type="text" name="nama_pasien" id="nama_pasien"
                    wire:model="nama_pasien" placeholder="Masukkan Nama Pasien...">
            </div>
            <div class="flex gap-4">
                <label for="tgl_periksa" class="font-semibold w-32 py-1">
                    Tanggal Periksa
                </label>
                <input class="p-1 w-36 border-1 rounded-md" type="date" name="tgl_periksa" id="tgl_periksa"
                    wire:model="tgl_periksa">
            </div>
            <div class="flex gap-4">
                <label for="id_obat" class="font-semibold w-32">
                    Obat
                </label>
                <select class="p-1 w-36 border-1 rounded-md" name="id_obat" id="id_obat" wire:model="id_obat">
                    <option value="default">Tidak Ada</option>
                    @foreach ($obats as $obat)
                        <option value="{{ $obat->id }}">{{ $obat->nama_obat }} ( Rp. {{ number_format($obat->harga, 0, ',', '.') }} )</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-4">
                <label for="catatan" class="font-semibold w-32">
                    Catatan
                </label>
                <textarea name="catatan" id="catatan" class="w-36 p-1 border-1 rounded-md" rows="4" wire:model="catatan" placeholder="Masukkan Catatan..."></textarea>
            </div>
            <div class="flex gap-4">
                <label for="biaya_periksa" class="font-semibold w-32">
                    Biaya Periksa (Rp)
                </label>
                <input class="p-1 w-36 border-1 rounded-md" type="number" name="biaya_periksa" id="biaya_periksa"
                    wire:model="biaya_periksa" placeholder="Masukkan Biaya Periksa...">
            </div>
        </div>
        <button type="submit"class="bg-blue-500 text-white px-3 py-1 rounded-md w-min">Edit</button>
    </form>
</div>
