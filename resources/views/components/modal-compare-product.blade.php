<!-- Modal -->
<div class="modal fade modal-product-compare" id="modal-compare-product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">So sánh sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach($product['photos'] as $key => $photo)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : ''}}">
                                        <img src="/storage/files/{{ $photo }}" class="img img-fluid d-block" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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
                                <td>{{ $product['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Tác giả</td>
                                <td>by {{ $product['author'] }}</td>
                            </tr>
                            <tr>
                                <td>Giá tiền</td>
                                <td>{{ $product['price'] }}<sup>đ</sup></td>
                            </tr>
                            <tr>
                                <td>Giảm giá</td>
                                <td>{{ $product['discount'] }}%</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <div class="block-compare-second d-none"></div>
                        <form action="" id="form-compare-product">
                            <div class="btn-group">
                                <select class="form-select" name="id">
                                    <option selected>Vui lòng chọn sách</option>
                                    @foreach($products as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Tìm</button>
                            </div>
                        </form>
                        <div id="compare-second__redirect"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
