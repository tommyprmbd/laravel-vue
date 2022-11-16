@extends('layouts.admin')
@section('header', 'Member')

@section('content')
    <div class="" id="controller">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10"> <a href="#" @click="addData()" class="btn btn-default">
                                Add Publisher
                            </a>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="gender">
                                <option value="0">Semua Jenis Kelamin</option>
                                <option value="l">Laki-Laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Adress</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Created at</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- this is modal  data author --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Add/Edit Members</h4>
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
                                <label for="exampleInputName">Gender</label>
                                <input type="text" class="form-control" name="gender" id="gender"
                                    :value="data.gender" placeholder="Enter Gender" required="">
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
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    :value="data.email" placeholder="Enter email" required="">
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


    <script type="text/javascript">
        var actionUrl = '{{ url('members') }}';
        var apiUrl = '{{ url('api/members') }}';

        var columns = [

            {
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'name',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'gender',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'phone_number',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'adress',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'email',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'tanggal_buat',
                class: 'text-center',
                orderable: true
            },
            {
                render: function(index, row, data, meta) {
                    return `
                            <a href="#" onclick="controller.editData(event, ${meta.row})"
                                class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <a href="#" onclick="controller.deleteData(event,${data.id})"
                                class="btn btn-sm btn-danger">
                                Delete
                            </a>`;
                },
                orderable: false,
                width: '210px',
                class: 'text-center'
            },
        ];

        var controller = new Vue({
            el: '#controller',
            data: {
                datas: [], // menampung semua data author
                data: {}, // untuk bagian crud
                actionUrl, //
                apiUrl,
                editStatus: false, //
            },
            mounted: function() {
                this.datatables();
            },
            methods: {
                datatables() {
                    const _this = this;
                    _this.table = $('#example1').DataTable({
                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET',
                        },
                        columns: columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });

                },
                addData(data) {
                    this.data = {};
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(event, id) {
                    if (confirm("Are you sure")) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            alert('data delete');
                        })
                    }
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-default').modal('hide');
                        _this.table.ajax.reload();
                    });
                }
            },
        });
    </script>
    <script type="text/javascript">
        $('select[name=gender]').on('change', function() {
            gender = $('select[name=gender]').val();
            if (gender == 0) {
                controller.table.ajax.url(apiUrl).load();
            } else {
                controller.table.ajax.url(apiUrl + '?gender=' + gender).load();

            }
        });
    </script>
@endsection
