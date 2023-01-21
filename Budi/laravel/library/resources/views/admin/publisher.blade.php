@extends('layouts.admin')
@section('header', 'publisher')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
 <!-- /.row -->
  <div id="controller">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table id="datatable" class="table table-head-fixed text-nowrap table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($publishers as $key => $publisher)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td class="text-center">{{ $publisher->name }}</td>
                      <td class="text-center">{{ $publisher->email }}</td>
                      <td class="text-center">{{ $publisher->phone_number }}</td>
                      <td class="text-center">{{ $publisher->address }}</td>
                      <td class="text-center"><a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-sm">Edit</a>
                      <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- modal popup -->
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off">
            <div class="modal-header">

              <h4 class="modal-title">Publisher</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf

              <input type="hidden" name="_method" value="PUT" v-if="editStatus">

              <div class="from-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" :value="data.name" required="">
              </div>
              <div class="from-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" :value="data.email" required="">
              </div>
              <div class="from-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required="">
              </div>
              <div class="from-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" :value="data.address" required="">
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

<!-- Page specific script -->
<script>
  $(function () {
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>

<!-- crud VueJS -->
<script type="text/javascript">
  var controller = new Vue({
    el: '#controller',
    data: {
        data : {},
        actionUrl : '{{ url('publishers') }}',
        editStatus : false
    },
    mounted: function(){

    },
    methods: {
        addData(){
          this.data = {};
          this.actionUrl = '{{ url('publishers') }}';
          this.editStatus = false;
          $('#modal-default').modal();
        },
        editData(data){
          this.data = data;
          this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
          this.editStatus = true;
          $('#modal-default').modal();
        },
        deleteData(id){
          this.actionUrl = '{{ url('publishers') }}'+'/'+id;
          if (confirm("are you sure ?")) {
              axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                  location.reload();
              });
          }

        }
    }
  });
</script>
@endsection
