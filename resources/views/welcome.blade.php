@extends('layouts.app')

@section('content')
<div class="bg-white py-12 px-6 text-center">
    <h1 class="text-4xl font-bold mb-4 text-blue-600">SIPRAK - Sistem Informasi Pelaporan Gangguan Sarana dan Prasarana</h1>
    <p class="text-lg text-gray-700 mb-6">
        Platform real-time untuk menyampaikan permasalahan fasilitas di Universitas Lambung Mangkurat.
    </p>
    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">
        Masuk untuk Melapor
    </a>
</div>
@endsection
