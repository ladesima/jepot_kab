@extends('layouts.app')

@section('content')

<div class="container mx-auto py-16 px-6 max-w-5xl">

    <h1 class="text-3xl font-bold text-center mb-8">
        Desa / Kelurahan di Kecamatan {{ $kecamatan->nama_kecamatan }}
    </h1>

    <div class="space-y-4">

        @forelse($kecamatan->desas as $desa)

        <div class="bg-white shadow rounded-xl p-5">

            <h3 class="text-lg font-bold">
                {{ $desa->nama_desa }}
            </h3>

            <p class="text-gray-600 mt-1">
                Kepala Desa: <span class="font-semibold text-blue-600">
                    {{ $desa->kepala_desa }}
                </span>
            </p>

        </div>

        @empty

        <p class="text-center text-gray-500">
            Belum ada data desa.
        </p>

        @endforelse

    </div>

</div>

@endsection
