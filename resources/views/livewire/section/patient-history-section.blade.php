<section id="riwayat-list-container" class="w-full h-full flex flex-col gap-12">
    <header class="w-min h-auto">
        <h2 class="text-5xl font-semibold text-blue-900">Riwayat</h2>
    </header>
    @if ($this->mode === null)
        <livewire:table.patient-history-table />
    @elseif ($this->mode === 'history')
        <livewire:details.patient-history-details :janjiId="$janjiId" :key="'history-' . $janjiId" />
    @elseif ($this->mode === 'info')
        <livewire:details.patient-checkup-info :janjiId="$janjiId" :key="'history-' . $janjiId" />
    @endif
</section>
