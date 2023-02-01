@extends('layouts.admin')
@section('header', 'transaction')

@section('content')
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transactions') }}" method="post">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Anggota</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="custom-select">
                              @foreach ($members as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                              @endforeach
                             </select>
                        </div>
                     </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Start/End</label>
                         <div class="col-sm-4">
                             <div class="input-group-prepend">
                                 <input type="date" name="date_start" id="date_start" value="" class="form-control">
                                 <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                             </div>
                         </div>
                         <div class="col-sm-4">
                             <div class="input-group-prepend">
                                 <input type="date" name="date_end" id="date_end" class="form-control" value="">
                                 <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                 </span>
                             </div>
                         </div>
                    </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Buku </label>
                        <div class="col-sm-9">
                          <div class="select2-blue">
                          <select class="select2" multiple="multiple" data-placeholder="Select Books" data-dropdown-css-class="select2-blue"style="width: 100%;">
                                @foreach ($books as $tb)
                          <option value="{{ $tb->id }}">{{ $tb->title }}</option>
                                @endforeach
                         </select>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
            <!-- /.card -->
@endsection

@section('js')
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