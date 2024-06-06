@extends('Template/app')
@section('title', 'Buku')

@section('content')
<h1>Book Setting</h1>
<a href="books-add" class="btn btn-primary"> Add Data </a>
<br>
@if (session('status'))
  <div class="alert-alert success"  style="margin-top: 10px;">
    <div class="alert alert-success alert-dismissible">
      {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
      {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
      {{session('status')}}
    </div>
@endif
</div>

<p></p>
<div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap" style="height:100%; overflow-y:auto">
                  <thead>
                    <tr style="text-align: center">
                      <th>No</th>
                      <th>ID</th>
                      {{-- <th>Sampul</th> --}}
                      <th>Judul Buku</th>
                      <th>Penulis</th>
                      <th>Penerbit</th>
                      <th>Tahun Buku</th>
                      <th>Edisi Buku</th>
                      <th>Kategori</th>
                      <th>Kuantitas</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($books as $item)
                    <tr style="color: black; background-color:white; text-align:center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->id}}</td>
                        {{-- <td>
                          <img src="{{asset('cover/'.$item->cover)}}" alt="Cover Buku" width="100px">
                      </td>            --}}
                        <td>{{$item->judul_buku}}</td>           
                        <td>{{$item->penulis}}</td>
                        <td>{{$item->penerbit}}</td>
                        <td>{{$item->tahun_buku}}</td>
                        <td>{{$item->edisi_buku}}</td>
                        <td>{{$item->id_kategori}}</td>
                        <td>{{$item->stocks}}</td>
                        <td><button type="button" class="btn btn-info toastrDefaultInfo"><a href="/books-edit/{{$item->slug}}" style="color:white">Edit</a></button> <button type="button" class="btn btn-danger toastrDefaultInfo"><a href="/books-delete/{{$item->slug}}" style="color:white">Delete</a></button></td>
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