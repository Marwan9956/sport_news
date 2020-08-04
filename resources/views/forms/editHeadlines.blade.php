@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Headlines :</h1>
    <br/>
    <br/> 
    
    <form method="POST" action="{{route('editHeadlines',$headLines->id)}}" name="headlines_edit">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="text">Headlines Text</label>
            <input id="text" class="form-control" type="text" name="text" value="{{ $headLines->text }}"/> 
        </div>


        <div class="form-group">
            <label>news list ID:</label>
            <select class="custom-select" name="newsHeaderId">
                <option selected disabled>select </option>
                @isset($newsHeader)
                    @foreach($newsHeader as $list)
                        <option value="{{$list->id}}"  {{ ($headLines->news_header_id == $list->id ? "selected":"") }}  >
                            {{$list->title}}
                        </option>
                    @endforeach
                @endisset
            </select>
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
    </form>
</div>    
@endsection