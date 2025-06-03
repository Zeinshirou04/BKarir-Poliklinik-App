@extends('layouts.guest-layout')

@section('content')
    <div class="w-3/5 2xl:w-1/4">
        <div class="bg-white w-full rounded-md shadow-2xl">
            <livewire:auth.login-form />
        </div>
        <div class="w-full mt-6">
            <p class="text-center">
                Belum Memiliki Akun?
                <span>
                    <a class="hover:text-blue-700 text-blue-600" href="/auth/register/create">Klik Untuk Daftar</a>
                </span>
            </p>
        </div>
    </div>
@endsection
