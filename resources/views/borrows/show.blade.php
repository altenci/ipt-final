@extends('base')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Borrow Request Details</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $borrow->book->title }}</h5>

            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        @if ($borrow->book->image_path)
                            <img src="{{ asset('storage/' . $borrow->book->image_path) }}" alt="Book Cover" class="img-fluid rounded" style="max-height: 200px;">
                        @else
                            <img src="{{ asset('placeholder-image.jpg') }}" alt="No Image Available" class="img-fluid rounded" style="max-height: 200px;">
                        @endif
                    </div>
                    <ul class="list-unstyled mt-3">
                        <li><strong>Return Date:</strong> {{ $borrow->return_date }}</li>
                        <li><strong>Status:</strong> <span class="{{ $borrow->borrow_status == 'pending' ? 'text-warning' : 'text-success' }}">{{ $borrow->borrow_status }}</span></li>
                    </ul>
                </div>

                @if ($borrow->borrow_status == 'pending')
                    <div class="col-md-8">
                        <div class="mb-4 text-center">
                            <form method="POST" action="{{ route('borrows.accept', $borrow->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-check-circle"></i> Accept Request</button>
                            </form>
                        </div>

                        <div class="text-center">
                            <form method="POST" action="{{ route('borrows.reject', $borrow->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-lg"><i class="fas fa-times-circle"></i> Reject Request</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mt-3 text-center">
                <a href="{{ route('borrows.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back to Borrow Requests</a>
            </div>
        </div>
    </div>
</div>
@endsection
