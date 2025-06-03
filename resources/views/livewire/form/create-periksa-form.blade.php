<form wire:submit.prevent="store" class="w-full flex flex-col gap-4">
    <x-forms.labeled-input type="text" name="nama" label="Nama Pasien" placeholder="Masukkan Nama Anda..."
        required="true" model="nama" disabled="true" />
    <x-forms.labeled-input type="option" name="dokter" label="Pilih Dokter" placeholder="Pilih Dokter..."
        required="true" model="dokter">
        @foreach ($doctors as $doctor)
            <option wire:key="{{ $doctor->id }}" value="{{ $doctor->id }}">{{ $doctor->nama }}</option>
        @endforeach
        <option value="0">Tidak Ada</option>
    </x-forms.labeled-input>
    <input type="submit" class="bg-blue-500 py-2 rounded-md text-white hover:cursor-pointer mt-2" value="Daftar">
</form>
