<form wire:submit.prevent="store" class="w-full flex flex-col gap-4">
    <x-forms.labeled-input type="text" name="nama" label="Nama Pasien" placeholder="Masukkan Nama Anda..."
        required="true" model="nama" disabled="true" readonly="true" />
    <x-forms.labeled-input type="text" name="no_rm" label="Nomor Rekam Medis"
        placeholder="Masukkan Nomor Rekam Medis..." required="true" model="no_rm" disabled="true" readonly="true" />
    <x-forms.labeled-input type="option" name="dokter" label="Pilih Dokter" placeholder="Pilih Dokter..."
        required="true" model="jadwal_id">
        <option selected>Pilih Dokter</option>
        @foreach ($doctors as $doctor)
            @foreach ($doctor->jadwalPeriksa as $jadwal)
                @if ($jadwal->status === 1)
                    <option wire:key="{{ $jadwal->id }}" value="{{ $jadwal->id }}">
                        {{ "$doctor->nama | $jadwal->hari ($jadwal->jam_mulai-$jadwal->jam_selesai)" }}</option>
                @endif
            @endforeach
        @endforeach
    </x-forms.labeled-input>

    {{-- <x-forms.labeled-input type="option" name="dokter" label="Pilih Dokter" placeholder="Pilih Dokter..."
        required="true" model="dokter_id">
        <option selected>Pilih Dokter</option>
        @foreach ($doctors as $doctor)
        <option wire:key="{{ $doctor->id }}" value="{{ $doctor->id }}">{{ $doctor->nama }}</option>
        @endforeach
    </x-forms.labeled-input>
    <x-forms.labeled-input type="option" name="dokter" label="Pilih Dokter" placeholder="Pilih Dokter..."
    required="true" model="jadwal_id">
    <option selected>Pilih Waktu</option>
    @if (!is_null($this->jadwals))
    @foreach ($this->jadwals as $jadwal)
    <option wire:key="{{ $jadwal->id }}" value="{{ $jadwal->id }}">
                    {{ "$jadwal->hari ($jadwal->jam_mulai-$jadwal->jam_selesai)" }}</option>
                    @endforeach
                    @endif
                </x-forms.labeled-input> --}}

    <x-forms.labeled-textarea type="text" name="keluhan" label="Keluhan" placeholder="Masukkan Keluhan..."
        required="true" model="keluhan" />
    <input type="submit" class="bg-blue-500 py-2 rounded-md text-white hover:cursor-pointer mt-2" value="Daftar">
</form>
