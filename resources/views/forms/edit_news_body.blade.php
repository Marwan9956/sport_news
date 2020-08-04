@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit News:</h1>
    <br/>
    <br/> 
    @if(isset($newsPosts))
    <form method="POST" action="{{route('editNews' , $newsPosts->id )}}" name="newsBody_edit">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" class="form-control" type="text" name="title" value="{{ $newsPosts->title }}"/> 
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body" rows="10" cols="10">
                {{ $newsPosts->body }}
            </textarea> 
        </div>

        <div class="form-group">
            <label>news Type:</label>
            <select class="custom-select" name="newsType">
                <option selected disabled>select </option>
                @isset($newsType)
                    @foreach($newsType as $type)
                        <option value="{{$type->id}}"  {{ ($newsPosts->type_id == $type->id ? "selected":"") }}  >
                            {{$type->type_name}}
                        </option>
                    @endforeach
                @endisset
            </select>
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
    </form>
    @else
        {{redirect()->route('home')->send()}}
    @endif
</div>
@endsection