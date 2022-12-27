@extends('layouts.admin')
@section('title', 'Halaman Author')

@section('css')
    
@endsection

@section('content')
    <div id="modal">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header">
              <a href="#" @click="addData()" class="btn btn-primary" >Add Author</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatable" class="table table-sm table-bordered table-striped">
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
                {{-- <tbody>
                 @foreach ($author as $item)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td class="text-center">
                          <a href="#" class="btn btn-sm btn-warning" @click="editData({{ $item }})">Edit</a>
                          <a href="#" class="btn btn-sm btn-danger" @click="deleteData({{ $item->id }})">Hapus</a>
                        </td>
                     </tr>
                 @endforeach
                </tbody> --}}
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
                                                    {{-- @submit untuk membuat tanpa reload --}}
                @csrf

                <input type="hidden" name="_method" value="PUT" v-if="methodPUT">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Author</h4>
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
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
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
      const actionUrl = '{{ url('author') }}';
      const apiUrl = '{{ url('api/author') }}';

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
        el: '#modal',
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
            _this.table = $('#datatable').DataTable({
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
            if(confirm("Are You Sure?")) {
              $(event.target).parents('tr').remove();
              axios.post(this.actionUrl+ '/' +id, {_method : 'delete'}).then(response => {
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
          // submitForm digunakan untuk membuat tanpa reload. caranya = membuat method submitForm -> memberi parameter di method editData(event, raw) dan deleteData(event, id). untuk delete data ada perubahan dan penambahan $(event.target).parents('tr').remove();
        } 
      });
    </script>

    {{-- <script type="text/javascript">
      var modal = new Vue({
        el : '#modal',
        data : {
          data : {},
          actionUrl : '{{ url('author') }}',
          methodPUT : false,

        },
        mounted: function(){

        },

        methods: {
          addData(){
            this.data = {};
            this.actionUrl = '{{ url('author') }}';
            this.methodPUT = false;
            $('#modal-lg').modal();
          },
          editData(editAuthor){
            this.data = editAuthor;
            this.actionUrl = '{{ url('author') }}' + '/' + editAuthor.id;
            this.methodPUT = true;
            $('#modal-lg').modal();
          },
          deleteData(id){
            this.actionUrl = '{{ url('author') }}' + '/' +id;
            if(confirm("Are You Sure?")) {
              axios.post(this.actionUrl, {_method : 'delete'}).then(response => {
                location.reload();
              });
            }
          }
        }
      });
    </script>

<script>
  $(function () {
    $("#datatable").DataTable({
    })
  });
</script> --}}
@endsection