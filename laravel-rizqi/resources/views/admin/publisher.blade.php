@extends('layouts.admin')
@section('title', 'Halaman Publisher')
@section('header', 'Publisher')
    
@section('content')
        <div id="publisher">
        <div class="row">
            <div class="col-12 mb-4">
              <div class="card">
                <div class="card-header">
                  <a href="#" class="btn btn-primary" @click="addData()">Add Publisher</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="datatable1" class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($publisher as $item)
                         <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td class="text-center">
                              <a href="#" class="btn btn-sm btn-warning" @click="editData({{ $item }})">Edit</a>
                              <a href="#" class="btn btn-sm btn-danger" @click="deleteData({{ $item->id }})">Delete</a>
                            </td>
                         </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form :action="actionurl" method="post">
                  @csrf
                  
                <input type="hidden" name="_method" value="PUT" v-if="methodPUT">
                  <div class="modal-header">
                      <h4 class="modal-title">Add New Publisher</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                        <div class="modal-body">
                          <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Name</label>
                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                              <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name Author" :value="data.nama" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" :value="data.email" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" :value="data.phone" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                </div>
                              <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" :value="data.address" required>
                            </div>
                          </div>
                        </div> 
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    var publisher = new Vue({
        el : '#publisher',
        data : {
            data: {},
            actionurl : '{{ url('publisher') }}',
            methodPUT : false,

        },

        mounted: function(){

        },

        methods: {
            addData(){
                this.data = {};
                this.actionurl = '{{ url('publisher') }}';
                this.methodPUT = false;
                $('#modal-lg').modal();
            },

            editData(editPublisher){
                this.data = editPublisher;
                this.actionurl = '{{ url('publisher') }}' + '/' + editPublisher.id;
                this.methodPUT = true;
                $('#modal-lg').modal();
            },

            deleteData(id){
                this.actionurl = '{{ url('publisher') }}' + '/' + id;
                if(confirm('Are You Sure Delete This Data?')){
                    axios.post(this.actionurl, {_method : 'delete'}).then(respon => {
                        location.reload();
                    });
                }
            }
        }

    })
</script>

<script>
  $(function () {
    $("#datatable1").DataTable({
    })
  });
</script>
@endsection