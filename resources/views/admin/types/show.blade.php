@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container-fluid py-5">
        <h1 class="pb-3">{{ $type->name }}</h1>
        <div class="row">
            <div class="col-3">
                <img src="{{ $type->link_cover }}" alt="{{ $type->name }}" class="img-fluid">
            </div>
            <div class="col-6">
                <div>
                    <strong>Slug:</strong>
                    <span>{{ $type->slug }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
