@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/catalogs/create') }}" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>

            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Total Books</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Updated At</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Catalogs as $key => $Catalog)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $Catalog->name }}</td>
                                <td class="text-center">{{ count($Catalog->books) }}</td>
                                <td class="text-center">{{ DateFormat($Catalog->created_at) }}</td>
                                <td class="text-center">{{ DateFormat($Catalog->updatedt_at) }}</td>
                                <td style="display: flex; flex-direction: row; " class="pl-2">
                                    <a href="{{ url('catalogs/' . $Catalog->id . '/edit') }}"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ url('catalogs', ['id' => $Catalog->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-sm" value="delete"
                                            onclick="return confirm('Are you sure')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
