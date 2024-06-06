@extends('Template/app')
@section('title', 'Users')

@section('content')
<h1>Registered User</h1>

<!-- stylingnya ga keluar -->
<a href="users" class="btn btn-primary"> Approved User </a>

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
                  <table class="table table-head-fixed text-nowrap" style="height:100%; overflow-x:auto;text-align:center">
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
                    @if ($registeredUser->count() > 0)
                    @foreach ($registeredUser as $item)
                    <tr style="color: black; background-color:white;">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->id_role}}</td>
                        <td>{{$item->status}}</td>
                        <td><button type="button" class="btn btn-info toastrDefaultInfo"><a href="/users-approve/{{$item->slug}}" style="color:white">Approve User</a></button>
                          <button type="button" class="btn btn-danger toastrDefaultInfo"><a href="#{{$item->slug}}" style="color:white">Ban</a></button>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" style="text-align: center">No data</td>
                    </tr>
                @endif
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
@endsection