@extends('layouts.vertical')
@section('title', 'Home')
@section('content')
    <div class="block-home">
        <div>
            <img src="/storage/images/banner-gifl.jpg" class="img img-fluid mb-3" alt="#" width="100%">
            <a href="">
                <img src="/storage/images/banner1.jpg" class="img img-fluid" alt="#" width="100%">
            </a>
        </div>
        <div class="container">

            @include('components.slide-brandname')
            @include('components.slide-now-trending')
            @include('components.slide-quote')
            @include('components.modal-cart-success')

            @foreach($categories as $category)
                <div class="block-product-by-category">
                    <h1 class="block-product-by-category__title">{{ $category->name }}</h1>
                    <div class="row">
                        <div class="col-4">
                            @foreach($category->product as $key => $product)
                                @if($key === 0)
                                    <div class="box-product box-product--large">
                                        <a href="{{ route('mypage.product-detail.show',$product['id']) }}">
                                            <div class="box-product__image">
                                                <img src="/storage/files/{{ $product['photos'][0] }}" alt="">
                                            </div>
                                            <div class="box-product__content">
                                                <h3 class="box-product__content__title">{{ $product['name'] }}</h3>
                                                <p class="box-product__content__author">{{ $product['author'] }}</p>
                                                <div class="box-product__content__shortDescription">
                                                    {{ $product['description'] }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-8">
                            <div class="row">
                                @foreach($category->product as $key => $product)
                                    @if($key !== 0)
                                        <div class="col-3">
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
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @include('layouts.footer')
    </div>
@endsection
<script type="text/javascript">

</script>
