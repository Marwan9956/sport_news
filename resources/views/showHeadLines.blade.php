@extends('layouts.app')

@section('content')
<div class="container">
<ul class="list-group pmd-list pmd-card-list">
    @isset($headLines)
        @foreach($headLines as $item)
            <li class="list-group-item d-flex">
                <p>{{$item->id}} -</p>
                &nbsp;&nbsp;
                <p class="main-text">{{$item->text}}</p> 
                <a href="{{route('editHeadlines_form',$item->id)}}" class="btn btn-warning">Edit</a>
                &nbsp;&nbsp; 
                <form method="POST" action="{{route('deleteHeadlines',$item->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="deleteHeadLines" class="btn btn-danger">
                        Delete
                    </button> 
                </form>
            </li>
        @endforeach
    @endisset
</ul>
</div>
@endsection