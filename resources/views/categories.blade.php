@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="list-group pmd-list pmd-card-list">
        @isset($categories)
            @foreach($categories as $category)
                <li class="list-group-item d-flex">
                    <div class="media-body">
                        <h5 class="">{{$category->type_name}}</h5>
                    </div>

                    <a href="{{route('categories_edit',$category->id)}}" class="btn btn-warning">
                        Edit
                    </a>
                    &nbsp;&nbsp; 
                    <form method="POST" action="{{route('categories_delete',$category->id)}}">
                        @csrf
                        @method('Delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form> 
                </li>
            @endforeach
        @endisset
    </ul>
    <a href="{{route('categories_form')}}" class="btn btn-primary btn-lg btn-block">Add Category</a>
</div>

@endsection