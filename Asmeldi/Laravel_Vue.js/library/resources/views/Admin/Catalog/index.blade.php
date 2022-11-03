@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/catalogs/create') }}" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>

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
                            <th class="col-2">Action</th>
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
