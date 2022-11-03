@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')

@endsection


@section('content')
    <div class="" id="controller">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{ url('/publishers/create') }}" class="btn btn-sm btn-primary pull-right">Create New
                        Publisher</a> --}}
                    <a href="#" @click="addData()" class="btn btn-default">
                        Add Publisher
                    </a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Adress</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $key => $publisher)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td>{{ $publisher->email }}</td>
                                    <td>{{ $publisher->phone_number }}</td>
                                    <td>{{ $publisher->adress }}</td>
                                    <td style="display: flex; flex-direction: row; " class="pl-2">
                                        {{-- <a href="{{ url('publishers/' . $publisher->id . '/edit') }}"
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a> --}}
                                        {{-- <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger btn-sm" value="delete"
                                                onclick="return confirm('Are you sure')">
                                        </form> --}}

                                        <a href="#" @click="editData({{ $publisher }})" class="btn btn-default">
                                            Edit
                                        </a>
                                        <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-default">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- this is modal  data author --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Add/Edit Publisher</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    :value="data.name" placeholder="Enter email" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    :value="data.email" placeholder="Enter email" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                    :value="data.phone_number" placeholder="Enter Phone Number" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">Adress</label>
                                <input type="text" class="form-control" name="adress" id="adress"
                                    :value="data.adress" placeholder="Enter Adress" required="">
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
        {{-- end modal --}}
    </div>
@endsection



@section('js')
    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('publishers') }}',
                editStatus: false,
            },
            methods: {
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('publishers') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('publishers') }}' + '/' + data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();

                },
                deleteData(id) {
                    this.actionUrl = '{{ url('publishers') }}' + '/' + id;
                    if (confirm("Are you sure")) {
                        axios.post(this.actionUrl, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        })
                    }
                },
            }
        });
    </script>

    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    {{-- datatables --}}
    <script type="text/javascript">
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
