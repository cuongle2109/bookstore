@extends('layouts.vertical')
@section('title', 'Home')
@section('content')
    <div class="block-view-cart">
        <img src="{{ asset('images/banner-gift.jpg') }}" class="img img-fluid mb-3" alt="#" width="100%">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block-view-cart__notification">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <p class="block-product-detail__content__note-ship">ĐƠN HÀNG CỦA ĐẠT TIÊU CHUẨN VẬN CHUYỂN MIỄN PHÍ - </p>
                        <a href="#">Chi tiết</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="block-view-cart__shopping">
                        <h3 class="block-view-cart__shopping__title">Giỏ hàng của tôi</h3>
                        <ul class="block-view-cart__list-group"></ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="block-view-cart__order-summary">
                        <h2 class="block-view-cart__order-summary__title">Đơn Hàng</h2>
                        <table class="block-view-cart__order-summary__content">
                            <tr>
                                <td>Tổng (<span class="totalQuantityCart"></span> sản phẩm)</td>
                                <td>
                                    <span class="totalPriceCart"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyển</td>
                                <td>Miễn phí</td>
                            </tr>
                            <tr>
                                <td>Thuế</td>
                                <td>0₫</td>
                            </tr>
                        </table>
                        <div class="block-view-cart__order-summary__total">
                            <p>Tổng Số Tiền:</p>
                            <div><span class="totalPriceCart"></span></div>
                        </div>
                        <button class="btn btn-primary block-view-cart__order-summary__checkout" data-bs-toggle="modal" data-bs-target="#checkOutModal">THANH TOÁN</button>
                        @include('components.modal-checkout')
                        <p class="block-view-cart__order-summary__checkout__options">Hoặc thanh toán với</p>
                        <button class="btn btn-primary block-view-cart__order-summary__checkout--vn-pay" id="payment-vnpay">VN PAY</button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
<script type="text/javascript">

</script>
