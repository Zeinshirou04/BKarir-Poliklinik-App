<section class="w-full">
    <div id="periksa-detail-container-header"
        class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
        <div id="periksa-table-container-label" class="h-full text-white flex items-center">
            @if ($mode === 'details')
                <h3 class="font-semibold text-md">Detail Periksa</h3>
            @elseif ($mode === 'edit')
                <h3 class="font-semibold text-md">Edit Detail</h3>
            @else
                <h3 class="font-semibold text-md">Detail Periksa</h3>
            @endif
        </div>
    </div>
    <div id="periksa-detail" class="w-full bg-white px-8 py-4 rounded-b-md">
        @if ($mode === 'details')
            <livewire:details.patient-checkup-details :checkupId="$checkupId" :key="'details-' . $checkupId"  />
        @elseif ($mode === 'edit')
            <livewire:form.checkup-edit-form :janjiId="$janjiId" :key="'edit-' . $janjiId"  />
        @else
            <header class="font-semibold text-lg text-black text-center py-8">
                <h4>
                    Pilih Daftar Periksa untuk Memulai!
                </h4>
            </header>
        @endif
    </div>
</section>
