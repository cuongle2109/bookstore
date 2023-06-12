<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <title>Custom Auth in Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href={{ asset('css/slick/slick.css') }}>
    <link rel="stylesheet" href={{ asset('css/slick/slick-theme.css') }}>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
</head>

<body>

@include('layouts.topbar-user')
@include('layouts.navbar-user')

<div class="container-fluid">
    @yield('content')
</div>
<script src="{{ asset('chart.js/chart.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script>

    $(function () {
        $(".item-load-more").slice(0, 8).show();
        $(document).on('click touchstart', '.load-more', function (e) {
            e.preventDefault();
            $(".item-load-more:hidden").slice(0, 8).slideDown();
            if ($(".item-load-more:hidden").length == 0) {
                $(".load-more").css('visibility', 'hidden');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1000);
        });
    });

    $(document).ready(function () {
        $('#example').DataTable();
        $('.block-slide-brandname').slick({
            infinite: true,
            slidesToShow: 12,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 2000,
        })
        $('.block-now-trending__slide').slick({
            centerPadding: '10px',
            infinite: true,
            slidesToShow: 7,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 2000,
        })
        $('.block-quote__slide').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            centerPadding: '5px',
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });

        @if ($message = Session::get('cart-success'))
            $('#modalCartSuccess').modal('show');

            resetHtmlPayment()
        @endif

        // get session cart
        let cartSession = JSON.parse(sessionStorage.getItem("cart"))
        const ADD_TO_CART_TYPE = 1
        const MINUS_QUANTITY_TYPE = 2
        const PLUS_QUANTITY_TYPE = 3
        const ON_CHANGE_QUANTITY_TYPE = 4
        const PAYMENT_TYPE_CHECKOUT = 1
        const PAYMENT_TYPE_VNPAY = 2
        const $btnAdd = $('#addToCart');
        const $inputQuantity = $('#quantityCart')
        const $price = $('#price');
        const $photo = $('#photo');
        const $author = $('#author');
        const $name = $('#name');
        const $discount = $('#discount');
        let productId = $btnAdd.attr('data-id')

        const formatter = new Intl.NumberFormat('vi', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        })

        $('.totalQuantityCart').html(0);
        $('.totalPriceCart').html(0);

        // check session cart not exist
        if (!cartSession) {
            sessionStorage.setItem("cart", JSON.stringify([]));
        }

        if (Array.isArray(cartSession) && cartSession.length) {
            let item = cartSession.find(element => element.id === productId)

            // set quantity detail product
            if(item){
                $inputQuantity.val(item.quantity)
            }else{
                $inputQuantity.val(0)
            }

            // set html view cart
            setHtmlShoppingCart(cartSession)

            // set total quantity cart
            $('.totalQuantityCart').html(getTotalQuantityCart(cartSession))

            // set total price cart
            $('.totalPriceCart').html(getTotalPriceCart(cartSession))
        }

        setHtmlShoppingCart(cartSession)

        $('#addToCart').click(function () {

            handleCart(ADD_TO_CART_TYPE)

            // set html product detail
            // setHtmlProductDetail()
        });
        $('#minusCart').click(function () {
            handleCart(MINUS_QUANTITY_TYPE)
        });
        $('#plusCart').click(function () {
            handleCart(PLUS_QUANTITY_TYPE)
        });

        $('#quantityCart').change(function () {
            handleCart(ON_CHANGE_QUANTITY_TYPE)
        })

        $('.categoryChecked').change(function () {
            let arr = []
            $('.categoryChecked').each(function () {
                if($(this).is(':checked')){
                    arr.push($(this).val())
                }
            });

            $('input[name="category"]').val(arr.join(','))
        })

        $('#payment').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/payment',
                type: 'POST',
                data: {'cart': cartSession},
                success: function (data) {
                    console.log(data)
                }
            });
        })

        $(document).on('change', '.input-quantities', function () {
            let id = $(this).attr('data-id')
            cartSession.forEach((value, index) => {
                let quantity = parseInt($(this).val())
                if(value.id === id && typeof quantity === "number" && quantity > 0){
                    value.quantity = quantity
                }else if (quantity === 0){
                    cartSession.splice(index, 1)
                }
            })

            sessionStorage.setItem("cart", JSON.stringify(cartSession));

            setHtmlShoppingCart(cartSession)

            // set total quantity cart
            $('.totalQuantityCart').html(getTotalQuantityCart(cartSession))

            // set total price cart
            $('.totalPriceCart').html(getTotalPriceCart(cartSession))
        })

        $('.remove-item-cart').click(function () {
            let id = $(this).attr('data-id')
            cartSession.forEach((value, index) => {
                if(value.id === id){
                    value.quantity = parseInt($(this).val())
                    cartSession.splice(index, 1)
                }
            })

            sessionStorage.setItem("cart", JSON.stringify(cartSession));

            setHtmlShoppingCart(cartSession)

            // set total quantity cart
            $('.totalQuantityCart').html(getTotalQuantityCart(cartSession))

            // set total price cart
            $('.totalPriceCart').html(getTotalPriceCart(cartSession))
        })

        function handleCart(type = ADD_TO_CART_TYPE) {
            // check id product
            if (productId) {
                // check session cart is null
                // array exists and is not empty
                if (Array.isArray(cartSession) && cartSession.length) {
                    let isExist = false
                    cartSession.forEach((val, index) => {
                        if (val.id === productId) {

                            switch (type) {
                                case ADD_TO_CART_TYPE:
                                    val.quantity++
                                    break
                                case MINUS_QUANTITY_TYPE:
                                    val = handleMinusQuantity(val)
                                    break
                                case PLUS_QUANTITY_TYPE:
                                    val.quantity++
                                    break
                                case ON_CHANGE_QUANTITY_TYPE:
                                    val = handleOnChangeQuantiy(val)
                                    break
                            }

                            if (parseInt(val.quantity) === 0) {
                                cartSession.splice(index, 1)
                            } else {
                                $inputQuantity.val(val.quantity)
                            }

                            isExist = true;
                        }
                    })
                    // check product empty in array
                    if (!isExist) {
                        switch (type) {
                            case ADD_TO_CART_TYPE:
                                newCartSession()
                                break
                            case PLUS_QUANTITY_TYPE:
                                newCartSession()
                                break
                            case ON_CHANGE_QUANTITY_TYPE:
                                let quantity = $inputQuantity.val()
                                if (quantity > 0) newCartSession({'id': productId, 'quantity': quantity})
                                break
                        }
                    }
                } else {
                    if(type !== MINUS_QUANTITY_TYPE){
                        newCartSession()
                    }
                }
            }
            // set array cart for session
            sessionStorage.setItem("cart", JSON.stringify(cartSession));
        }

        function handleMinusQuantity(product) {
            if (product.quantity < 1) {
                product.quantity = 0
                return product
            }
            product.quantity--
            $inputQuantity.val(0)

            return product
        }

        function handleOnChangeQuantiy(product) {
            let quantity = $inputQuantity.val()
            if (quantity < 1) {
                product.quantity = '0'
                return product
            }
            product.quantity = quantity

            return product
        }

        function newCartSession(product = {'id': productId, 'quantity': '1'}) {
            product.name = $name.val()
            product.author = $author.val()
            product.discount = $discount.val()
            product.photo = $photo.val()
            product.price = $price.val()
            cartSession.push(product)
            $inputQuantity.val(1)
        }

        $('#form-compare-product').submit(function (e) {
            e.preventDefault()

            let id = $(this).find('select[name="id"]').val()

            if (id) {
                $.ajax({
                    url: '../../api/product/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        setHtmlCompareProductSecond(data)
                    }
                });
            }
        })

        function setHtmlShoppingCart(data) {

            $('.block-view-cart__list-group').html('')

            let htmlHeader = ''
            let html = ''

            htmlHeader = `<li class="block-view-cart__list-group__list-group-item">(<span class="totalQuantityCart">${getTotalQuantityCart(cartSession)}</span>) Sản phẩm</li>`
            $('.block-view-cart__list-group').append(htmlHeader)

            if(data){
                data.forEach(val => {
                    html += `<li class="block-view-cart__list-group__list-group-item">
                        <h3><a href="">${val.name}</a></h3>
                        <p class="author-name">by ${val.author}</p>
                        <div class="row">
                            <div class="col-2">
                                <img src="/storage/files/${val.photo}" alt="#" class="img img-fluid">
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" checked>
                                    <label class="form-check-label">Vận chuyển đơn hàng</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" disabled>
                                    <label class="form-check-label">Mua trực tuyến, nhận tại cửa hàng</label>
                                </div>
                                <div class="remove-item">
                                    <a href="" class="remove-item-cart" data-id="${val.id}">Xoá</a>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="block-view-cart__list-group__list-group-item__price-detail">
                                    <div class="retail-discounted-price">
                                        <span class="retail-price">${val.discount}%</span>
                                        <div class="discounted-price">${formatter.format(val.price)}</div>
                                    </div>
                                    <div class="quantity">
                                        <input type="text" data-id="${val.id}" class="form-control input-quantities" value="${val.quantity}">
                                    </div>
                                    <div class="total-price">
                                        <span>${formatter.format(val.price * val.quantity)}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="block-product-detail__content__note-ship mb-0">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            Chọn giao hàng nhanh khi thanh toán để sao hàng trước
                            <strong>2 tuần sau</strong>
                        </p>
                    </li>`
                })
                $('.block-view-cart__list-group').append(html)
            }
        }

        $('#form-checkout').submit(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/payment',
                type: 'POST',
                data: {
                        'cart': cartSession,
                        'phone': $(this).find('input[name="phone"]').val(),
                        'address': $(this).find('input[name="address"]').val(),
                        'paymentType': PAYMENT_TYPE_CHECKOUT
                        },
                success: function (data) {
                    if(data === '1'){
                        $("#checkOutModal").modal('hide');

                        window.location.href = '/mypage/home'

                        resetHtmlPayment()
                    }
                }
            });
        })

        $('#payment-vnpay').click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/payment',
                type: 'POST',
                data: {
                    'cart': cartSession,
                    'paymentType': PAYMENT_TYPE_VNPAY
                },
                success: function (data) {
                    window.location.replace(data);
                }
            });
        })

        function resetHtmlPayment() {
            // remove session cart when check out success
            sessionStorage.removeItem("cart");

            // set total quantity cart
            $('.totalQuantityCart').html(0)

            // set total price cart
            $('.totalPriceCart').html(0)

            setHtmlShoppingCart([])
        }

        function setHtmlCompareProductSecond(product) {
            let htmlCarousel = ''
            let htmlCarouselIndicators = ''
            let html = ''
            let htmlLinkRedirect = ''

            product.photos.forEach((value, index) => {
                htmlCarousel += `<div class="carousel-item ${index === 0 ? 'active' : ''}">
                                    <img src="/storage/files/${value}" class="img img-fluid d-block" alt="">
                                 </div>`
                htmlCarouselIndicators += `<button type="button" data-bs-target="#carouselCompareSecond" data-bs-slide-to="${index}" class="${index === 0 ? 'active' : ''}" aria-current="${index === 0 ? 'true' : 'false'}" aria-label="Slide ${index}"></button>`
            })

            html = `<div id="carouselCompareSecond" class="carousel slide" data-bs-ride="carousel" data-interval="1000">
                        <div class="carousel-indicators">${htmlCarouselIndicators}</div>
                        <div class="carousel-inner">${htmlCarousel}</div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCompareSecond" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselCompareSecond" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                        <tr>
                            <th>Hình thức</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>Tên sách</td>
                            <td>${product.name}</td>
                        </tr>
                        <tr>
                            <td>Tác giả</td>
                            <td>by ${product.author}</td>
                        </tr>
                        <tr>
                            <td>Giá tiền</td>
                            <td>${product.price}<sup>đ</sup></td>
                        </tr>
                        <tr>
                            <td>Giảm giá</td>
                            <td>${product.discount}%</td>
                        </tr>
                    </table>`;

            htmlLinkRedirect = `<a href="./${product.id}">Đi đến sách ${product.name}</a>`

            $('#compare-second__redirect').html(htmlLinkRedirect)

            $('.block-compare-second').html(html)
            $('#carouselCompareSecond').carousel({
                ride: true
            })
            $('.block-compare-second').removeClass('d-none')
        }

        function getTotalQuantityCart(data) {
            let total = 0
            data.forEach(val => {
                total += parseInt(val.quantity)
            })

            return total
        }

        function getTotalPriceCart(data) {
            let total = 0
            data.forEach(val => {
                total += parseInt(val.price) * parseInt(val.quantity)
            })

            return formatter.format(total)
        }
    });
</script>
</body>
</html>
