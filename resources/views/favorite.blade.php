@extends('layout.template')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Buku Favorit</h4>
        </div>
        <div class="card-body">
            @if($favoriteBooks->isEmpty())
                <p>Tidak ada buku favorit.</p>
            @else
                <ul class="list-group">
                    @foreach($favoriteBooks as $book)
                        <li class="list-group-item">
                            <strong>{{ $book->judul }}</strong> oleh {{ $book->penulis }}
                            <br><em>Kategori: {{ $book->get_kategori->nama_kategori }}</em>
                            <a href="{{ route('favorite.books.remove', ['id' => $book->id]) }}" class="btn btn-danger btn-sm float-right">Hapus dari favorite</i></a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
