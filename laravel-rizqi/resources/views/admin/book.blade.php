@extends('layouts.admin')
@section('title', 'Halaman Book')

@section('content')
    <div id="book">
        <div class="row mb-5">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search From Title" v-model="cari">
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">Add New Book</button>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-4">
            <div style="cursor: pointer;" class="col mb-4" v-for="book in filterCari" >
              <div class="card" v-on:click="editBook(book)">
                <div class="card-body">
                  <span class="card-text">@{{ book.title }} (@{{ book.qty }})</span>
                  <p class="card-text">Rp. @{{ Number(book.price) }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- modal --}}
          <div class="modal fade" id="modalBook">
            <div class="modal-dialog modalBook">
              <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off">
                                                        {{-- @submit untuk membuat tanpa reload --}}
                    @csrf
    
                    <input type="hidden" name="_method" value="PUT" v-if="methodPUT">
                    <div class="modal-header">
                        <h4 class="modal-title" v-if="title">Add New Author</h4>
                        <h4 class="modal-title" v-if="titleUpdate">Update Author</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="isbn" class="col-sm-2 col-form-label">Isbn</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter Isbn" :value="book.isbn" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="title" class="col-sm-2 col-form-label">Title</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-book"></i></span>
                                  </div>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" :value="book.title" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="year" class="col-sm-2 col-form-label">Year</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                <input type="text" class="form-control" id="year" name="year" :value="book.year" placeholder="Enter Year" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-circle"></i></span>
                                  </div>
                                  <select class="form-control" name="publisher_id" id="publisher_id">
                                    <option value="">-- Pilih Publisher -</option>
                                      @foreach ($publisher as $item)
                                        <option :selected="book.publisher_id == {{ $item->id }}" value="{{ $item->id }}">{{ $item->nama }}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="author_id" class="col-sm-2 col-form-label">Author</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                  </div>
                                  <select class="form-control" name="author_id" id="author_id">
                                    <option value="">-- Pilih Author -</option>
                                      @foreach ($author as $item)
                                        <option :selected="book.author_id == {{ $item->id }}" value="{{ $item->id }}">{{ $item->nama }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="catalog_id" class="col-sm-2 col-form-label">Catalog</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-copy"></i></span>
                                  </div>
                                  <select class="form-control" name="catalog_id" id="catalog_id">
                                    <option value="">-- Pilih Catalog -</option>
                                      @foreach ($catalog as $item)
                                        <option :selected="book.catalog_id == {{ $item->id }}" value="{{ $item->id }}">{{ $item->nama }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="qty" class="col-sm-2 col-form-label">Stok</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                  </div>
                                <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Stok" :value="book.qty" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="price" class="col-sm-2 col-form-label">Price</label>
                              <div class="input-group col-sm-10">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                  </div>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" :value="book.price" required>
                              </div>
                            </div>
                          </div> 
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" v-if="methodPUT" v-on:click="deleteData(book.id)">Delete</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                      </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        const actionUrl = '{{ url('book') }}';
        const apiUrl = '{{ url('api/book') }}'

        const app = new Vue({
            el: '#book',
            data: {
                books: [],
                cari: '',
                book: {},
                methodPUT: false,
                title: true,
                titleUpdate: false,
                actionUrl,
                apiUrl,
            },
            mounted: function(){
                this.getBook();
            },
            methods: {
                getBook(){
                    const _this = this;
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        success: function(data){
                            _this.books = JSON.parse(data);
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                },
                 Number(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    // mengubah format number di javascript
                },
                addData(){
                    // this.data = {};
                    // this.methodPUT = false;
                    this.book = {};
                    this.methodPUT = false;
                    this.title = true;
                    this.titleUpdate = false;
                    this.actionUrl = '{{ url('book') }}';
                    $('#modalBook').modal();
                  },
                  editBook(book){
                    this.book = book;
                    this.methodPUT = true;
                    this.title = false;
                    this.titleUpdate = true;
                    this.actionUrl = '{{ url('book') }}' + '/' + book.id;
                    $('#modalBook').modal();
                },
                deleteData(id){
                  this.actionurl = '{{ url('book') }}' + '/' + id;
                  if(confirm('Are You Sure Delete This Data?')){
                      axios.post(this.actionurl, {_method : 'DELETE'}).then(respon => {
                          location.reload();
                      });
                }
                },
            },
            computed: {
                filterCari(){
                    return this.books.filter(book =>{
                        return book.title.toLowerCase().includes(this.cari.toLowerCase())
                    })
                },
            },
        })
    </script>


@endsection