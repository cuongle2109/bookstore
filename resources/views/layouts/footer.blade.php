<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section
        class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
    >
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Kết nối với chúng tôi trên các mạng xã hội:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <div style="font-size: 30px; letter-spacing: 10px; color: #3e5962">CBOOK</div>

                    </h6>
                    <p>
                        Tại đây, bạn có thể sử dụng các hàng và cột để sắp xếp nội dung chân trang của mình. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Danh mục
                    </h6>
                    @foreach($categories as $key => $category)
                        @if($key < 4)
                            <p>
                                <a href="{{ route('mypage.product-by-category.show', $category->id) }}" class="text-reset">{{ $category['name'] }}</a>
                            </p>
                        @endif
                    @endforeach
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Liên kết hữu ích
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Định giá</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Cài đặt</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Đơn hàng</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Trợ giúp</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Liên hệ
                    </h6>
                    <p><i class="fa fa-home me-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fa fa-envelope me-3"></i>
                        info@example.com
                    </p>
                    <p><i class="fa fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fa fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">admin.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
