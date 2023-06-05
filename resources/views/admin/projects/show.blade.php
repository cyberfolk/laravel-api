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
                    <strong>Price: </strong>
                    <span>${{ $project->price }}</span>
                </div>
                <div>
                    <strong>Series: </strong>
                    <span>{{ $project->series }}</span>
                </div>
                <div>
                    <strong>Sale data: </strong>
                    <span>{{ $project->sale_date }}</span>
                </div>
                <div>
                    <strong>Type: </strong>
                    <span>{{ $project->type }}</span>
                </div>
                <div>
                    <strong>Description:</strong>
                    <span>{{ $project->description }}</span>
                </div>
                <div>
                    <strong>Writers: </strong>
                    <span>{{ $project->writers }}</span>
                </div>
                <div>
                    <strong>Artists: </strong>
                    <span>{{ $project->artists }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
