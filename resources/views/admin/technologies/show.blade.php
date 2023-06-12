@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container-fluid py-5">
        <h1 class="pb-3">{{ $technology->name }}</h1>
        <div class="row">
            <div class="col-3">
                <img src="{{ $technology->link_cover }}" alt="{{ $technology->name }}" class="img-fluid">
            </div>
            <div class="col-6">
                <div>
                    <strong>Slug:</strong>
                    <span>{{ $technology->slug }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
