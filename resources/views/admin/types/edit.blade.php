@extends('layouts.admin')

{{-- @section('page_title', 'Create') --}}

@section('content')
    <div class="container-fluid">

        @include('partials.validation_errors')

        <h5 class="text-uppercase text-muted my-3">Edit type</h5>
        <form action="{{ route('admin.types.update', $type->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" required
                    value="{{ old('name', $type->name) }}" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="type name here"
                    aria-describedby="nameHelper">
                <small id="nameHelper" class="text-secondary @error('name') text-danger @enderror">
                    Type the name of the type max 50 characters
                </small>
            </div>
            {{-- /.name --}}
            <div class="mb-3">
                <label for="image" class="form-label">Cover</label>
                <input type="file"
                    value="{{ old('image', $type->image) }}" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror"
                    placeholder="type image here"
                    aria-describedby="imageHelper">
                <small id="imageHelper"
                    class="text-secondary @error('image') text-danger @enderror">
                    Select the image of the type max 1MB
                </small>
            </div>
            {{-- /.image --}}
            <button type="submit" class="btn btn-dark w-100 my-4">Save</button>
        </form>
    </div>
@endsection
