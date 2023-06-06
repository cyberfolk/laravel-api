@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container py-5">

        @include('partials.session_message')

        <div class="d-flex justify-content-between align-items-center py-5">
            <h1 class="fw-bold"> Admin Projects</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-dark d-block">
                <i class="fas fa-plus-circle fa-sm fa-fw"></i>
                New Project
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-secondary align-middle">
                <thead class="table-light">
                    <caption>Table Name</caption>
                    <tr>
                        <th>ID</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Site live</th>
                        <th>Site code</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>Last commit</th>
                        <th>Code lines</th>
                        <th>Folders</th>
                        <th style="width: 5%">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($projects as $project)
                        <tr class="table-primary">
                            <td scope="row">{{ $project->id }}</td>
                            <td><img height="100" src="{{ $project->link_cover }}" alt="{{ $project->title }}"></td>
                            <td>{{ $project->title }}</td>
                            <td><a href="{{ $project->link_live }}">{{ $project->link_live }}</a></td>
                            <td><a href="{{ $project->link_code }}">{{ $project->link_code }}</a></td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->start_date }}</td>
                            <td>{{ $project->last_commit }}</td>
                            <td>{{ $project->code_line }}</td>
                            <td>{{ $project->folders }}</td>
                            <td>
                                <a class="btn btn-primary mb-1" href="{{ route('admin.projects.show', $project->slug) }}" title="View" role="button">
                                    <i class="fas fa-eye fa-sm fa-fw"></i>
                                </a>
                                <a class="btn btn-secondary text-light mb-1" href="{{ route('admin.projects.edit', $project->slug) }}" title="Edit" role="button">
                                    <i class="fas fa-pencil fa-sm fa-fw"></i>
                                </a>

                                <button type="button" class="btn btn-danger" title="Delete" data-bs-toggle="modal" data-bs-target="#modal-{{ $project->slug }}">
                                    <i class="fas fa-trash fa-sm fa-fw"></i>
                                </button>

                                <div class="modal fade" id="modal-{{ $project->slug }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Delete {{ $project->title }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> Are you sure you to want to delete this element? This is a destructive action. </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr scope="row">
                            <td>No records in the db yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
