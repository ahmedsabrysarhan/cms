@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12">
    <div class="row text-center">
      {{-- Users --}}
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-info">
            Users
          </div>
          <div class="card-body">
            {{$users}}
          </div>
        </div>
      </div>
      {{-- Categories --}}
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-info">
            Categories
          </div>
          <div class="card-body">
            {{$categories}}
          </div>
        </div>
      </div>
      {{-- Posts --}}
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-info">
            Posts
          </div>
          <div class="card-body">
            {{$posts}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
