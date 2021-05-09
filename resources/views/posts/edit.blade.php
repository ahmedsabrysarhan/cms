@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header align-items-center">
          <h3>{{__('Edit Post')}}</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- show Image --}}
            <div class="mb-3 form-group row mx-1 justify-content-center">
              <img src="{{asset('storage/'. $post->image)}}" style="width: 100%" >
            </div>
            {{-- Title --}}
            <div class="form-group row mx-1 mb-3">
              <label for="post title" class="col-sm-3 col-form-label"> {{__('Post Title:')}} </label>
              <input type="text" name="title" 
                    class="form-control col-sm-9 @error('title') is-invalid @enderror" 
                    value="{{$post->title}}" autocomplete="off">
              @error('title')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            {{-- Description --}}
            <div class="form-group row mx-1 mb-3">
              <label for="post description" class="col-sm-3 col-form-label"> {{__('Post description:')}} </label>
              <input type="text" name="description" 
                    class="form-control col-sm-9 @error('description') is-invalid @enderror" 
                    value="{{$post->description}}" autocomplete="off">
              @error('description')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            {{-- Post Category --}}
            <div class="form-group row mx-1 mb-3">
              <label for="post description" class="col-sm-3 col-form-label"> {{__('Category :')}} </label>
              <select class="form-select form-control col-sm-9 " aria-label="Default select example" name="category">
                @foreach ($categories as $category)
                  <option value="{{$category['id']}}"   
                    @if ($category['id'] == $post->category_id)
                      selected
                    @endif>
                    {{ $category['name'] }}
                  </option>
                  {{$post->category}}
                @endforeach
              </select>
            </div>
            {{-- Post Tags --}}
            <div class="form-group row mx-1 mb-3">
              <label for="post description" class="col-sm-3 col-form-label"> {{__('Tags :')}} </label>
              <div class="col-sm-9 p-0">
                <select class="form-select form-control select2" name="tags" multiple>
                  @foreach ($tags as $tag)
                    <option value="{{$tag['id']}}"
                      @if ($post->hasTag($tag['id']))
                          selected
                      @endif
                    >
                      {{ $tag['name'] }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            
            
            {{-- Image --}}
            <div class="mb-3 form-group row mx-1">
              <label for="postImage" class="col-form-label col-sm-3">{{__('Post Image')}}</label>
              <input name="image" class="form-control col-sm-9 @error('image') is-invalid @enderror" type="file" id="formFile" autocomplete="off">
              @error('image')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            {{-- Content --}}
            <div class="form-group row mx-1 mb-3">
              <label for="floatingTextarea2" class="col-sm-3 col-form-label">{{__('Post Content')}}</label> 
                <input id="x" type="hidden" name="content" value="{{$post->content}}">
                <trix-editor input="x"></trix-editor>
              @error('content')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            {{-- Action --}}
            <div class="form-group offset-sm-3">
              <input type="submit" value="Update" class="btn btn-success col-md-3 m-auto">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection