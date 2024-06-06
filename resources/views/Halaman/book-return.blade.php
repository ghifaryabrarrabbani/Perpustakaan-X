@extends('Template/app')
@section('title', 'Dashboard')
@section('page=name', 'dashboard')
@section('content')
<h1>Return Books</h1>

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
              <h3 class="card-title">Add Book Return</h3>
            </div>
<form action="book-return" method="post">
    @csrf
    <div class="card-body">
    <div class="form-group">
        <label for="id_user">Username</label>
        <select class="form-control" name="id_user" id="id_user" required style="width: 100%;">
            <option value="" disabled selected>Choose User</option>
            @foreach ($users->sortBy('username') as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="id_pustaka">Books</label>
        <select class="form-control" name="id_pustaka" id="id_pustaka" required style="width: 100%;">
            <option value="" disabled selected>Choose Book</option>
            @foreach ($books->sortBy('judul_buku') as $book)
                <option value="{{ $book->id }}">{{ $book->judul_buku }}</option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection