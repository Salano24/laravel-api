@extends('layouts.admin')
@section('content')
<h1>Projects</h1>
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<a class="btn btn-primary position-fixed bottom-0 end-0 m-5" href="{{route('admin.projects.create')}}" role="button"><i class="fas fa-plus fa-lg "></i></a>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Cover Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($projects as $project)
                <tr class="table-primary">
                    <td>{{$project->id}}</td>
                    <td>
                        @if ($project->cover_image)
                        <img width="80" src="{{asset('storage/' . $project->cover_image)}}" alt="">
                        @else
                        <div class="segnaposto_index">
                            <h6>placeholder</h6>
                        </div>
                        @endif
                    </td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->slug}}</td>
                    <td>{{$project->description}}</td>
                    <td>
                        <div class="actions d-sm-flex d-xxl-block flex-column p-3 min">
                            <a href="{{route('admin.projects.show', $project->slug)}}" class="btn bg-primary"><i class="fas fa-eye fa-md text-light"></i></a>
                            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn bg-secondary my-1"><i class="fas fa-pencil fa-md text-light"></i></a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProject-{{$project->slug}}">
                                <i class="fas fa-trash fa-md text-light"></i>
                            </button>


                            <div class="modal fade" id="deleteProject-{{$project->slug}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$project->slug}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-{{$project->slug}}">Delete Project</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Stai per cancellare in maniera inreversibile "{{$project->title}}". Sei Sicuro?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>

@endsection