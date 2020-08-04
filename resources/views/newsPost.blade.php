@extends('layouts.app')

@section('content')
<div class="container">
<ul class="list-group pmd-list pmd-card-list">
    @isset($newsPosts)
        @foreach($newsPosts as $post)
            <li class="list-group-item d-flex">
                <div  class="headline-text"> <p>{{$post->id}} - {{$post->title}}</p> </div>
                <div  class="middle-text"> <p>{{Str::limit($post->body,70)}}</p> </div>
                <section class="form-box">
                    <a href="{{route('editNews_form',$post->id)}}" class="btn btn-warning">
                        Edit
                    </a> 
                    <form method="POST" action="{{route('deleteNews',$post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="deleteHeadLines" class="btn btn-danger">
                            Delete
                        </button> 
                    </form>
                </section>
            </li>
        @endforeach
    @endisset
</ul>
</div>
@endsection