@extends('layouts.admin')
@section('content')
<a class="btn btn-primary" href="{{route('admin.types.index')}}" role="button"><i class="fas fa-angle-left fa-fw"></i></a>
<div class="container text-center p-5 d-flex align-items-center flex-column">
        <h1 class="mt-4">Type: {{$type->name}}</h1>
</div>
@endsection