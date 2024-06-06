@extends('Template/app')
@section('title', 'Delete User')

@section('content')

@if (session('status'))
  <div class="alert alert-success alert-dismissible" style="margin-top: 20px;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session('status') }}
  </div>
@endif

{{-- <div class="card-body table-responsive">
    <p class="lead">Apakah kamu yakin mau banned user <strong>{{$user->username}}</strong>?</p>
    <div class="mt-4">
        <a href="/users-destroy/{{$user->slug}}" class="btn btn-danger me-3">Iya</a>
        <a href="/users/" class="btn btn-primary">Nggak</a>
    </div>
</div> --}}

<br>
<div class="card card-primary" style="width: 100%;">
  <div class="card-header">
      <h3 class="card-title">Delete Category</h3>
  </div>
<div class="card-body" style="text-align: center">
  {{-- <div class="alert alert-warning alert-dismissible" style="text-align: center"> --}}
    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
    <h5>Are you sure you want to delete user {{$user->username}}?</h5>
    <br>
    <a href="/users-destroy/{{$user->slug}}" class="btn btn-primary me-3">Yes</a>
    <a href="/users/" class="btn btn-danger me-3">No</a>
  </div>


@endsection
