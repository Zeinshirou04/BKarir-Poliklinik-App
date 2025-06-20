<form wire:submit.prevent="update" class="flex flex-col gap-6" method="post">
    @csrf
    @method('PATCH')
    <div class="flex flex-col gap-2 max-w-2/3">
        <header class="font-semibold text-lg">
            <label for="nama">
                <h4 class="text-gray-700">Nama Lengkap</h4>
            </label>
        </header>
        <div class="text-md">
            <p>Jika anda ingin memperbarui nama lengkap anda, silahkan ubah nama lama anda dibawah sesuai dengan nama
                anda
                pada Kartu Tanda Penduduk yang anda miliki</p>
        </div>
        <div class="w-full">
            <input type="text" id="nama" name="nama"
                class="w-2/4 rounded-lg border-2 border-gray-400 px-3 py-2" placeholder="Nama Lengkap Anda..."
                wire:model="nama">
        </div>
    </div>
    <div class="flex flex-col gap-2 max-w-2/3">
        <header class="font-semibold text-lg">
            <label for="nama">
                <h4 class="text-gray-700">Alamat Email</h4>
            </label>
        </header>
        <div class="text-md">
            <p>Jika anda ingin memperbarui alamat email anda, silahkan ubah alamat email anda dibawah sesuai dengan
                alamat email yang anda inginkan</p>
        </div>
        <div class="w-full">
            <input type="email" id="email" name="email"
                class="w-2/4 rounded-lg border-2 border-gray-400 px-3 py-2" placeholder="Alamat Email Anda..."
                wire:model="email">
        </div>
    </div>
    @if ($this->role === 'dokter')
        <div class="flex flex-col gap-2 max-w-2/3">
            <header class="font-semibold text-lg">
                <label for="poli">
                    <h4 class="text-gray-700">Poli</h4>
                </label>
            </header>
            <div class="text-md">
                <p>Jika anda ingin memperbarui jenis poliklinik anda, silahkan ubah poliklinik anda dibawah sesuai dengan
                    jenis poliklinik yang anda inginkan</p>
            </div>
            <div class="w-full">
                <select class="px-3 py-2 rounded-lg border-2 border-gray-400" name="id_poli" id="id_poli" wire:model="id_poli">
                    <option >Pilih Poli</option>
                    @foreach ($polis as $poli)
                        <option value="{{ $poli->id }}" @selected($poli->id === $this->id_poli)>{{ $poli->nama }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" id="poli" name="poli"
                    class="w-2/4 rounded-lg border-2 border-gray-400 px-3 py-2" placeholder="Jenis Poliklinik Anda..."
                    wire:model="poli"> --}}
            </div>
        </div>
    @endif
    <button type="submit"class="bg-blue-500 text-white px-3 py-1 rounded-md w-min">Simpan</button>
</form>
