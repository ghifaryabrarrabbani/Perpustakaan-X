<div>
    <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>ID Pustaka</th>
            <th>ID User</th>
            <th>Tanggal Sewa</th>
            <th>Tanggal Kembali</th>
            <th>Tanggal Asli Kembali</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          @foreach ($rentlog as $item)
          <tr>
            {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
              <td>{{ $item->id_pustaka }}</td>
              <td>{{ $item->id_user }}</td>
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
              <td>
                <a href="/rentlog-edit/{{ $item->slug }}">Edit</a>
                <a href="/rentlog-delete/{{ $item->slug }}">Delete</a>
              </td>
            </tr>
          @endforeach
        </table>
</div>
</div>