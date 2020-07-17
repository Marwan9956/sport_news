@extends('layouts.app')

@section('content')
<div class="fluid-container">
    <div class="card">
        <div class="card-header">Image Gallery</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div> 
</div>
@endsection
