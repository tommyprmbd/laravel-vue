<x-app-layout>
  @section('css')

  @endsection

	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publisher') }}
        </h2>
    </x-slot>

    <div id="controller">
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="card">
                    <div class="card-header">
                  <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Total Books</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($publishers as $key => $publisher)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->email }}</td>
                        <td>{{ $publisher->phone_number }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td class="text-center">{{ count($publisher->books) }}</td>
                        <td class="text-center">
                          <a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-sm">Edit</a>
                          <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div> -->
              </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" :action="actionUrl" autocomplete="off">
            <div class="modal-header">
              <h4 class="modal-title">Publisher</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf

              <input type="hidden" name="_method" value="PUT" v-if="editStatus">

              <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" :value="data.name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" :value="data.email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter phone number" :value="data.phone_number">
                    @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address" :value="data.address">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
    </div>

    @section('js')
      <script type="text/javascript">
        var controller = new Vue({
          el: '#controller',
          data: {
            data : {},
            actionUrl : "{{ url('publishers') }}",
            editStatus : false
          },
          mounted: function (){

          },
          methods: {
            addData(){
              this.data = {};
              this.actionUrl = "{{ url('publishers') }}";
              this.editStatus = false;
              $('#modal-default').modal();
            },
            editData(data){
              this.data = data;
              this.actionUrl = "{{ url('publishers') }}"+'/'+ data.id;
              this.editStatus = true;
              $('#modal-default').modal();
            },
            deleteData(id){
              this.actionUrl = "{{ url('publishers') }}"+'/'+ id;
              if (confirm("Are you sure ?")){
                axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                  location.reload();
                });
              }
            }
          }
        });
      </script>
    @endsection
</x-app-layout>