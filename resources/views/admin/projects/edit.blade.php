@extends('layouts.admin')
@section('content')
<a class="btn btn-primary" href="{{ route('admin.projects.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i></a>
    <div class="container">
    <h1 class="py-5">Modify Project</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.projects.update', $project->slug) }}" method="post" class="card p-3" enctype="multipart/form-data">        
        @csrf
        @method('PUT')

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="title" class="form-label">Title <strong class="text-danger">*</strong></label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="add title" aria-describedby="titleHlper" value="{{ old('title', $project->title) }}">        
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select form-select-lg @error('type_id') is-invalid @enderror" name="type_id" id="type_id">                
            <option selected value=''>Untyped</option>

                @forelse($types as $type)
                <option value="{{ $type->id }}" {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>{{ $type->name }} </option>                
                @empty
                <option value="">Sorry, no categories in the system.</option>
                @endforelse
            </select>
        </div>
        @error('type_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        @if($project->cover_image)
        <img width="140" src="{{asset('storage/' . $project->cover_image)}}" alt="">
        @else
        <div class="segnaposto">
            <h6>placeholder</h6>
        </div>
        @endif

        <div class="form-group">
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="Add a cover image" aria-describedby="coverImgHelper">            
            <small id="coverImgHelper" class="form-text text-muted">Add a cover image</small>
        </div>
        @error('cover')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="technologies" class="form-label">City</label>
                <select multiple class="form-select form-select-lg" name="technologies[]" id="technologies">
                    <option value="" disabled>Select one</option>

                    @forelse ($technologies as $technology)
                        @if ($errors->any())
                            <option
                                value="{{ $technology->id }}"{{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                                {{ $technology->name }}</option>
                        @else
                            <option
                                value="{{ $technology->id }}"{{ $project->technologies->contains($technology->id) ? 'selected' : '' }}>
                                {{ $technology->name }}</option>
                        @endif
                    @empty
                        <h6>Sorry.No technologies inside the database yet.</h6>
                    @endforelse
                </select>

            </div>

            {{-- SEPARATORE --}}


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4" placeholder="add text">{{ old('description', $project->description) }}</textarea>        
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>

@endsection