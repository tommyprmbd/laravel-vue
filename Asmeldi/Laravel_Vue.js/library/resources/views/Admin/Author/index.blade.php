@extends('layouts.admin')
@section('header', 'Author')

@section('css')

@endsection
@section('content')
    <div id="controller" class="col-md-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-default">
                        Add Author
                    </a>
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
                                <th class="text-right">Action</th>
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
                                    <td class="text-right">
                                        <a href="#" @click="editData({{ $Author }})"
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <a href="#" @click="deleteData({{ $Author->id }})"
                                            class="btn btn-sm btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>


        {{-- this is modal  data author --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Add/Edit Author</h4>
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
                actionUrl: '{{ url('authors') }}',
                editStatus: false,
            },
            methods: {
                addData(data) {
                    this.data = {};
                    this.actionUrl = '{{ url('authors') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('authors') }}' + '/' + data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('authors') }}' + '/' + id;
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
@endsection
