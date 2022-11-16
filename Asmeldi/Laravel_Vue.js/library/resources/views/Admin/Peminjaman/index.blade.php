@extends('layouts.admin')
@section('header', 'Peminjaman')

@section('content')
    <div class="" id="controller">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8"> <a href="#" @click="addData()" class="btn btn-default">
                                Add Transaction
                            </a>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="active">
                                <option value="">Status</option>
                                <option value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="tanggals">

                                <option value="">Tanngal Pinjam</option>
                                @foreach ($trans as $t)
                                    <option value="{{ $t->date_start }}">{{ $t->date_start }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Nama Peminjam</th>
                                <th class="text-center">Lama Pinjam(Hari)</th>
                                <th class="text-center">Total Buku</th>
                                <th class="text-center">Total Bayar</th>
                                <th class="text-center">Status</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


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
        var actionUrl = '{{ url('transanction') }}';
        var apiUrl = '{{ url('api/transanction') }}';


        var columns = [{
                data: 'id',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'date_start',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'date_end',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'nama_peminjam',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'lama_peminjam',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'total_buku',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'total_bayar',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'status',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }
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
                    window.location.href = "{{ url('transanction') }}" + '/create';

                }

            },
        });
    </script>

    <script type="text/javascript">
        $('select[name=active]').on('change', function() {
            active = $('select[name=active]').val();
            if (active == 0) {
                controller.table.ajax.url(apiUrl + '?active=' + active).load();
            } else if (active == 1) {
                controller.table.ajax.url(apiUrl + '?active=' + active).load();
            } else {
                controller.table.ajax.url(apiUrl).load();

            }
        });
        $('select[name=tanggals]').on('change', function() {
            tanggals = $('select[name=tanggals]').val();
            if (tanggals) {
                controller.table.ajax.url(apiUrl + '?tanggals=' + tanggals).load();
            } else {
                controller.table.ajax.url(apiUrl).load();

            }
        });
    </script>
@endsection
