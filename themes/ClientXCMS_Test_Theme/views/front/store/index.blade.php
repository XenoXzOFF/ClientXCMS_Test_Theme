@extends('layouts.front')

@section('title', __('client.store.title'))

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Nos Solutions</h1>
        <hr class="mx-auto border-primary border-3 opacity-100" style="width: 50px;">
    </div>

    <div class="row g-4">
        @foreach($groups as $group)
            <div class="col-md-4">
                <div class="card h-100 bg-dark border-secondary text-white p-4 rounded-4">
                    <h3 class="fw-bold">{{ $group->name }}</h3>
                    <p class="text-muted small flex-grow-1">{{ $group->description }}</p>
                    <a href="{{ route('front.store.group', $group->slug) }}" class="btn-york w-100 text-center mt-3">
                        D&eacute;couvrir
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection