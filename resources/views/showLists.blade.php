@extends('layouts.app')

@section('content')

<ul class="list-group pmd-list pmd-card-list">
    @isset($newsHeaderList)
        @foreach($newsHeaderList as $header)
            <li class="list-group-item d-flex">
                <div class="media-body">
                    <h5 class="">{{$header->title}}</h5>
                    <p class="pmd-list-subtitle">{{$header->headText}}</p> 
                </div>
                <a href="{{route('showAllHeadlines',$header->id)}}" class="btn btn-success">
                    HeadLines
                </a>
                &nbsp;&nbsp; 
                <a href="{{route('showNewsPostByList',$header->id)}}" class="btn btn-success">
                    all posts
                </a> 
            </li>
        @endforeach
    @endisset
</ul>

@endsection