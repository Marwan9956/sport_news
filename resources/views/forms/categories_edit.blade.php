@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Category:</h1>
    <br/>
    <br/> 
    <form method="POST" action="{{route('categories_edit_apply', $category->id )}}" name="newsType_edit">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input id="category_name" class="form-control" type="text" name="category_name" value="{{ $category->type_name }}"/> 
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="description" rows="10" cols="10">{{ $category->description }}</textarea> 
        </div>
        
        <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
    </form>
</div>    
@endsection