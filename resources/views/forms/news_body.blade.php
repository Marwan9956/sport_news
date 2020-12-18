@extends('layouts.app')

@section('content')


<news-post 
    header_text   = "{{ $title }}"
    news_types    = "{{json_encode($newsTypes)}}" 
    csrf          = "{{csrf_token()}}"

    @if($form_type === 'edit')
        post_method = "PUT"
    @endif

    @isset($newsPosts)
        old_news_type = "{{$newsPosts->type_id}}"
        title         = "{{$newsPosts->title}}"
        body_text     = "{{$newsPosts->body}}"
        action_url    = "{{route('editNews' , $newsPosts->id )}}"
    @else 
        old_news_type = "{{old("newsType")}}"
        title         = "{{old('title')}}"
        body_text     = "{{old('Body')}}"
        action_url    = "{{route('storeNews')}}"
    @endisset
>
</news-post>

@endsection