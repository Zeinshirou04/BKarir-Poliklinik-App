<aside class="2xl:w-72 h-full bg-gradient-to-br from-blue-600 via-blue-500 to-blue-400 shadow-2xl">
    <nav class="w-full h-full flex flex-col py-8">
        <div class="p-4 flex justify-center items-center">
            <x-icon.icons />
        </div>
        <div class="w-full h-full mt-12 flex flex-col">
            <x-buttons.sidebar-button
                route="{{ $role === 'dokter' ? 'dashboard.doctor.overview' : 'dashboard.patient.overview' }}"
                active="{{ $role === 'dokter' ? Route::currentRouteName() === 'dashboard.doctor.overview' : Route::currentRouteName() === 'dashboard.patient.overview' }}"
                label="Overview" />
            <x-buttons.sidebar-button
                route="{{ $role === 'dokter' ? 'dashboard.doctor.periksa' : 'dashboard.patient.periksa' }}"
                active="{{ $role === 'dokter' ? Route::currentRouteName() === 'dashboard.doctor.periksa' : Route::currentRouteName() === 'dashboard.patient.periksa' }}"
                label="Periksa" />
            @if ($role === 'dokter')
                <x-buttons.sidebar-button
                    route="{{ $role === 'dokter' ? 'dashboard.doctor.jadwal.periksa' : 'dashboard.patient.periksa' }}"
                    active="{{ $role === 'dokter' ? Route::currentRouteName() === 'dashboard.doctor.jadwal.periksa' : Route::currentRouteName() === 'dashboard.patient.periksa' }}"
                    label="Jadwal Periksa" />
            @endif
            <x-buttons.sidebar-button
                route="{{ $role === 'dokter' ? 'dashboard.doctor.obat' : 'dashboard.patient.riwayat' }}"
                active="{{ $role === 'dokter' ? Route::currentRouteName() === 'dashboard.doctor.obat' : Route::currentRouteName() === 'dashboard.patient.riwayat' }}"
                label="{{ $role === 'dokter' ? 'Obat' : 'Riwayat' }}" />
        </div>
    </nav>
</aside>
