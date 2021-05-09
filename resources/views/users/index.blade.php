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
            <h3 style="display: inline-block" class="float-start">All users</h3>
          </div>
          <div class="card-body">
            <div class="list-group">
              @if ($users->count() > 0 )
                @foreach ($users as $user)
                  <div class="list-group-item">
                    <img src= @if (isset($user->profile->picture))
                      {{asset('storage/' . $user->profile->picture)}}
                      @else
                      {{ $user->getAvatar()}}
                    @endif  
                    alt="" style="border-radius: 50%; width:2rem;" class="mr-3">
                    <a href="#">
                      {{ $user->name }}
                    </a>

                    <span class="float-end mr-2">
                      @if ($user->isAdmin())
                      <form action="{{route('users.remove-admin', $user->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit"> {{__("Remove Admin")}} </button>
                      </form>
                      @else
                      <div class="px-2 py-1 div-info" style="">{{ $user->role}}</div>
                      @endif
                    </span>

                    <span class="float-end mr-2">
                      @if (! $user->isAdmin())
                      <form action="{{route('users.make-admin', $user->id)}}" method="post">
                        @csrf
                        <button class="btn btn-success" type="submit"> {{__('Make Admin')}} </button>
                      </form>
                      @else
                        <div class="px-2 py-1 div-info" style="">{{ $user->role}}</div>
                      @endif
                    </span>
                  </div>
                @endforeach
              @else
                <div class="empty-div group-list-item col-md-11 m-auto"> There is no users to show</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


