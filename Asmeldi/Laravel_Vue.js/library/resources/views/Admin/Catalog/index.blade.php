@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Catalog </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Total Books</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Catalogs as $key => $Catalog)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $Catalog->name }}</td>
                                <td class="text-center">{{ count($Catalog->books) }}</td>
                                <td class="text-center">{{ date('H:i:s  d/m/Y', strtotime($Catalog->created_at)) }}</td>
                                <td class="text-center">{{ date('H:i:s  d/m/Y', strtotime($Catalog->updated_at)) }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div> --}}
        </div>



    </div>
@endsection
