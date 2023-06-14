@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container-fluid py-5">

        @include('partials.session_message')

        <div class="d-flex justify-content-between align-items-center pb-3">
            <h1 class="fw-bold text-primary"> Admin Technologies</h1>
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-dark d-block">
                <i class="fas fa-plus-circle fa-sm fa-fw"></i>
                New Technology
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-secondary align-middle">
                <thead class="table-light">
                    <caption>Table Name</caption>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Name</th>
                        <th scope="col">Project Count</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($technologies as $technology)
                        <tr class="table-primary">
                            <td scope="row">{{ $technology->id }}</td>
                            <td><img height="100" src="{{ asset('storage/' . $technology->link_cover) }}" alt="{{ $technology->title }}"></td>
                            <td>{{ $technology->name }}</td>
                            <td><span class="badge bg-dark">{{ $technology->projects?->count() }}</span></td>
                            <td>
                                <a class="btn btn-primary mb-1" href="{{ route('admin.technologies.show', $technology->slug) }}" title="View" role="button">
                                    <i class="fas fa-eye fa-sm fa-fw"></i>
                                </a>
                                <a class="btn btn-secondary text-light mb-1" href="{{ route('admin.technologies.edit', $technology->slug) }}" title="Edit" role="button">
                                    <i class="fas fa-pencil fa-sm fa-fw"></i>
                                </a>

                                <button type="button" class="btn btn-danger mb-1    " title="Delete" data-bs-toggle="modal" data-bs-target="#modal-{{ $technology->slug }}">
                                    <i class="fas fa-trash fa-sm fa-fw"></i>
                                </button>

                                <div class="modal fade" id="modal-{{ $technology->slug }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Delete {{ $technology->title }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> Are you sure you to want to delete this element? This is a destructive action. </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="post">
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
            {{ $technologies->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
