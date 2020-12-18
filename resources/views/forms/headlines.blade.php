@extends('layouts.app')

@section('content')

<headlines
    header_text = "{{ $headerText }}"
    action_url  = "{{ $actionURL  }}"
    
    @isset($postMethod)
        headlines    = "{{ $headLines->text }}"
        v-bind:headlines_id = "{{ $headLines->news_header_id }}"
        v-bind:news_header="true"
        news_header_list_prop="{{json_encode($newsHeader)}}"
        post_method = "{{$postMethod}}"
    @else
        headlines   = "{{ old('text') }}"
        post_method = ""
    @endisset
    csrf = "{{csrf_token()}}"
></headlines>
@endsection