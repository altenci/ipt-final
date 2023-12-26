@extends('base')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Pending Borrow Requests</h2>
        </div>
        <div class="card-body">
            @foreach($pendingBorrows as $borrow)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                @if ($borrow->book->image_path)
                                    <img src="{{ asset('storage/' . $borrow->book->image_path) }}" alt="Book Cover" class="img-fluid rounded" style="max-height: 150px;">
                                @else
                                    <img src="{{ asset('placeholder-image.jpg') }}" alt="No Image Available" class="img-fluid rounded" style="max-height: 150px;">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $borrow->book->title }}</h5>
                                <ul class="list-unstyled">
                                    <li><strong>Borrower:</strong> {{ $borrow->user->name }}</li>
                                    <li><strong>Return Date:</strong> {{ $borrow->return_date }}</li>
                                    <li><strong>Status:</strong> <span class="{{ $borrow->borrow_status == 'pending' ? 'text-warning' : 'text-success' }}">{{ $borrow->borrow_status }}</span></li>
                                </ul>
                                <div class="text-center">
                                    <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (count($pendingBorrows) === 0)
                <p class="text-muted text-center">No pending borrow requests at the moment.</p>
            @endif
        </div>
    </div>
</div>
@endsection
