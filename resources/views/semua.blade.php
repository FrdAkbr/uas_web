@extends('layouts.app')

@section('content')

<h2 class="mb-4 fw-bold">🍽️ Kuliner Lombok - Semua Restoran</h2>

<!-- ================= SEARCH & FILTER ================= -->
<form class="row mb-4" onsubmit="return false;">
    <div class="col-md-5">
        <input type="text" id="search"
               class="form-control"
               placeholder="Cari restoran...">
    </div>

    <div class="col-md-4">
        <select id="region" class="form-control">
            <option value="">Semua Wilayah</option>
            <option value="Lombok Timur">Lombok Timur</option>
            <option value="Lombok Barat">Lombok Barat</option>
            <option value="Lombok Tengah">Lombok Tengah</option>
            <option value="Mataram">Mataram</option>
        </select>
    </div>
</form>

<!-- ================= LIST RESTORAN ================= -->
<h3 class="mb-4">Semua Restoran</h3>

<div class="row" id="restaurantList">
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
</div>

<!-- ================= SCRIPT (DIPERBAIKI) ================= -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const search  = document.getElementById('search');
    const region  = document.getElementById('region');
    const list    = document.getElementById('restaurantList');

    function loadData() {
        fetch(`/search?search=${search.value}&region=${region.value}`)
            .then(response => response.text())
            .then(html => {
                list.innerHTML = html;
            });
    }

    search.addEventListener('keyup', loadData);
    region.addEventListener('change', loadData);

});
</script>

@endsection