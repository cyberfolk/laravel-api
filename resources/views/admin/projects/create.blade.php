@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container-fluid">

        @include('admin.partials.validation_errors')

        <h5 class="text-uppercase text-muted my-3">Add a new Project</h5>
        <form action="{{ route('admin.projects.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" required
                    value="{{ old('title') }}" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="project title here"
                    aria-describedby="titleHelper">
                <small id="titleHelper" class="text-secondary @error('title') text-danger @enderror">
                    Type the title of the project max 50 characters
                </small>
            </div>
            {{-- /.title --}}
            <div class="mb-3">
                <label for="link_cover" class="form-label">Cover</label>
                <input type="text" required
                    value="{{ old('link_cover') }}" name="link_cover" id="link_cover"
                    class="form-control @error('link_cover') is-invalid @enderror"
                    placeholder="project link_cover here"
                    aria-describedby="link_coverHelper">
                <small id="link_coverHelper"
                    class="text-secondary @error('link_cover') text-danger @enderror">
                    Type the source image of the project max 200 characters
                </small>
            </div>
            {{-- /.link_cover --}}
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select
                    class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id', '') ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <small id="type_idHelper"
                    class="text-secondary @error('type_id') text-danger @enderror">
                    Select one of the following project type
                </small>
            </div>
            {{-- /.type_id --}}
            <div class="mb-3">
                <label for="link_live" class="form-label">Site live</label>
                <input type="text"
                    value="{{ old('link_live') }}" name="link_live" id="link_live"
                    class="form-control @error('link_live') is-invalid @enderror"
                    placeholder="project link_live here"
                    aria-describedby="link_liveHelper">
                <small id="link_liveHelper"
                    class="text-secondary @error('link_live') text-danger @enderror">
                    Type the source image of the project max 200 characters
                </small>
            </div>
            {{-- /.link_live --}}
            <div class="mb-3">
                <label for="link_code" class="form-label">Site code</label>
                <input type="text" required
                    value="{{ old('link_code') }}" name="link_code" id="link_code"
                    class="form-control @error('link_code') is-invalid @enderror"
                    placeholder="project link_code here"
                    aria-describedby="link_codeHelper">
                <small id="link_codeHelper"
                    class="text-secondary @error('link_code') text-danger @enderror">
                    Type the source image of the project max 200 characters
                </small>
            </div>
            {{-- /.link_code --}}
            <div class="mb-3">
                <label for="start_date" class="form-label">Start date</label>
                <input type="date" required
                    value="{{ old('start_date') }}" name="start_date" id="start_date"
                    class="form-control @error('start_date') is-invalid @enderror"
                    placeholder="project start_date here"
                    aria-describedby="start_dateHelper">
                <small id="start_dateHelper" class="text-secondary @error('start_date') text-danger @enderror">
                    Type the sale date of the project
                </small>
            </div>
            {{-- /.start_date --}}
            <div class="mb-3">
                <label for="last_commit" class="form-label">Last Commit</label>
                <input type="date"
                    value="{{ old('last_commit') }}" name="last_commit" id="last_commit"
                    class="form-control @error('last_commit') is-invalid @enderror"
                    placeholder="project last_commit here"
                    aria-describedby="last_commitHelper">
                <small id="last_commitHelper" class="text-secondary @error('last_commit') text-danger @enderror">
                    Type the last commit date of the project
                </small>
            </div>
            {{-- /.last_commit --}}
            <div class="mb-3">
                <label for="code_line" class="form-label">Code line</label>
                <input type="number" step="1"
                    value="{{ old('code_line') }}" name="code_line" id="code_line"
                    class="form-control @error('code_line') is-invalid @enderror"
                    placeholder="project code_line here"
                    aria-describedby="code_lineHelper">
                <small id="code_lineHelper" class="text-secondary @error('code_line') text-danger @enderror">
                    Type the number of code line of the project
                </small>
            </div>
            {{-- /.code_line --}}
            <div class="mb-3">
                <label for="folders" class="form-label">folders</label>
                <input type="number" step="1"
                    value="{{ old('folders') }}" name="folders" id="folders"
                    class="form-control @error('folders') is-invalid @enderror"
                    placeholder="project folders here"
                    aria-describedby="foldersHelper">
                <small id="foldersHelper" class="text-secondary @error('folders') text-danger @enderror">
                    Type the number of the project folders
                </small>
            </div>
            {{-- /.folders --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="textarea" row="4"
                    value="{{ old('description') }}" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="project description here"
                    aria-describedby="descriptionHelper">
                <small id="descriptionHelper" class="text-secondary @error('description') text-danger @enderror">
                    Type the description of the project
                </small>
            </div>
            {{-- /.description --}}
            <button type="submit" class="btn btn-dark w-100 my-4">Save</button>
        </form>
    </div>
@endsection
