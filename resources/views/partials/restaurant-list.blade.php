@forelse($restaurants as $r)
<div class="col-md-4 mb-4">
    <div class="card shadow-sm h-100">

        @if($r->image)
            <img src="{{ asset('storage/'.$r->image) }}"
                 class="card-img-top"
                 style="height:180px; object-fit:cover;">
        @endif

        <div class="card-body">
            <h5 class="mb-1">{{ $r->name }}</h5>

            <small class="text-muted">
                {{ $r->region }} • {{ $r->location }}
            </small>
            <br>

            <span class="badge bg-warning text-dark mt-2">
                ⭐ {{ number_format($r->rating,1) }}
            </span>
            <br>

            <a href="/restaurant/{{ $r->id }}"
               class="btn btn-sm btn-outline-primary mt-2">
                Detail
            </a>
        </div>
    </div>
</div>
@empty
<p class="text-muted">Data restoran tidak ditemukan.</p>
@endforelse