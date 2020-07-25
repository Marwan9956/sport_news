@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create News Category:</h1>
        <br/>
        <br/> 
        <form method="POST" action="{{route('categories_store')}}" name="newsType">
            @csrf
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input id="category_name" class="form-control" type="text" name="category_name" value="{{ old('category_name')}}"/> 
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" rows="10" cols="10">
                    {{ old('description')}}
                </textarea> 
            </div>
            
            <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
        </form>
    </div>
@endsection