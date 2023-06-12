@extends('layouts.vertical')
@section('title', 'Home')
@section('content')
    <div class="block-product-detail">
        <img src="/storage/images/banner-gifl.jpg" class="img img-fluid mb-3" alt="#" width="100%">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="slider slider-for">
                        @foreach($product['photos'] as $photo)
                            <div>
                                <img src="/storage/files/{{ $photo }}" class="img img-fluid" alt="" width="100%">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider slider-nav">
                        @foreach($product['photos'] as $photo)
                            <div>
                                <img src="/storage/files/{{ $photo }}" class="img img-fluid" alt="" width="100" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-8 block-product-detail__content">

                    <h1 class="block-product-detail__content__title">{{ $product['name'] }}</h1>

                    <p class="block-product-detail__content__author">by <span>{{ $product['author'] }}</span></p>
                    <p class="block-product-detail__content__publisher">Publisher: {{ $product['publisher'] }}</p>
                    {{--        Số-tiền-sau-khi-giảm-giá = Giá-tiền x [(100 –  %-giảm-giá)/100]            --}}
                    <p class="block-product-detail__content__price">{{ number_format($product['price'] * ((100 - $product['discount'])/100)) }}<sup>đ</sup></p>
                    <p class="block-product-detail__content__discount">
                        <span><del>{{ number_format($product['price']) }}</del><sup>đ</sup></span> | <span>Save {{ $product['discount'] }}%</span>
                    </p>

                    <br>

                    <div class="btn-group block-product-detail__content__quantity-group" role="group">
                        <button id="minusCart" type="button" class="btn btn-primary">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                        <input id="quantityCart" type="number" class="form-control" value="0">
                        <button id="plusCart" type="button" class="btn btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <input id="name" type="hidden" value="{{ $product['name'] }}">
                        <input id="author" type="hidden" value="{{ $product['author'] }}">
                        <input id="discount" type="hidden" value="{{ $product['discount'] }}">
                        <input id="photo" type="hidden" value="{{ $product['photos'][0] }}">
                        <input id="price" type="hidden" value="{{ $product['price'] * ((100 - $product['discount'])/100) }}">
                    </div>

                    <a href="#" class="d-block block-product-detail__content__compare" data-bs-toggle="modal" data-bs-target="#modal-compare-product">Compare information with other products</a>
                    @include('components.modal-compare-product')

                    <button id="addToCart" class="btn btn-primary block-product-detail__content__btn-add-cart" data-id="{{ $product['id'] }}">Add to cart</button>
                    <a href="{{ route('mypage.view-cart.index') }}" class="btn btn-outline-primary block-product-detail__content__view-cart">View cart</a>
                    {{--                    <button id="payment" class="btn btn-outline-primary">Payment</button>--}}

                    <p class="block-product-detail__content__note-ship">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        Choose Expedited Shipping at checkout for delivery by
                        <strong>2 weeks later</strong>
                    </p>
                </div>
                <div class="col-12">
                    <div class="block-product-detail__description">
                        <h3 class="block-product-detail__description__title">Overview</h3>
                        <div class="block-product-detail__description__content">
                            {!! $product['description'] !!}
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="block-product-detail__order">
                        <h3 class="block-product-detail__order__title">You May Also Like</h3>
                        <div class="block-product-detail__order__content">
                            <div class="row">
                                @foreach($productShuffles as $productShuffle)
                                    <div class="col-2">
                                        <div class="box-product">
                                            <a href="{{ route('mypage.product-detail.show',$productShuffle['id']) }}">
                                                <div class="box-product__image">
                                                    <img src="/storage/files/{{ $productShuffle['photos'][0] }}"
                                                         alt="">
                                                </div>
                                                <div class="box-product__content">
                                                    <h3 class="box-product__content__title">{{ $productShuffle['name'] }}</h3>
                                                    <p class="box-product__content__author">{{ $productShuffle['author'] }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
<script type="text/javascript">

</script>
