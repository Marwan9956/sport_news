@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Headlines :</h1>
    <br/>
    <br/> 
    
    <form method="POST" action="{{route('createHeadlines')}}" name="headlines_create">
        @csrf
        <div class="form-group">
            <label for="text">Headlines Text</label>
            <input id="text" class="form-control" type="text" name="text" value="{{ old('text') }}"/> 
        </div>
        <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Add" />
    </form>
</div>    
@endsection