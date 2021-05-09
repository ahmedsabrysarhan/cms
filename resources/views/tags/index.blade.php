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
            <h3 style="display: inline-block" class="float-start">All tags</h3>
            <a class='float-end' href="{{ route('tags.create') }}">
              <span class="btn btn-info">
                <i class="fa fa-plus"></i>
                {{__('Add New tag')}}
              </span>
            </a>
          </div>
          <div class="card-body">
            <div class="list-group">
              @if ($tags->count() > 0)
                @foreach ($tags as $tag)
                  <div class="list-group-item">
                    <a href="#">
                      {{ $tag->name }}
                    </a>
                    <span class="badge bg-info text-dark ml-2">{{$tag->posts->count()}}</span>
                    <span class="float-end mr-2">
                      <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button class="btn btn-danger"> Delete </button>
                      </form>
                    </span>
                    <span class="float-end mr-2">
                      <a href="{{ route('tags.edit', $tag->id) }}">
                        <button class="btn btn-success"> Edit </button>
                      </a>
                    </span>
                  </div>
                @endforeach
              @else
                <div class="empty-div group-list-item col-md-11 m-auto"> There is no Tags to show</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


