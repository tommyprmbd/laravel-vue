@extends('layouts.admin')
@section('header', 'Books')

@section('css')

@endsection
@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <form id="cariBuku" method="get" v-cloak>
                        @csrf

                        <input type="text" v-model="searchString" class="form-control " autocomplete="off"
                            placeholder="search">
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">Add New Book</button>
            </div>
        </div>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <h5 class="mb-2">Info Box</h5>
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-12" v-for="book in filteredList">
                        <div class="info-box" v-on:click="editData(book)">
                            <span class="info-box-icon bg-info">
                                <i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@{{ book.title }} (@{{ book.qty }}) </span>
                                <span class="info-box-number">Rp.@{{ numberWithSpace(book.price) }},- <small></small></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, book.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Add/Edit Books</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label for="exampleInputName">Isbn</label>
                                <input type="text" class="form-control" name="isbn" id="isbn"
                                    :value="book.isbn" placeholder="Enter Isbn" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    :value="book.title" placeholder="Enter Ttile" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">year</label>
                                <input type="text" class="form-control" name="year" id="year"
                                    :value="book.year" placeholder="Enter Year" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">Publisher</label>
                                <select class="form-control select2" style="width: 100%;" name="publisher_id"
                                    id="publisher_id">
                                    @foreach ($publisher as $publisherx)
                                        <option :selceted="book.piblisher_id == {{ $publisherx->id }}"
                                            value="{{ $publisherx->id }}">{{ $publisherx->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">Author</label>
                                <select class="form-control select2" style="width: 100%;" name="author_id" id="author_id">
                                    @foreach ($Author as $Authorx)
                                        <option :selceted="book.piblisher_id == {{ $Authorx->id }}"
                                            value="{{ $Authorx->id }}">
                                            {{ $Authorx->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">Catalog</label>
                                <select class="form-control select2" style="width: 100%;" name="catalog_id" id="catalog_id">
                                    @foreach ($Catalog as $Catalogx)
                                        <option :selceted="book.piblisher_id == {{ $Catalogx->id }}"
                                            value="{{ $Catalogx->id }}">{{ $Catalogx->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">QTY</label>
                                <input type="text" class="form-control" name="qty" id="qty"
                                    :value="book.qty" placeholder="Enter QTY" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoneNumber">Price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                    :value="book.price" placeholder="Enter price" required="">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal" v-if="editStatus"
                                v-on:click="deleteData(book.id)">Delete</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
        var actionUrl = '{{ url('books') }}';
        var apiUrl = '{{ url('api/books') }}';
        var app = new Vue({
            el: '#controller',
            data: {
                books: [], //
                book: {},
                editStatus: false,
                search: '',
                actionUrl,
                apiUrl,
                data: {},
                searchString: "",
            },
            mounted: function() {
                this.get_books()
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
                        error: function(error) {
                            console.log(error);
                        }
                    });
                },
                addData() {
                    this.book = {};
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(book) {
                    this.book = book;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl + '/' + id, {
                        _method: 'DELETE'
                    }).then(response => {
                        alert('data delete');
                    })
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-default').modal('hide');
                        window.location.reload();
                    });
                },
                numberWithSpace(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }

            },
            computed: {
                filteredList() {
                    var search_array = this.books,
                        searchString = this.searchString;

                    if (!searchString) {
                        return this.books.filter(book => {
                            return book.title.toLowerCase().includes(this.search.toLowerCase())
                        })
                    }
                    searchString = searchString.trim().toLowerCase();

                    search_array = search_array.filter(item => {
                        if (item.title.toLowerCase().indexOf(searchString) !== -1) {
                            return item;
                        }
                    })

                    // Return an array with the filtered data.
                    return search_array;
                }
            }
        });
    </script>

    <script type="text/javascript">
        $('select[name=cariBuku]').on('change', function() {
            cariBuku = $('select[name=cariBuku]').val();
            if (cariBuku == 0) {
                controller.table.ajax.url(apiUrl).load();
            } else {
                controller.table.ajax.url(apiUrl + '?cariBuku=' + cariBuku).load();

            }
        });
    </script>

    {{-- datatables --}}

@endsection
