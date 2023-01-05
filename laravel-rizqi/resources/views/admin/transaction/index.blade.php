@extends('layouts.admin')
@section('title', 'Halaman Transaction')

@section('css')
    
@endsection

@section('content')

  @can('index peminjaman')
    <div id="transaction">
        <div class="row">
            <div class="col-12 mb-4">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-8 pull-right">
                      <a href="{{ url('transaction/create') }}" class="btn btn-primary" >Add Transaction</a>
                    </div>
                    <div class="col-md-2">
                      <select class="form-control" name="status">
                        <option value="0">Semua Status</option>
                        <option value="1">Sudah Dikembalikan</option>
                        <option value="2">Belum Dikembalikan</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <select class="form-control" name="date_star">
                        <option value="0">Semua Tanggal</option>
                        @foreach ($member as $item)
                         <option value="{{ $item->date_star }}">{{ $item->date_star }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="datatable" class="table table-sm table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Tanggal Pinjam</th>
                        <th class="text-center">Tanggal Kembali</th>
                        <th class="text-center">Nama Peminjam</th>
                        <th class="text-center">Lama Pinjam (hari)</th>
                        <th class="text-center">Total Buku</th>
                        <th class="text-center">Total Bayar</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    {{-- <tbody>
                     @foreach ($member as $item)
                         <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ FormatTanggalA($item->date_star) }}</td>
                            <td class="text-center">{{ FormatTanggalA($item->date_end) }}</td>
                            <td>{{ $item->members->nama }}</td>
                            <td class="text-center">@php
                                $dateStar = new DateTime($item->date_star);
                                $dateEnd = new DateTime($item->date_end);
                                $diff = $dateStar->diff($dateEnd);
                                echo $diff->days. " Hari"
                            @endphp</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td class="text-center"><span class="badge badge-{{ $item->status == 1 ? 'success' : 'danger' }}">{{ $item->status == 1 ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}</span></td>
                            <td class="text-center">
                              <a href="{{ url('transaction/'.$item->id) }}" class="btn btn-sm btn-info">Detail</a>
                              <a href="{{ url('transaction/'.$item->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                              
                              <form class="d-inline" action="{{ url('transaction/'.$item->id) }}" method="post">
                                <input class="btn btn-sm btn-danger" type="submit" value="Hapus" onclick="return confirm('Yakin Ingin Menghapus Nama Peminjam {{ $item->members->nama }} ?')">
                                @csrf
                                @method('delete')
                              </form>
                            </td>
                         </tr>
                     @endforeach
                    </tbody> --}}
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
  @endcan


@endsection

@section('js')
<script>
  var actionUrl = '{{ url('transaction') }}';
  var apiUrl = '{{ url('api/transaction') }}';
  
  const column = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'date_star', class: 'text-center', orderable: true},
        {data: 'date_end', class: 'text-center', orderable: true},
        {data: 'namaPeminjam', class: 'text-center', orderable: true},
        {data: 'lamaPeminjam', class: 'text-center', orderable: true},
        {data: 'totalBuku', class: 'text-center', orderable: true},
        {data: 'totalBayar', class: 'text-center', orderable: true},
        {data: 'status', class: 'text-center', orderable: true},
        {data: 'action', class: 'text-center', orderable: true},
      ];

      const transaction = new Vue({
        el: '#transaction',
        data: {
          datas: [],
          data: {},
          actionUrl,
          apiUrl,
          methodPUT: false,
        },

        mounted: function(){
          this.datatable();
        },

        methods: {
          datatable(){
            const _this = this;
            _this.table = $('#datatable').DataTable({
              ajax: {
                url: this.apiUrl,
                type: 'GET',
              },
              columns: column
            }).on('xhr', function(){
              _this.datas = _this.table.ajax.json().data;
            });
          },
        } 
      });
</script>
<script type="text/javascript">
      $('select[name=status]').on('change', function(){
        status = $('select[name=status]').val();

        if (status == 0){
          transaction.table.ajax.url(apiUrl).load();
        } else {
          transaction.table.ajax.url(apiUrl+'?status='+status).load();
        }
      });
      $('select[name=date_star]').on('change', function(){
        date_star = $('select[name=date_star]').val();

        if (date_star == 0){
          transaction.table.ajax.url(apiUrl).load();
        } else {
          transaction.table.ajax.url(apiUrl+'?date_star='+date_star).load();
        }
      });
    </script>
@endsection