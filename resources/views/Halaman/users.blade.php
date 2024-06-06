@extends('Template/app')
@section('title', 'Kategori')

@section('content')
<h1>User</h1>
<a href="users-add" class="btn btn-primary"> Add User </a>
<a href="users-registered" class="btn btn-primary"> Registered User </a>
{{-- <a href="users-deleted" class="btn btn-secondary me-3">View Banned User</a> --}}

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
                  <table class="table table-head-fixed text-nowrap" style="height:100%; overflow-x:auto; text-align:center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $item)
                    <tr style="color: black; background-color:white;">
                        <td>{{$item->id}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->id_role}}</td>
                        <td>{{$item->status}}</td>
                         <td><button type="button" class="btn btn-danger toastrDefaultInfo"><a href="users-delete/{{$item->slug}}" style="color:white">Ban</a></button></td>
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