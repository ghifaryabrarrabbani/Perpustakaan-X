@extends('Template/app')
@section('title', 'Buku')

@section('content')
<h1>Request Log</h1>

<div class="card-body table-responsive p-0" style="overflow-y: auto;overflow-x: auto;">
  <table class="table table-head-fixed text-nowrap">
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
    @foreach ($requestbook as $item)
    <tr style="color: black; background-color:white;">
      {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
        <td>{{ $item->judul_buku}}</td>
        @if ($item->cover === null)
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
  </table>
</div>
</div>
@endsection



