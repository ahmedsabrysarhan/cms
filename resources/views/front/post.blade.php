@extends('layouts.app')

@section('sidebar')
  <ul class="list-group">
    {{-- Categories --}}
    <li class="list-group-item">
        <a href="{{ route('categories.index') }}">Categories</a>
    </li>
    {{-- Posts --}}
    <li class="list-group-item">
        <a href="{{ route('posts.index') }}">Posts</a>
    </li>
    {{-- Tags --}}
    <li class="list-group-item">
        <a href="{{route('tags.index')}}">Tags</a>
    </li>

  </ul>
@endsection

@section('content')
<div class="col-md-9">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <img src="{{ asset('storage/'. $post->image) }}" alt="" style="width: 60%">
      </div>
      <h2>{{ $post->title }}</h2>
      <p>{{$post->description}}</p>
      <p>{!! $post->content !!}</p>
      <div class="col-md-9 mb-3">
        <div class="float-start ml-2">
          <div>
            <i class="fa fa-tags"></i>{{__("Category : ")}}  
            <a href="{{route('categories.show', $post->category_id )}}" class="btn btn-outline-info">
              {{ $post->category->name}}
            </a> 
          </div> 
        </div>
        <div class="float-start">
          <div>
            <i class="fa fa-tags mx-4"></i>{{__("Tags : ")}}  
            @foreach ($post->tags as $tag)
                <a href="#" class="btn btn-outline-info ">{{$tag->name}}</a>
            @endforeach
          </div> 
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection