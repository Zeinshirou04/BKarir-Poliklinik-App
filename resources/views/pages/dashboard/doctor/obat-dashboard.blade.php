@extends('layouts.authenticated-layout')

@section('content')
    <div class="w-full h-full">
        <section id="obat-list-container" class="w-full h-full flex flex-col gap-12">
            <header class="w-min h-auto">
                <h2 class="text-5xl font-semibold text-blue-900">Obat</h2>
            </header>
            <div id="obat-table-container" class="w-full h-full rounded-md flex gap-4">
                <div class="w-4/6">
                    <div id="obat-table-container-header"
                        class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
                        <div id="obat-table-container-label" class="h-full text-white flex items-center">
                            <h3 class="font-semibold text-md">List Obat</h3>
                        </div>
                    </div>
                    <div id="obat-table" class="w-full bg-white px-8 py-4 rounded-b-md">
                        <livewire:table.drug-list-table />
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
    </div>
@endsection
