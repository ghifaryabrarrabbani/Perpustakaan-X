@extends('Template/app')
@section('title', 'Kategori')

@section('content')


<!-- stylingnya ga keluar -->
@if (session('status'))
  <div class="alert-alert success">
    {{session('status')}}
  </div>
@endif

{{-- <!-- taro add datanya dimana? -->
<div class="card-body table-responsive p-0">
    <h5>Apakah kamu yakin mau menghapus kategori {{$category->category}}</h5>
    <div class ="mt-5">
        <a href="/kategori-destroy/{{$category->slug}}" class="btn btn-danger me-3">Iya</a>
        <a href="/kategori/" class="btn btn-primary">Nggak</a>
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
    <h5>Are you sure you want to delete category {{$category->category}}?</h5>
    <br>
    <a href="/kategori-destroy/{{$category->slug}}" class="btn btn-primary me-3">Yes</a>
    <a href="/kategori/" class="btn btn-danger me-3">No</a>
  </div>
@endsection
