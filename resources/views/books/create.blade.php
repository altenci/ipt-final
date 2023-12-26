@extends('base')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="card-title">Create a New Book</h2>
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

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" required>
                </div>
                <div class="mb-3">
                    <label for="published_year" class="form-label">Published Year</label>
                    <input type="number" class="form-control" id="published_year" name="published_year" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Book Cover Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <small class="form-text text-muted">Please upload a cover image for the book.</small>
                </div>
                <button type="submit" class="btn btn-primary">Create Book</button>
            </form>
        </div>
    </div>
</div>
@endsection
