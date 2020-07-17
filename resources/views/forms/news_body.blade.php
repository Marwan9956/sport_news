@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create News:</h1>
    <br/>
    <br/> 
    <form method="POST" action="{{route('storeNews')}}" name="newsBody">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" class="form-control" type="text" name="title" value="{{ old('title')}}"/> 
        </div>

        <div class="form-group">
            <label for="Body">Body</label>
            <textarea id="Body" class="form-control" name="Body" rows="10" cols="10">
                {{ old('Body')}}
            </textarea> 
        </div>

        <div class="form-group">
            <label>news Type:</label>
            <select class="custom-select" name="newsType">
                <option selected disabled>select </option>
                @isset($newsTypes)
                    @foreach($newsTypes as $type)
                        <option value="{{$type->id}}"  {{ (old("newsType") == $type->id ? "selected":"") }}  >
                            {{$type->type_name}}
                        </option>
                    @endforeach
                @endisset
            </select>
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
    </form>
</div>
@endsection