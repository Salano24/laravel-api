@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body d-flex justify-content-between align-items-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                   <h3 class="ms-5">{{ __('You are logged in!') }}</h3> 
                    <div class="image "><img class="" src="{{ Vite::asset('resources/img/pngimg.com - spongebob_PNG16.png') }}" alt="User photo"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
