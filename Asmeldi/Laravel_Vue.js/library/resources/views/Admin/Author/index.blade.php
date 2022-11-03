@extends('layouts.admin')
@section('header', 'Author')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/authors/create') }}" class="btn btn-sm btn-primary pull-right">Create New Author</a>

            </div>
            <div class="card-body">
                <table class="table table-bordered">
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
                        @foreach ($Authors as $key => $Author)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $Author->name }}</td>
                                <td>{{ $Author->email }}</td>
                                <td>{{ $Author->phone_number }}</td>
                                <td>{{ $Author->adress }}</td>
                                <td style="display: flex; flex-direction: row; " class="pl-2">
                                    <a href="{{ url('authors/' . $Author->id . '/edit') }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ url('authors', ['id' => $Author->id]) }}" method="post">
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
@endsection
