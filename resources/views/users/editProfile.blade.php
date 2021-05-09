@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header align-items-center">
          <h3>{{__ ('Edit Profile')}}</h3>
        </div>
        <div class="card-body">
          <form action="{{route('users.updateProfile', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Show Picture --}}
            <div class="form-group offset-sm-3">
              <img src= @if (isset($user->profile->picture))
              {{asset('storage/' . $user->profile->picture)}}
              @else
              {{ $user->getAvatar()}}
            @endif
              style="display:block; width: 3rem;">
            </div>
            {{-- Name --}}
            <div class="form-group row mx-1 mb-3">
              <label for="profile" class="col-sm-3 col-form-label"> {{__('Name :')}} </label>
              <input type="text" name="name" value="{{ $user->name }}"
                    class="form-control col-sm-9 @error('name') is-invalid @enderror" 
                    autocomplete="off">
              @error('name')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            {{-- Email --}}
            <div class="form-group row mx-1 mb-3">
              <label for="email" class="col-sm-3 col-form-label"> Email </label>
              <input type="text" class="form-control col-sm-9" name="email" value="{{$user->email}}">
            </div>
            {{-- About Me --}}
            <div class="form-group row mx-1 mb-3">
              <label for="about" class="col-sm-3 col-form-label"> About me </label>
              <input type="text" class="form-control col-sm-9" name="about" value="{{$profile->about}}">
            </div>
            {{-- facebook --}}
            <div class="form-group row mx-1 mb-3">
              <label for="facebook" class="col-sm-3 col-form-label"> Facebook </label>
              <input type="text" class="form-control col-sm-9" name="facebook" value="{{$profile->facebook}}">
            </div>
            {{-- twitter --}}
            <div class="form-group row mx-1 mb-3">
              <label for="twitter" class="col-sm-3 col-form-label"> Twitter </label>
              <input type="text" class="form-control col-sm-9" name="twitter" value="{{$profile->twitter}}">
            </div>
            {{-- Profile Picture --}}
            <div class="form-group row mx-1 mb-3">
              <label for="twitter" class="col-sm-3 col-form-label"> Profile picture </label>
              <input type="file" class="form-control col-sm-9" name="picture">
            </div>
            {{-- Action --}}
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