@extends('Template/app')
@section('title', 'Dashboard')
@section('page=name', 'dashboard')
@section('content')
<h1>Book Request</h1>

@if (session('message'))
<div class="alert {{session('alert-class')}}">
    {{session('message')}}
</div>
@endif

<section class="content">
    <div class="container-fluid" style="margin-top: 5px;">
      <div class="row">
        <!-- left column -->
          <!-- general form elements -->
          <div class="card card-primary" style="width: 100%;">
            <div class="card-header">
              <h3 class="card-title">Confirm Book Request</h3>
            </div>
<form action="books-edit-request" method="post">
    @csrf
    <div class="card-body">
    <div class="form-group">
        <label for="username">Username</label>
        <select class="form-control" name="username" id="username" required style="width: 100%;">
            <option value="" disabled selected>Choose User</option>
            @foreach ($username->sortBy('username') as $user)
            <option value="{{ $user->username }}">{{ $user->username }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="judul_buku">Books</label>
        <select class="form-control" name="judul_buku" id="judul_buku" required style="width: 100%;">
            <option value="" disabled selected>Choose Book</option>
            @foreach ($requestbook->sortBy('judul_buku') as $book)
                <option value="{{ $book->judul_buku }}">{{ $book->judul_buku }}</option></option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection

