@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container-fluid py-5">
        <h1 class="pb-3">{{ $project->title }}</h1>
        <div class="row">
            <div class="col-3">
                <img src="{{ $project->link_cover }}" alt="{{ $project->title }}" class="img-fluid">
            </div>
            <div class="col-6">
                <div>
                    <strong>Type:</strong>
                    <span>{{ $project->type?->name }}</span>
                </div>
                <div>
                    <strong>Slug:</strong>
                    <span>{{ $project->slug }}</span>
                </div>
                <div>
                    <strong>Description:</strong>
                    <span>{{ $project->description }}</span>
                </div>
                <div>
                    <strong>Site live:</strong>
                    <span><a href="{{ $project->link_live }}">{{ $project->link_live }}</a></span>
                </div>
                <div>
                    <strong>Site code:</strong>
                    <span><a href="{{ $project->link_code }}">{{ $project->link_code }}</a></span>
                </div>
                <div>
                    <strong>Start data: </strong>
                    <span>{{ $project->start_date }}</span>
                </div>
                <div>
                    <strong>Last commit: </strong>
                    <span>{{ $project->last_commit }}</span>
                </div>
                <div>
                    <strong>Code line: </strong>
                    <span>{{ $project->code_line }}</span>
                </div>
                <div>
                    <strong>Folders: </strong>
                    <span>{{ $project->folders }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
