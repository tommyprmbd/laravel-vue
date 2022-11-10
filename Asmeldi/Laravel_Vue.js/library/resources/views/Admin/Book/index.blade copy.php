@extends('layouts.admin')
@section('header', 'Books')

@section('css')

@endsection
@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="search">
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Add New Book</button>
            </div>
        </div>
        <hr>

    </div>
    <section class="content">
        <div class="container-fluid">
            <h5 class="mb-2">Info Box</h5>
            <div class="row">

                <div class="col-md-3 col-sm-6 col-12" v-for="book in books">
                    <div class="info-box">
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
@endsection

@section('js')
    <script type="text/javascript">
        var actionUrl = '{{ url('books') }}';
        var apiUrl = '{{ url('api/books') }}';
        var app = new Vue({
            el: '#controller',
            data: {
                books: [], //
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
                            // console.log(_this.books, 'data books');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                },
                numberWithSpace() {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                }

            },
            computed: {
                filteredList() {
                    return this.books.filter(book => {
                        return book.title.toLowerCase().include(this.searchtoLowerCase())
                    })
                }
            }
        });
    </script>
    {{-- datatables --}}

@endsection
