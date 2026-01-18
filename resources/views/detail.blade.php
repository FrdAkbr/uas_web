@extends('layouts.app')

@section('title', $restaurant->name)

@section('content')

<h2 class="fw-bold">{{ $restaurant->name }}</h2>

<div class="d-flex align-items-center mb-3">
    <span class="text-success fw-bold me-2">
        ⭐ {{ number_format($restaurant->rating,1) }}
    </span>
    <small class="text-muted">
        ({{ $restaurant->reviews->count() }} review)
    </small>
</div>

<div class="row">
    <div class="col-md-8">

        @if($restaurant->image)
            <img src="{{ asset('storage/'.$restaurant->image) }}"
                 class="img-fluid rounded mb-4"
                 style="height:350px;object-fit:cover;width:100%;">
        @endif

        <h4 class="fw-bold">About</h4>
        <p>{{ $restaurant->description }}</p>

        <hr>

        <h4 class="fw-bold">Location</h4>
        <p>{{ $restaurant->location }}</p>
        <small class="text-muted">{{ $restaurant->region }}, NTB</small>

        <hr>
    </div>

    <div class="col-md-4">
        <div class="bg-white rounded shadow-sm p-3 sticky-top" style="top:70px;">
            {{-- ================= RATING CHART ================= --}}
@php
    $total = $restaurant->reviews->count();

    $counts = [
        5 => $restaurant->reviews->where('rating',5)->count(),
        4 => $restaurant->reviews->where('rating',4)->count(),
        3 => $restaurant->reviews->where('rating',3)->count(),
        2 => $restaurant->reviews->where('rating',2)->count(),
        1 => $restaurant->reviews->where('rating',1)->count(),
    ];

    $labels = [
        5 => 'Excellent',
        4 => 'Good',
        3 => 'Average',
        2 => 'Poor',
        1 => 'Terrible'
    ];
@endphp

<div class="row align-items-center mb-4">
    <div class="col-md-4 text-center">
        <h1 class="fw-bold text-success">
            {{ number_format($restaurant->rating,1) }}
        </h1>
        <p class="fw-semibold mb-1">Excellent</p>

        <div>
            @for($i=1;$i<=5;$i++)
                <span class="text-success fs-5">●</span>
            @endfor
            <small>({{ $total }})</small>
        </div>
    </div>

    <div class="col-md-8">
        @foreach($labels as $rate => $label)
            @php
                $count = $counts[$rate];
                $percent = $total ? ($count / $total) * 100 : 0;
            @endphp

            <div class="d-flex align-items-center mb-2">
                <div style="width:90px">{{ $label }}</div>

                <div class="progress flex-grow-1 mx-2" style="height:10px">
                    <div class="progress-bar bg-success"
                         style="width: {{ $percent }}%">
                    </div>
                </div>

                <div style="width:30px">{{ $count }}</div>
            </div>
        @endforeach
    </div>
</div>
{{-- ================= END CHART ================= --}}
        </div>
    </div>
            {{-- FORM REVIEW --}}
        <h4 class="fw-bold">Write a Review</h4>
        <form method="POST" action="/review/{{ $restaurant->id }}">
            @csrf
            <input class="form-control mb-2" name="name" placeholder="Your name" required>

            <select class="form-control mb-2" name="rating" required>
                <option value="">Rating</option>
                @for($i=5;$i>=1;$i--)
                    <option>{{ $i }}</option>
                @endfor
            </select>

            <textarea class="form-control mb-2" name="comment" placeholder="Your review" required></textarea>
            <button class="btn btn-success">Submit</button>
        </form>

        <hr>

        <h4 class="fw-bold">Reviews</h4>
        @forelse($restaurant->reviews as $r)
            <div class="border rounded p-3 mb-3 bg-white">
                <b>{{ $r->name }}</b>
                <span class="text-warning ms-2">⭐ {{ $r->rating }}</span>
                <p class="mb-0 mt-1">{{ $r->comment }}</p>
            </div>
        @empty
            <p class="text-muted">No reviews yet</p>
        @endforelse
</div>

@endsection