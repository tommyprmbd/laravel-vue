@extends('layouts.admin')
@section('header', 'book')

@section('content')
<div id="controller">
	<!-- untuk menu search -->
	<div class="row">
		<div class="col-md-5 offset-md-3">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-search"></i></span>
				</div>
				<input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">	
			</div>
		</div>
	<div class="col-md-2">
		<button class="btn btn-primary" v-on:click="addData()">Create New Book</button>		
	</div>
</div>

<hr>

<!-- box info -->
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredList">
		<div class="info-box" v-on:click="editData(book)">
			<div class="info-box-content">
			  <span class="info-box-text h3">@{{ book.title }} ( @{{ book.qty }} )</span>
			  <span class="info-box-number">Rp.@{{ numberWithSpaces(book.price) }},-<small></small></span>				
			</div>
		</div>
	</div>
</div>

<!-- untuk modal -->
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off">
            <div class="modal-header">

              <h4 class="modal-title">Book</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf

              <input type="hidden" name="_method" value="PUT" v-if="editStatus">

              <div class="from-group">
                <label>ISBN</label>
                <input type="number" class="form-control" name="isbn" :value="book.isbn" required="">
              </div>

              <div class="from-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" :value="book.title" required="">
              </div>

              <div class="from-group">
                <label>Tahun</label>
                <input type="number" class="form-control" name="year" :value="book.year" required="">
              </div>

              <div class="from-group">
                <label>Publisher</label>
                <select name="publisher_id" class="form-control">
                	@foreach($publishers as $publisher)
                	<option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                	@endforeach
                </select>
              </div>

              <div class="from-group">
                <label>Author</label>
                <select name="author_id" class="form-control">
                	@foreach($authors as $author)
                	<option value="{{ $author->id }}">{{ $author->name }}</option>
                	@endforeach
                </select>
              </div>

              <div class="from-group">
                <label>Catalog</label>
                <select name="catalog_id" class="form-control">
                	@foreach($catalogs as $catalog)
                	<option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                	@endforeach
                </select>
              </div>

              <div class="from-group">
                <label>Qty Stock</label>
                <input type="number" class="form-control" name="qty" :value="book.qty" required="">
              </div>

              <div class="from-group">
                <label>Harga Pinjam</label>
                <input type="number" class="form-control" name="price" :value="book.price" required="">
              </div>

            </div>
            <div class="modal-footer justify-content-between">
            	<!-- @click="deleteData({{ $publisher->id }})" -->
            	<!-- v-on:click="deleteData(book.id)" -->
              <button type="button" class="btn btn-default bg-danger" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

          </form>
        </div>
      </div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	var actionUrl = '{{ url('books')}}';
	var apiUrl = '{{ url('api/books') }}';

		var controller = new Vue({
			el: '#controller',
			data: {
				books: [],
				search: '',
				book: {},
				actionUrl,
				apiUrl,
				editStatus: false,
			},
			mounted: function () {
			  this.get_books();
			},
			methods: {
				get_books() {
					const _this = this;
					$.ajax({
						url: apiUrl,
						method: 'GET',
						success: function(data) {
							_this.books = JSON.parse(data);
						},
						error: function (error) {
							console.log(error);
						}
					});
				},

				// datatable() {
    //           		const _this = this;
    //            		_this.table = $('#datatable').DataTable({
    //             	ajax: {
    //                 url: _this.apiUrl,
    //                 type: 'GET',
    //             	},
    //             	columns
    //         		}).on('xhr', function() {
    //           		_this.datas = _this.table.ajax.json().data;
    //         		});
    //     		},

				addData() {
					
					this.book = {};
					this.actionUrl = '{{ url('books') }}';
					this.editStatus = false;
					$('#modal-default').modal();
				},
				editData(book) {
					
					this.book = book;
					this.actionUrl = '{{ url('books') }}'+'/'+book.id;
					this.editStatus = true;
					$('#modal-default').modal();
				},
				deleteData(id){
      
          this.actionUrl = '{{ url('books') }}'+'/'+id;
          if (confirm("are you sure ?")) {
          axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
              location.reload();
            });
        	}
        },
				numberWithSpaces(x) {
   					 return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				}
				},
			// FILTER DATA BUKU
			computed: {
				filteredList() {
					return this.books.filter(book => {
						return book.title.toLowerCase().includes(this.search.toLowerCase())
					})
				}
			}
		})
</script>
@endsection