@extends('layouts.app')

@section('content')
    <categories
        header_text="{{$header_text}}"
        action_url="{{ $action_url }}"
        csrf="{{csrf_token()}}"
        @isset($postMethod)
            @isset($category)
                data_fields="{{json_encode($category)}}"
            @endisset
            post_method ={{$postMethod}}
        @else 
            data_fields="{{
                json_encode([
                    "type_name"     => old("category_name"),
                    "description"   => old("description")
                ])
            }}"
        @endisset
        >
    </categories>
    
@endsection