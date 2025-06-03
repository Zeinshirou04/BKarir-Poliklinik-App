@extends('layouts.authenticated-layout')

@section('content')
    <div class="w-full h-full">
        <section id="periksa-list-container" class="w-full h-full flex flex-col gap-12">
            <header class="w-min h-auto">
                <h2 class="text-5xl font-semibold text-blue-900">Periksa</h2>
            </header>
            <div class="w-full flex gap-4">
                <div class="w-3/12 rounded-md">
                    <livewire:section.detail-checkup-section />
                </div>
                <div id="periksa-table-container" class="w-9/12 rounded-md">
                    <div id="periksa-table-container-header"
                        class="w-full h-14 bg-gradient-to-r from-blue-600 to-blue-500 rounded-t-md flex justify-between px-8">
                        <div id="periksa-table-container-label" class="h-full text-white flex items-center">
                            <h3 class="font-semibold text-md">List Periksa</h3>
                        </div>
                    </div>
                    <div id="periksa-table" class="w-full bg-white px-8 py-4 rounded-b-md">
                        <livewire:table.doctor-checkup-table />
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
