@extends('layouts.admin')
@section('title', 'Halaman Member')

@section('css')
    
@endsection

@section('content')
<div id="member">
    <div class="row">
    <div class="col-12 mb-4">
    <div class="card">
        <div class="card-header">
            <a href="#" @click="addData()" class="btn btn-primary">Add Member</a>
        </div>
        <div class="card-body">
            <table id="tablemember" class="table table-sm table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
        </div>
      </div>
    </div>
    </div>

{{-- modal --}}
<div class="modal fade" id="modalMember" tabindex="-1" aria-labelledby="ModalMemberLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form :action="actionUrl" method="post" @submit="submitForm($event, data.id)" >
          @csrf
            <div class="modal-header">
                <h4 class="modal-title">Add New Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
               <div class="modal-body">
                  <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Name</label>
                      <div class="input-group col-sm-10">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name" :value="data.nama" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                      <div class="input-group col-sm-10">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-users"></i></span>
                          </div>
                        <input type="gender" class="form-control" id="gender" name="gender" placeholder="Enter Gender" :value="data.gender" required>
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
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="input-group col-sm-10">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" :value="data.email" required>
                        </div>
                      </div>
                  </div> 
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
        </form>
      </div>
    </div>
  </div>
  
</div>
@endsection


@section('js')
<script type="text/javascript">
      const actionUrl = '{{ url('member') }}';
      const apiUrl = '{{ url('api/member') }}';

      const column = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'nama', class: 'text-center', orderable: true},
        {data: 'gender', class: 'text-center', orderable: true},
        {data: 'phone', class: 'text-center', orderable: true},
        {data: 'address', class: 'text-center', orderable: true},
        {data: 'email', class: 'text-center', orderable: true},
        {render: function(index, row, data, meta){
          return `
            <a href="#" class="btn btn-sm btn-warning" onclick="member.editData(event, ${meta.row})">Edit</a>
            <a class="btn btn-sm btn-danger" onclick="member.deleteData(event, ${data.id})">Delete</a>
          `;
        }, orderable: false, class: 'text-center'},
        
      ];

      const member = new Vue({
        el: '#member',
        data: {
          datas: [],
          data: {},
          actionUrl,
          apiUrl,
          editStatus: false,
        },

        mounted: function(){
          this.datatable();
        },

        methods: {
          datatable(){
            const _this = this;
            _this.table = $('#tablemember').DataTable({
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
            this.editStatus = false;
            $('#modalMember').modal();
          },
          editData(event, row){
            this.data = this.datas[row];
            this.editStatus = true;
            $('#modalMember').modal();
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
            const actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                $('#modalMember').modal("hide");
                _this.table.ajax.reload();
            });
          },
          // submitForm digunakan untuk membuat tanpa reload. caranya = membuat method submitForm -> memberi parameter di method editData(event, raw) dan deleteData(event, id). untuk delete data ada perubahan dan penambahan $(event.target).parents('tr').remove();
        }
      });
</script>


    {{-- <script>
      $(function () {
        $("#datatable").DataTable({
        })
      });
    </script> 

    <script type="text/javascript">
      const member = new Vue({
        el: '#member',
        data: {
          data: {},
          actionUrl: '{{ url('member') }}',
          editStatus: false,
        },

        mounted: function() {

        },

        methods: {
          addData(){
            this.data = {};
            this.editStatus = false;
            this.actionUrl = '{{ url('member')}}';
            $('#modalMember').modal();
          },
          editData(data){
            this.data = data;
            this.editStatus = true;
            this.actionUrl = '{{ url('member')}}' + '/' + data.id;
            $('#modalMember').modal();
          },
          deleteData(id){
                this.actionurl = '{{ url('member') }}' + '/' + id;
                if(confirm('Are You Sure Delete This Data?')){
                    axios.post(this.actionurl, {_method : 'DELETE'}).then(respon => {
                        location.reload();
                    });
                }
            },
        },
      });
    </script> --}}
@endsection