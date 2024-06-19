@extends('layout.template')

@section('content')

<style>
    .large-img-container img {
        width: 95%;
        height: 95%;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .text-item {
        margin-bottom: 1.5rem;
    }
    .text-item h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #343a40;
    }
    .text-item p {
        font-size: 1.2rem;
        color: #555;
    }
    .text-item strong {
        color: #333;
    }
    .book-description {
        font-style: italic;
        line-height: 1.6;
    }
    .card {
        background-color: #d0e8ff;
        padding: 0.3rem 0.7rem;
        border-radius: 5px;
        display: inline-block;
    }
    .row-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .right-aligned {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajukan Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ajukan_peminjaman') }}" method="POST" id="form-peminjaman">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="buku" value="{{ $buku->id }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" placeholder="Tanggal Peminjaman" name="tanggal_peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" placeholder="Tanggal Pengembalian" name="tanggal_pengembalian">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-peminjaman').submit()">Pinjam Buku</button>
            </div>
        </div>
    </div>
</div>

<div class="row pt-4 pl-4 pr-4">
    <div class="col-lg-4 large-img-container">
        <img src="{{ asset('images/'.$buku->gambar) }}" alt="Book Image">
    </div>
    <div class="col-lg-8 pl-5">
        <div class=" row-item">
            <h1>{{ $buku->judul }}</h1>
            @if ($buku->isFavoriteByUser())
            <a href="{{ route('favorite.books.remove', ['id' => $buku->id]) }}" class="btn btn-success"><i class="fa fa-bookmark"></i></a>
            @else
            <a href="{{ route('favorite.books.add', ['id' => $buku->id]) }}" class="btn btn-secondary"><i class="fa-regular fa-bookmark"></i></a>
            @endif
        </div>
        <div class="text-item">
        <input id="input-id" name="rating" class="rating rating-loading" data-display-only="true" type="text" value="{{ $buku->countRating() }}" data-size="xs">
        </div>
        <div class="text-item">
            <p class="h6"><strong>Penulis:</strong> {{ $buku->penulis }}</p>
        </div>
        <div class="text-item">
            <p class="h6"><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
        </div>
        <div class="text-item book-description">
            <p class="h6"><strong>Deskripsi:</strong> {{ $buku->deskripsi }}.</p>
        </div>
        <div class="text-item row-item">
            <p class="h6"><strong>Genre:</strong> <span class="card">{{ $buku->get_kategori->nama_kategori }}</span></p>
            <p class="h6"><strong>Stok Buku:</strong> <span class="card">{{ $buku->jumlah }}</span></p>
        </div>
        <div class="text-item">
            <form action="{{ route('ajukan_peminjaman') }}" method="post">
                @csrf
                <input type="hidden" name="buku" value="{{ $buku->id }}">
                <button class="btn btn-primary" type="submit">Pinjam Buku</button>
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="text-item">
            <h3 class="card-title" style="margin-bottom: 0 "><strong>Ulasan & Rating</strong></h3>
        @foreach ( $buku->ulasanRatings as $rating )
            <div class="card mt-4 p-3 w-100">
                <p class="card-text"><strong>Nama: </strong>{{ $rating->user->name }}</p>
                    <input id="input-id" name="rating" class="rating rating-loading" data-display-only="true" type="text" value="{{ $rating->rating }}" data-size="xs">
                <p class="card-text mt-2"><strong>Ulasan:</strong> {{ $rating->ulasan }}</p>
            </div>
        @endforeach
        </div>
    </div>
</div>

@endsection
