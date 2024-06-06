@extends('Template/app')
@section('title', 'Buku')

@section('content')
<h1>Book Log</h1>

<div class="card-body table-responsive p-0" style="overflow-y: auto;overflow-x: auto;">
  <table class="table table-head-fixed text-nowrap">
  <thead>
    <tr>
      <th>ID Pustaka</th>
      <th>Nama Pustaka</th>
      <th>Tanggal Sewa</th>
      <th>Tanggal Kembali</th>
      <th>Tanggal Asli Kembali</th>
      <th>Status</th>
    </tr>
    @foreach ($rentlog as $item)
    <tr style="color: black; background-color:white;">
      {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
        <td>{{ $item->id_pustaka }}</td>
        <td>{{ $item->book->judul_buku}} </td>
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



