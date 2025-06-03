<form wire:submit.prevent="store" class="w-full flex flex-col gap-4">
    @csrf
    @method('POST')
    <x-forms.labeled-input type="option" name="hari" label="Pilih hari" placeholder="Pilih hari..." required="true"
        model="hari">
        <option value="0">Pilih Hari</option>
        <option selected value="senin">Senin</option>
        <option value="selasa">Selasa</option>
        <option value="rabu">Rabu</option>
        <option value="kamis">Kamis</option>
        <option value="jumat">Jum'at</option>
        <option value="sabtu">Sabtu</option>
    </x-forms.labeled-input>
    @error('hari')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
    <x-forms.labeled-input type="time" name="jam_mulai" label="Jam Mulai" required="true" model="jam_mulai" />
    @error('jam_mulai')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
    <x-forms.labeled-input type="time" name="jam_selesai" label="Jam Selesai" required="true" model="jam_selesai" />
    @error('jam_selesai')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
    <input type="submit" class="bg-blue-500 py-2 rounded-md text-white hover:cursor-pointer mt-2" value="Tambah">
    @error('error')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</form>
