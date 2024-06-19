@extends('layout.template')

@section('content')
<style>
    .card-img-top {
        height: 350px;
        object-fit: cover;
    }
    .card-body {
        padding: 1.5rem;
    }
    .card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .card {
        border-radius: 20px;
    }
    .card img {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
</style>
<div class="container-fluid">
    <h2>{{ Auth::user()->role !== 'anggota' ? "Dashboard" : "Rak Buku" }}</h2>
    <br>
    @if(Auth::user()->role !== 'anggota')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $anggota }}</div>
                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Anggota</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('data_anggota') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $buku }}</div>
                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">Buku</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('data_buku') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $pinjam }}</div>
                            <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">Pinjam</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sign-out fa-3x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('peminjaman') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $kembali }}</div>
                            <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Dikembalikan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-download fa-3x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('pengembalian') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->role !== 'petugas')
    <div class="row">
        @foreach ($data as $i => $buku)
        <div class="col-lg-3 mb-4">
            <div class="card">
                <a href="{{ route('detail', ['buku' => $buku->id ]) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset('images/'.$buku->gambar) }}" class="card-img-top" alt="Image 1">
                    <div class="card-body">
                        <input id="input-id" name="rating" class="rating rating-loading" data-display-only="true" type="text" value="4" data-size="xs">
                        <h5 class="card-title" style="margin-bottom: .15rem;">{{ $buku->judul }}</h5>
                        <p class="card-text">Penulis: {{ $buku->penulis }}</p>
                        <p class="card-text text-right"><span class="badge badge-secondary">Stok Buku: {{ $buku->jumlah }}</span></p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
