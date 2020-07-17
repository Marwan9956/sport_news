@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create News List:</h1>
    <br/>
    <br/> 
    <form method="POST" action="{{route('storeList')}}" name="newsHeader">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" class="form-control" type="text" name="title" value="{{ old('title')}}"/> 
        </div>

        <div class="form-group">
            <label for="headText">Head line text</label>
            <textarea id="headText" class="form-control" name="headText">{{ old('headText')}}</textarea> 
        </div>

        <div class="form-group">
            <label>Head lines news :</label>
            <input id="headLines" class="form-control" type="text" name="headLines" value="{{ old('headLines')}}"/>
            <br/>
            @if(session()->has('counter'))
                @for($i = 0; $i < session('counter'); $i++)
                <input id="headLines{{$i}}" class="form-control" type="text" name="headLines{{$i}}" value="{{ old('headLines' . $i)}}"/>
                <br/>
                @endfor
            @endif 
            
            <button id="addNewHeadLines" class="btn btn-success btn-lg btn-block btn-font"> Add New head line</button>
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
    </form>
</div>
@endsection