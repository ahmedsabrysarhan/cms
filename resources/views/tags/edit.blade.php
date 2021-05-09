@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header align-items-center">
          <h3>{{__ ('Edit tag')}}</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row mx-1 mb-3">
              <label for="tag" class="col-sm-3 col-form-label"> {{__('tag Name:')}} </label>
              <input type="text" name="name" value="{{ $tag->name }}"
                    class="form-control col-sm-9 @error('name') is-invalid @enderror" 
                    autocomplete="off">
              @error('name')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group offset-sm-3">
              <input type="submit" value="{{__('Update')}}" class="btn btn-success col-md-3">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection