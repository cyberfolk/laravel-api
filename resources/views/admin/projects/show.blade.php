@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container-fluid py-5">
        <h1 class="pb-3">{{ $project->title }}</h1>
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid">
            </div>
            <div class="col-6">
                <div>
                    <strong>Type:</strong>
                    <span>{{ $project->type?->name }}</span>
                </div>
                <div>
                    <strong>Technologies:</strong>
                    @foreach ($project->technologies as $technology)
                        <span class="badge bg-secondary">{{ $technology->name }} </span>
                    @endforeach
                </div>
                <div>
                    <strong>Slug:</strong>
                    <span>{{ $project->slug }}</span>
                </div>
                <div>
                    <strong>Info:</strong>
                    <span>{{ $project->info }}</span>
                </div>
                <div>
                    <strong>Site code:</strong>
                    <span><a href="{{ $project->link }}">{{ $project->link }}</a></span>
                </div>
                <div>
                    <strong>Start data: </strong>
                    <span>{{ $project->init }}</span>
                </div>
                <div>
                    <strong>User: </strong>
                    <span>{{ $project->user->name }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
