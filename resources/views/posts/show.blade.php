@extends('layouts.app')

@section('content')
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
            <a href="{{route('categories.show', $post->category_id )}}" class="btn btn-outline-info mb-2">
              {{ $post->category->name}}
            </a> 
          </div> 
        </div>
        <div class="float-start ml-2">
          <div>
            <i class="fa fa-tags"></i>{{__("Tags : ")}}  
            @foreach ($post->tags as $tag)
                <a href="#" class="btn btn-outline-info">{{$tag->name}}</a>
            @endforeach
          </div> 
        </div>
      </div>
      <div class="row justify-content-center">
        <a href="{{route('posts.edit', $post->id)}}" class="col-sm-2">
          <button class="btn btn-success px-4 py-2">{{__('Edit')}}</button>
        </a>
        <form action="{{route('posts.destroy', $post->id)}}" method="post" 
          style="display: inline-block" class="col-sm-2 "> @csrf @method('DELETE')
        <button class="btn btn-danger px-4 py-2">{{ __('Trash')}}</button>
      </form>
      </div>
    </div>
  </div>
@endsection