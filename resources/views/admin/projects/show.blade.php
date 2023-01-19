@extends('layouts.admin')
@section('content')
<a class="btn btn-primary" href="{{ route('admin.projects.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i></a>
<div class="container text-center p-5 d-flex align-items-center flex-column">
        @if ($project->cover_image)
        <img src="{{asset('storage/' . $project->cover_image)}}" alt="">
        @else
        <div class="segnaposto">
                <h6>placeholder</h6>
        </div>
        @endif
        <h1 class="mt-4">{{$project->title}}</h1>
        <h3>{{$project->slug}}</h3>
        <h5>{{$project->description}}</h5>
        <h6>Type: {{ $project->type ? $project->type->name : 'Uncategorized'}}</h6>
        <div class="tecnologie">
        @if (count($project->technologies) > 0)
                <span>Tecnologie: </span>
                @foreach ($project->technologies as $techology)
                <span>{{$techology->name}}</span>   
                @endforeach
        @else
        <span>Tecnologie: Nessuna tecnologia associata a questo progetto.</span>
        @endif
        </div>

</div>
@endsection