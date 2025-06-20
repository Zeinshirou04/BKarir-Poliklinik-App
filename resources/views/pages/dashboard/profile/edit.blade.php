@extends('layouts.profile-layout')

@section('content')
    <div class="w-full bg-white rounded-md px-6 py-4">
        <header class="font-bold text-xl">
            <h3 class="text-black">
                Informasi Data Diri
            </h3>
        </header>
        <article class="mt-6 w-full">
            <livewire:form.profile-information-edit-form :userId="$user->id" />
        </article>
    </div>
@endsection
