@extends('layouts.admin')
@if (url('transanction/create'))
    @section('header', 'Add Peminjaman')
@else
    @section('header', 'Edit Peminjaman')
@endif

@section('css')

@endsection
@section('content')
    @role('petugas')
        <section class="content">
            {{-- this is modal  data author --}}
            <div class="" id="controller">
                <div class="modal-dialog" id="modal-default">
                    <div class="modal-content">

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Form Add / Edit Transaction</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" :action="actionUrl" autocomplete="off" method="post"
                                @submit="submitForm($event, data.id)">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">


                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Anggota</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <select class="custom-select form-control-border" name="member_id"
                                                    id="member_id">
                                                    <option>Value 1</option>
                                                    <option>Value 2</option>
                                                    <option>Value 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                                        <div class="col-sm-4">
                                            <div class="input-group-prepend">
                                                <input type="date" name="date_start" id="date_start" class="form-control">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group-prepend">
                                                <input type="date" name="date_end" id="date_end" class="form-control">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Buku </label>
                                        <div class="col-sm-9">
                                            <div class="select2-purple">
                                                <select class="select2" multiple="multiple" name="buku[]" id="buku[]"
                                                    data-placeholder="Select a State" data-dropdown-css-class="select2-purple"
                                                    style="width: 100%;">
                                                    <option value="1">Alabama</option>
                                                    <option value="2">Alaska</option>
                                                    <option value="3">California</option>
                                                    <option value="4"> Delaware</option>
                                                    <option value="5">Tennessee</option>
                                                    <option value="6">Texas</option>
                                                    <option value="7">Washington</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" v-if="editStatus">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <div class="form-group clearfix" style="position: relative; top: 10px;">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" name="status" id="c1" value="1">
                                                    <label for="c1">
                                                    </label>
                                                </div>

                                                <div class="icheck-danger d-inline">
                                                    <label for="checkboxDanger3">
                                                        Sudah dikembalikan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix" style="position: relative; top: 10px;">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" name="status" id="c2" value="0">
                                                    <label for="c2">
                                                    </label>
                                                </div>

                                                <div class="icheck-danger d-inline">
                                                    <label for="checkboxDanger3">
                                                        Belum dikembalikan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right">Save</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            {{-- end modal --}}
        </section>
    @endrole
@endsection
@section('js')
    <script type="text/javascript">
        var actionUrl = '{{ url('transanction') }}';
        var TF = '{{ $data['editStatus'] }}';
        var Edit = "";
        var getId = '{{ $data['id'] }}';
        var apiUrl = '{{ url('api/transanction') }}/' + getId;

        if (TF == 'true') {
            Edit = true;
        } else {
            Edit = false;
        }
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {}, // untuk bagian crud
                actionUrl, //
                editStatus: Edit,
                id: getId,
            },
            methods: {

                addData() {
                    console.log('test');
                    this.data = {};
                    this.actionUrl = '{{ url('transanction') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                submitForm(event, id) {

                    console.log(_this);
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {});

                }
            }
        });
    </script>



    <script type="text/javascript">
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })


            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        });
    </script>
@endsection
