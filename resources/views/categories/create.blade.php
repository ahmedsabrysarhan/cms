@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      @if ( session()->has('alert') )
        <div class="alert alert-danger p-2" id="flashMessage">{{ session()->get('alert') }}</div>
      @endif
      <div class="card">
        <div class="card-header align-items-center">
          <h3>Create New Category</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group row mx-1 mb-3">
              <label for="category" class="col-sm-3 col-form-label"> Category Name: </label>
              <input type="text" name="name" 
                    class="form-control col-sm-9 @error('name') is-invalid @enderror" 
                    placeholder="Add a new category" autocomplete="off">
              @error('name')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group offset-sm-3">
              <input type="submit" value="Create" class="btn btn-success col-md-3">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection