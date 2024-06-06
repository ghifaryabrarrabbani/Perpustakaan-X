@extends('Template/app')
@section('title', 'Dashboard')
@section('page=name', 'dashboard')
@section('content')
<h1>Rentlog Books</h1>

<form action="rentlog" method="get">
  <div class="row">
    <div class="col-11">
      <div class="form-group"> <!-- Tambahkan class form-group di sini -->
        <select class="form-control" name="id_user" id="id_user">
          <option value="">Seluruh User</option>
          @if ($user)
              @foreach ($user as $user)
                  @if ($user->id != 1)
                      <option value="{{ $user->id }}">{{ $user->username }}</option>
                  @endif
              @endforeach
          @endif
      </select>
      </div>
    </div>
    <div class="col-1">
        <button type="submit" class="btn btn-default">
          <i class="fa fa-search"></i>
        </button>
    </div>
  </div>
</form>

<div class="card-body table-responsive p-0" style="overflow-y: auto;overflow-x: auto;">
    <table class="table table-head-fixed text-nowrap">
    <thead>
      <tr>
        <th>Judul Buku</th>
        <th>Username</th>
        <th>Tanggal Sewa</th>
        <th>Tanggal Kembali</th>
        <th>Tanggal Asli Kembali</th>
        <th>Status</th>
      </tr>
      @foreach ($rentlog as $item)
      <tr style="color: black; background-color:white;">
        {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
          <td>{{ $item->book->judul_buku}}</td>
          <td>{{ $item->user->username}}</td>
          <td>{{ $item->tanggal_sewa }}</td>
          <td>{{ $item->tanggal_kembali }}</td>
          <td>{{ $item->tanggal_asli_kembali }}</td>
          <td>
            @if ($item->tanggal_asli_kembali === null)
              Not Defined
            @elseif ($item->tanggal_asli_kembali > $item->tanggal_kembali)
              <span style="color: red"><strong>TELAT</strong></span>
            @else
            <span style="color: green"><strong>TEPAT WAKTU</strong></span>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection