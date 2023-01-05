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
                        <th>Created_at</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form :action="actionUrl" method="post" @submit="submitForm($event, data.id)">
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
@endsection

@section('js')
<script type="text/javascript">
      const actionUrl = '{{ url('publisher') }}';
      const apiUrl = '{{ url('api/publisher') }}';

      const column = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'nama', class: 'text-center', orderable: true},
        {data: 'email', class: 'text-center', orderable: true},
        {data: 'phone', class: 'text-center', orderable: true},
        {data: 'address', class: 'text-center', orderable: true},
        {data: 'tanggalBuat', class: 'text-center', orderable: true},
        {render: function(index, row, data, meta){
          return `
            <a href="#" class="btn btn-sm btn-warning" onclick="modal.editData(event, ${meta.row})">Edit</a>
            <a class="btn btn-sm btn-danger" onclick="modal.deleteData(event, ${data.id})">Delete</a>
          `;
        }, orderable: false, class: 'text-center'},
        
      ];

      const modal = new Vue({
        el: '#publisher',
        data: {
          datas: [],
          data: {},
          actionUrl,
          apiUrl,
          methodPUT: false,
        },

        mounted: function(){
          this.datatable();
        },

        methods: {
          datatable(){
            const _this = this;
            _this.table = $('#datatable1').DataTable({
              ajax: {
                url: this.apiUrl,
                type: 'GET',
              },
              columns: column
            }).on('xhr', function(){
              _this.datas = _this.table.ajax.json().data;
            });
          },
          addData(){
                this.data = {};
                this.methodPUT = false;
                $('#modal-lg').modal();
            },

            editData(event, row){
                this.data = this.datas[row];
                this.methodPUT = true;
                $('#modal-lg').modal();
            },

            deleteData(event, id){
                if(confirm('Are You Sure Delete This Data?')){
                  $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl + '/' +id, {_method : 'delete'}).then(respon => {
                      alert('data terhapus');
                    });
                }
            },
            submitForm(event, id){
            event.preventDefault();
            const _this = this;
            const actionUrl = ! this.methodPUT ? this.actionUrl : this.actionUrl + '/' + id;
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                $('#modal-lg').modal("hide");
                _this.table.ajax.reload();
            });
          },
        }
      });
</script>


{{-- <script type="text/javascript">
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
</script> --}}
@endsection