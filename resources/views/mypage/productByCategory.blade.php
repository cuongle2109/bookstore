@extends('layouts.vertical')
@section('title', 'Home')
@section('content')
    <div class="block-product-category">
        <img src="/storage/images/banner-gifl.jpg" class="img img-fluid mb-3" alt="#" width="100%">
        <div class="container">
            <div class="row">
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
                        <a href="" class="load-more btn btn-outline-primary">Xem thêm</a>
                    </div>
                </div>
                <div class="col-3">
                    @if(count($productTops) > 0)
                        <div class="box-shadow mb-3">
                            @foreach($productTops as $key => $product)
                                <a href="{{ route('mypage.product-detail.show',$product['id']) }}"
                                   class="text-decoration-none text-dark">
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <img src="/storage/files/{{ $product['photos'][0] }}" class="img img-fluid"
                                                 width="100%">
                                        </div>
                                        <div class="col-8">
                                            <div class="box-product__content">
                                                <h3 class="box-product__content__title">{{ $product['name'] }}</h3>
                                                <p class="text-danger mb-0">{{ number_format($product['price'] * ((100 - $product['discount'])/100)) }}
                                                    <sup>đ</sup></p>
                                                <p class="box-product__content__author">{{ $product['author'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
<script type="text/javascript">

</script>
