@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container py-5">
        <h1 class="py-3">{{ $project->title }}</h1>
        <div class="row justify-content-center">
            <div class="col-3">
                <img src="{{ $project->thumb }}" alt="{{ $project->title }}" class="img-fluid">
            </div>
            <div class="col-6">
                <div>
                    <strong>Description:</strong>
                    <span>{{ $project->description }}</span>
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
