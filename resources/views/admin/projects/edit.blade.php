@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container">

        @include('partials.validation_errors')

        <h5 class="text-uppercase text-muted my-4">Edit Project</h5>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" required
                    value="{{ old('title', $project->title) }}" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="project title here"
                    aria-describedby="titleHelper">
                <small id="titleHelper" class="text-secondary @error('title') text-danger @enderror">
                    Type the title of the project max 100 characters
                </small>
            </div>
            {{-- /.title --}}
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text"
                    value="{{ old('thumb', $project->thumb) }}" name="thumb" id="thumb"
                    class="form-control @error('thumb') is-invalid @enderror"
                    placeholder="project thumb here"
                    aria-describedby="thumbHelper">
                <small id="thumbHelper"
                    class="text-secondary @error('thumb') text-danger @enderror">
                    Type the source image of the project max 200 characters
                </small>
            </div>
            {{-- /.thumb --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" required
                    value="{{ old('price', $project->price) }}" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror"
                    placeholder="project price here"
                    aria-describedby="priceHelper">
                <small id="priceHelper" class="text-secondary @error('price') text-danger @enderror">
                    Type the price of the project max 10 characters
                </small>
            </div>
            {{-- /.price --}}
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" required
                    value="{{ old('series', $project->series) }}" name="series" id="series"
                    class="form-control @error('series') is-invalid @enderror"
                    placeholder="project series here"
                    aria-describedby="seriesHelper">
                <small id="seriesHelper" class="text-secondary @error('series') text-danger @enderror">
                    Type the series of the project max 100 characters
                </small>
            </div>
            {{-- /.series --}}
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="date"
                    value="{{ old('sale_date', $project->sale_date) }}" name="sale_date" id="sale_date"
                    class="form-control @error('sale_date') is-invalid @enderror"
                    placeholder="project sale_date here"
                    aria-describedby="sale_dateHelper">
                <small id="sale_dateHelper" class="text-secondary @error('sale_date') text-danger @enderror">
                    Type the sale date of the project max 10 characters
                </small>
            </div>
            {{-- /.sale_date --}}
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" required
                    value="{{ old('type', $project->type) }}" name="type" id="type"
                    class="form-control @error('type') is-invalid @enderror"
                    placeholder="project type here"
                    aria-describedby="typeHelper">
                <small id="typeHelper" class="text-secondary @error('type') text-danger @enderror">
                    ype the type of the project max 100 characters
                </small>
            </div>
            {{-- /.type --}}
            <div class="mb-3">
                <label for="writers" class="form-label">Writers</label>
                <input type="text"
                    value="{{ old('writers', $project->writers) }}" name="writers" id="writers"
                    class="form-control @error('writers') is-invalid @enderror"
                    placeholder="project writers here"
                    aria-describedby="writersHelper">
                <small id="writersHelper" class="text-secondary @error('writers') text-danger @enderror">
                    Type the writers of the project separate with ","
                </small>
            </div>
            {{-- /.writers --}}
            <div class="mb-3">
                <label for="artists" class="form-label">Artists</label>
                <input type="text"
                    value="{{ old('artists', $project->artists) }}" name="artists" id="artists"
                    class="form-control @error('artists') is-invalid @enderror"
                    placeholder="project artists here"
                    aria-describedby="artistsHelper">
                <small id="artistsHelper" class="text-secondary @error('artists') text-danger @enderror">
                    Type the artists of the project separate with ","
                </small>
            </div>
            {{-- /.artists --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="textarea" row="4"
                    value="{{ old('description', $project->description) }}" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="project description here"
                    aria-describedby="descriptionHelper">
                <small id="descriptionHelper" class="text-secondary @error('description') text-danger @enderror">
                    Type the description of the project max 1000 characters
                </small>
            </div>
            {{-- /.description --}}
            <button type="submit" class="btn btn-dark w-100 my-4">Save</button>
        </form>
    </div>
@endsection
