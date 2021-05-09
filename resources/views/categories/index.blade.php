@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-12">
        @if ( session()->has('success') )
            <div class="alert alert-success" id="flashMessage">{{ session()->get('success') }}</div>            
        @elseif(session()->has('deleted'))
          <div class="alert alert-danger" id="flashMessage">{{ session()->get('deleted') }}</div>            
        @endif
        <div class="card">
          <div class="card-header ">
            <h3 style="display: inline-block" class="float-start">All Categories</h3>
            <a class='float-end' href="{{ route('categories.create') }}">
              <span class="btn btn-info">
                <i class="fa fa-plus"></i>
                {{__('Add New Category')}}
              </span>
            </a>
          </div>
          <div class="card-body">
            <div class="list-group">
              @if ($categories->count() > 0 )
                @foreach ($categories as $category)
                  <div class="list-group-item">
                    <a href="#">
                      {{ $category->name }}
                    </a>
                    <span class="float-end mr-2">
                      <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button class="btn btn-danger"> Delete </button>
                      </form>
                    </span>
                    <span class="float-end mr-2">
                      <a href="{{ route('categories.edit', $category->id) }}">
                        <button class="btn btn-success"> Edit </button>
                      </a>
                    </span>
                  </div>
                @endforeach
              @else
              <div class="empty-div group-list-item col-md-11 m-auto"> There is no Categories to show</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


