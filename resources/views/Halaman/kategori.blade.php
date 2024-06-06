@extends('Template/app')
@section('title', 'Kategori')

@section('content')
<h1>Category</h1>
<a href="kategori-add" class="btn btn-primary"> Add Data </a>
<!-- stylingnya ga keluar -->
@if (session('status'))
  <div class="alert-alert success"  style="margin-top: 10px;">
    <div class="alert alert-success alert-dismissible">
      {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
      {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
      {{session('status')}}
    </div>
@endif



<!-- taro add datanya dimana? -->
<p></p>
<div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap" style="overflow-y:auto; text-align:center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $item)
                    <tr style="color: black; background-color:white;">
                        <td>{{$item->id}}</td>
                        <td>{{$item->category}}</td>
                        <td><button type="button" class="btn btn-info toastrDefaultInfo"><a href="/kategori-edit/{{$item->slug}}" style="color:white;">Edit</a></button> <button type="button" class="btn btn-danger toastrDefaultInfo"><a href="/kategori-delete/{{$item->slug}}" style="color:white">Delete</a></button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
@endsection