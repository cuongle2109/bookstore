@extends('layouts.vertical')
@section('title', 'Home')
@section('content')
    <div class="block-product-category">
        <img src="/storage/images/banner-gifl.jpg" class="img img-fluid mb-3" alt="#" width="100%">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <form action="" method="GET">
                        @csrf
                        <div class="block-sidebar box-shadow mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">Search</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <input type="text" class="form-control mb-3" id="name" name="name" placeholder="By book title" value="{{ $_GET['name'] }}">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="According to the specification description" value="{{ $_GET['description'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">Category</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        @foreach($categories as $category)
                                            <div class="form-check">
                                                <input class="form-check-input categoryChecked" type="checkbox" value="{{ $category['id'] }}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">{{ $category['name'] }}</label>
                                            </div>
                                        @endforeach
                                            <input type="hidden" name="category" value="{{ $_GET['category'] }}">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-outline-primary" value="Find">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-9">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-3 item-load-more">
                                <div class="box-product">
                                    <a href="{{ route('mypage.product-detail.show',$product['id']) }}">
                                        <div class="box-product__image">
                                            <img src="/storage/files/{{ $product['photos'][0] }}"
                                                 alt="">
                                        </div>
                                        <div class="box-product__content">
                                            <h3 class="box-product__content__title">{{ $product['name'] }}</h3>
                                            <p class="box-product__content__author">{{ $product['author'] }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="" class="load-more btn btn-outline-primary">Load More</a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
<script type="text/javascript">

</script>
