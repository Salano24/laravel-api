@extends('layouts.admin')
@section('content')
<a class="btn btn-primary" href="{{route('admin.types.index')}}" role="button"><i class="fas fa-angle-left fa-fw"></i></a>
<div class="container">
    <h1 class="py-5">Add new Type</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('admin.types.store')}}" method="post" class="card p-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">name <strong class="text-danger">*</strong></label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="add name" aria-describedby="titleHlper" value="{{old('name')}}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection