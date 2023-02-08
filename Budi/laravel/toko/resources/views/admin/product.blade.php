@extends('layouts.admin')
@section('header', 'product')
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div id="controller">
 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-primary pull-right">Create New Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th class="text-center">Category ID</th>
                      <th class="text-center">Product Code</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Brand</th>
                      <th class="text-center">Harga Beli</th>
                      <th class="text-center">Discount</th>
                      <th class="text-center">Harga_jual</th>
                      <th class="text-center">Stock</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
             </div>
            </div>
        </div>
            <!-- /.card -->
     <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
            <div class="modal-header">
              <h4 class="modal-title">Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf

              <input type="hidden" name="_method" value="PUT" v-if="editStatus">

               <div class="from-group">
                <label for="category_id">Category</label>
                <div class="col-sm-6">
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="custom-select" :value="data.category_id" required>
                            	<option value="">Pilih Kategory</option> 
                              @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                             </select>
                        </div>
                </div>
               </div>
               <div class="from-group">
                <label>kode produk</label>
                <input type="number" class="form-control" name="product_kode" :value="data.product_kode" required="">
              </div>
              <div class="from-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" :value="data.name" required="">
              </div>
              <div class="from-group">
                <label>Merek</label>
                <input type="text" class="form-control" name="brand" :value="data.brand" required="">
              </div>
              <div class="from-group">
                <label>Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli" :value="data.harga_beli" required="">
              </div>
              <div class="from-group">
                <label>Discount</label>
                <input type="number" class="form-control" name="discount" :value="data.discount" value="0">
              </div>
              <div class="from-group">
                <label>Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual" :value="data.harga_jual" required>
              </div>
              <div class="from-group">
                <label>Stock</label>
                <input type="number" class="form-control" name="stock" :value="data.stock" required value="0">
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
      <!-- /.modal -->
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">
    var actionUrl = '{{ url('products') }}';
    var apiUrl = '{{ url('api/products') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'category_id', class: 'text-center', orderable: true},
        {data: 'product_kode', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'brand', class: 'text-center', orderable: true},
        {data: 'harga_beli', class: 'text-center', orderable: true},
        {data: 'discount', class: 'text-center', orderable: true},
        {data: 'harga_jual', class: 'text-center', orderable: true},
        {data: 'stock', class: 'text-center', orderable: true},
        {render: function (index, row, data, meta){
            return `
              <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,
              ${meta.row})">
              Edit
              </a>
              <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event,
              ${data.id})">
              Delete
              </a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection