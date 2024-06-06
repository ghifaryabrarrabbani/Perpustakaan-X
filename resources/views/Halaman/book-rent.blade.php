@extends('Template/app')
@section('title', 'Book-rent')
@section('page=name', 'book-rent')
@section('content')
<h1>Book Rent</h1>
{{-- <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}"> --}}
@if (session('message'))
<div class="alert {{ session('alert-class') }}">
    {{ session('message') }}
</div>
@endif
<section class="content">
    <div class="container-fluid" style="margin-top: 5px;">
      <div class="row">
        <!-- left column -->
          <!-- general form elements -->
          <div class="card card-primary" style="width: 100%;">
            <div class="card-header">
              <h3 class="card-title">Add Book Rent</h3>
            </div>
<form action="book-rent" method="post">
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


{{-- <script src="{{ asset('AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script>
    $(function () {
      $('.select2').select2()
    });
</script> --}}
@endsection
