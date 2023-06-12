@extends('layouts.vertical')
@section('title', 'Home')
@section('content')
    <div class="block-view-cart">
        <img src="/storage/images/banner-gifl.jpg" class="img img-fluid mb-3" alt="#" width="100%">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block-view-cart__notification">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <p class="block-product-detail__content__note-ship">YOUR ORDER QUALIFIES FOR FREE STANDARD SHIPPING - </p>
                        <a href="#">Details</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="block-view-cart__shopping">
                        <h3 class="block-view-cart__shopping__title">My Shopping Cart</h3>
                        <ul class="block-view-cart__list-group"></ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="block-view-cart__order-summary">
                        <h2 class="block-view-cart__order-summary__title">Order Summary</h2>
                        <table class="block-view-cart__order-summary__content">
                            <tr>
                                <td>Subtotal (<span class="totalQuantityCart"></span> items)</td>
                                <td>
                                    <span class="totalPriceCart"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Estimated Shipping</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Estimated Tax</td>
                                <td>$0.00</td>
                            </tr>
                        </table>
                        <div class="block-view-cart__order-summary__total">
                            <p>Order Total:</p>
                            <div><span class="totalPriceCart"></span></div>
                        </div>
                        <button class="btn btn-primary block-view-cart__order-summary__checkout" data-bs-toggle="modal" data-bs-target="#checkOutModal">CHECKOUT</button>
                        @include('components.modal-checkout')
                        <p class="block-view-cart__order-summary__checkout__options">Or Checkout With</p>
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
