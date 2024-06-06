@extends('Template/app')
@section('title', 'Request Control')

@section('content')
<h1>Request Control</h1>
<a href="books-user3" class="btn btn-primary">Request </a>
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
                        <th>Judul Buku</th>
                        <th>Cover</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Tahun Buku</th>
                        <th>Edisi Buku</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($request as $item)
                    <tr style="color: black; background-color:white;">
                      {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
                        <td>{{ $item->judul_buku}}</td>
                        @if ($item->cover == null)
                        <td><span style="color: red"><strong>Not Available</strong></span></td>
                        @else
                            <td><img src="{{ asset('cover/' . $item->cover) }}" class="card-img-top custom-img" draggable="false"></td>
                        @endif
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->tahun_buku }}</td>
                        <td>{{ $item->edisi_buku }}</td>
                        <td>
                          @if ($item->created_at == $item->updated_at)
                          <span style="color: red"><strong>Not Available</strong></span>
                          @else
                          <span style="color: green"><strong>Available</strong></span>
                          @endif
                        </td>
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