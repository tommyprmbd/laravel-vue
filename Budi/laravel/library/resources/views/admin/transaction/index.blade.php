@extends('layouts.admin')
@section('header', 'transaction')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
@role('petugas')
<div id="controller">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8"> <a href="{{ url('transactions/create') }}" class="btn btn-default">
                            Add Transaction</a>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="status">
                                <option value="0">Semua STATUS</option>
                                <option value="sudah">SUDAH</option>
                                <option value="belum">BELUM</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="tanggal">
                                <option value="">Tanggal Pinjam</option>
                                @foreach($dataT as $t)
                                <option value="{{ $t->date_start }}">{{ $t->date_start }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Nama Peminjam</th>
                                <th class="text-center">Lama Pinjam (Hari)</th>
                                <th class="text-center">Total Buku</th>
                                <th class="text-center">Total Bayar</th>
                                <th class="text-center">Status</th>
                                <th class="text-cente">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

               <!-- /.card -->
     <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
            <div class="modal-header">

              <h4 class="modal-title">Transaction Edit</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf

              <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                       
                        <label>Tanggal Start/End</label>
                    <div class="form-group row">
                         <div class="col-sm-4 mr-5">
                             <div class="input-group-prepend">
                                 <input type="date" name="date_start" id="date_start" :value="data.date_start" class="form-control">
                                 <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                             </div>
                         </div>
                         
                         <div class="col-sm-4">
                             <div class="input-group-prepend">
                                 <input type="date" name="date_end" id="date_end" class="form-control" :value="data.date_end">
                                 <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                 </span>
                             </div>
                         </div>
                    </div>

               <div class="from-group">
                <label>Nama Peminjam</label>
                <input type="text" class="form-control" name="email" :value="data.nama_peminjam" required="">
              </div>

               <div class="from-group">
                <label>Lama Meminjam</label>
                <input type="text" class="form-control" name="email" :value="data.lama_minjam" required="">
              </div>

               <div class="from-group">
                <label>Total Buku</label>
                <input type="text" class="form-control" name="email" :value="data.total_buku" required="">
              </div>

               <div class="from-group">
                <label>TOtal Bayar</label>
                <input type="text" class="form-control" name="email" :value="data.total_bayar" required="">
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
          <!-- /.modal-content -->
     </div>
        <!-- /.modal-dialog -->
   </div>
</div>
@endrole
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'date_start', class: 'text-center', orderable: true},
        {data: 'date_end', class: 'text-center', orderable: true},
        {data: 'nama_peminjam', class: 'text-center', orderable: true},
        {data: 'lama_minjam', class: 'text-center', orderable: true},
        {data: 'total_buku', class: 'text-center', orderable: true},
        {data: 'total_bayar', class: 'text-center', orderable: true},
        {data: 'status', class: 'text-center', orderable: true},
        {render: function (index, row, data, meta){
            return `
             <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,
              ${meta.row})">
              Edit
              </a>
              <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event,
              ${data.id})">
              Delete
              </a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{ asset('js/data.js') }}"></script>
<!-- Page specific script -->
<script>
//   $(function () {
//     $("#datatable").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//   });
</script>

<script type="text/javascript">
    $('select[name=status]').on('change', function() {
                status = $('select[name=status]').val();
                if (status == 0) {
                    controller.table.ajax.url(apiUrl).load();
                } else {
                    controller.table.ajax.url(apiUrl + '?status=' + status).load();
                }
            });
</script>
<script type="text/javascript">
    $('select[name=tanggal]').on('change', function() {
                tanggal = $('select[name=tanggal]').val();
                if (tanggal) {
                    controller.table.ajax.url(apiUrl + '?tanggal=' + tanggal).load();
                } else {
                    controller.table.ajax.url(apiUrl).load();
                }
            });
</script>
@endsection