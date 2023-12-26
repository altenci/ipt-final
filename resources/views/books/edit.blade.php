@extends('base')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
            <h2 class="card-title">Edit Book</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ $book->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                </div>
                <div class="mb-3">
                    <label for="published_year" class="form-label">Published Year</label>
                    <input type="number" class="form-control" id="published_year" name="published_year" value="{{ $book->published_year }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Book Cover Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <small class="form-text text-muted">Upload a new cover image to replace the existing one (if needed).</small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Update Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
