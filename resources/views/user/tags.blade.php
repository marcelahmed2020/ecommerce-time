@section('site_name','Tags')
@extends('user.layout.app')
@section('content')

    <div class="well well-small">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
            <li><a class="active">Tags</a> <span class="divider">/</span></li>
        </ul>
    </div>

    <h4>Tags </h4>
    <ul class="thumbnails">
        @foreach($tags as $key => $tag)
            <li ><a href="{{ route('tag.product',$tag->name)}}" target="_blank" title="" class="btn bn--info">#{{$tag->name}}</a></li>
        @endforeach

    </ul>

@endsection
