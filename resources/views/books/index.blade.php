@extends('base')

@section('content')
<div class="container">
    <h2 class="mb-4">Book Management</h2>

    @role('admin')
        <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add New Book</a>
    @endrole

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($book->image_path)
                        <img src="{{ asset('storage/' . $book->image_path) }}" alt="Book Cover" class="card-img-top">
                    @else
                        <div class="card-img-top text-center p-5 bg-light">
                            <i class="fas fa-book fa-5x text-secondary"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                        <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                        <p class="card-text"><strong>Published Year:</strong> {{ $book->published_year }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 text-center">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                        @role('admin')
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        @endrole
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12 text-center">
                No books available.
            </div>
        @endforelse
    </div>
</div>
@endsection
