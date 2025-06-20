<section id="obat-list-container" class="w-full h-full flex flex-col gap-12">
    <header class="w-min h-auto">
        <h2 class="text-5xl font-semibold text-blue-900">Obat</h2>
    </header>
    <div id="obat-table-container" class="w-full h-full rounded-md flex gap-4">
        <div class="w-4/6 h-full">
            <div id="obat-table-container-header"
                class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
                <div id="obat-table-container-label" class="h-full text-white flex items-center">
                    <h3 class="font-semibold text-md">Obat</h3>
                </div>
            </div>
            <div id="obat-table" class="w-full bg-white px-8 py-4 rounded-b-md h-5/6 flex flex-col">
                @if (!is_null($this->mode))
                    <div class="flex justify-between">
                        <p>
                            Berikut adalah obat yang sudah terhapus
                        </p>
                        <a href="#">
                            <button wire:click="back()" class="bg-red-500 text-white px-3 py-1 rounded-md">Kembali</button>
                        </a>
                    </div>
                    <div class="w-full overflow-y-auto max-h-4/5 h-4/5 mt-4">
                        <livewire:table.drug-deleted-table />
                    </div>
                @else
                    <div class="flex justify-between">
                        <p>
                            Berikut adalah obat yang tersedia dan sudah terdaftar
                        </p>
                        <button wire:click="trashed()" class="bg-blue-500 text-white px-3 py-1 rounded-md">Obat Terhapus</button>
                    </div>
                    <div class="w-full overflow-y-auto max-h-4/5 h-4/5 mt-4">
                        <livewire:table.drug-list-table />
                    </div>
                @endif
            </div>
        </div>
        <div class="w-2/6">
            <div id="obat-form-container-header"
                class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
                <div id="obat-table-container-label" class="h-full text-white flex items-center">
                    <h3 class="font-semibold text-md">Form Obat</h3>
                </div>
            </div>
            <div id="obat-form" class="w-full bg-white px-8 py-4 rounded-b-md">
                <livewire:form.create-drug-form />
            </div>
        </div>
    </div>
</section>
