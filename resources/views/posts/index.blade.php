@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if ( session()->has('success') )
        <div class="alert alert-success" id="flashMessage">{{ session()->get('success') }}</div>            
      @elseif(session()->has('deleted'))
        <div class="alert alert-danger" id="flashMessage">{{ session()->get('deleted') }}</div>            
      @endif
      <div class="card">
        <div class="card-header">
          <h3 style="display: inline-block">{{__('All Posts')}}</h3>
          <span class="float-end">
            <a href="{{route('posts.create')}}" class="btn btn-info">
              <i class="fa fa-plus"></i>
              {{ __('Add New Post') }}
            </a>
          </span>
        </div>
        <div class="card-body">
          <div class="row">
            @if (! $posts->count() == 0)
              @foreach ($posts as $post)
              <div class="col-md-4">
                {{-- Image --}}
                <div class="card p-1" style="width: 15rem; height:95%;">
                  <img src="{{asset('storage/' . $post->image )}}" class="card-img-top img-thumbnail img-fluid" 
                  alt="image">
                  <div class="card-body">
                    @if ($post->trashed())
                      <h4 class="card-title">{{$post->title}}</h4>
                    @else
                      <a href="{{ route('posts.show', $post->id)}}" class="link-dark nav-link">
                        <h4 class="card-title">{{$post->title}}</h4>
                      </a>
                    @endif
                    <p class="card-text">{{ $post->description }}</p>
                      @if ($post->trashed())
                        <a href="{{ route('posts.restore', $post->id)}}" class="btn btn-success col-md-5 ">{{__('Restore')}}</a>
                      @else
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success col-md-5 ">{{__('Edit')}}</a>
                      @endif
                    <form action="{{route('posts.destroy', $post->id)}}" method="post" 
                          style="display: inline-block" class=" col-md-5">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">{{ $post->trashed() ? __('Delete') : __('Trash')}}
                      </button>
                    </form>
                  </div>
                </div>
                
              </div>
              @endforeach
            @else
              <div class="empty-div group-list-item col-md-11 m-auto"> There is no posts to show</div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
