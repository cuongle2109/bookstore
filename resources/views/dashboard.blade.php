@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="block-dashboard">
        <div class="row">
            <div class="col-12">
                <div class="block-statistic-today box-shadow">
                    <h5 class="block-dashboard__title">KẾT QUẢ BÁN CHẠY HÔM NAY</h5>
                    <div class="block-statistic-today__content">
                        <div class="block-statistic-today__content__order">
                            <div class="block-statistic-today__content__order__icon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <div class="block-statistic-today__content__order__right">
                                <span>{{ $totalOrders }} Hoá đơn</span>
                                <span>{{ number_format($totalPriceAllOrders[0]->total) }} VND</span>
                                <span>Doanh thu</span>
                            </div>
                        </div>
                        <div
                            class="block-statistic-today__content__order block-statistic-today__content__order--orange">
                            <div class="block-statistic-today__content__order__icon">
                                <i class="fa fa-mail-reply-all"></i>
                            </div>
                            <div class="block-statistic-today__content__order__right">
                                <span>{{ $totalOrdersDestroy }} phiếu</span>
                                <span>{{ number_format($totalPriceAllOrdersDestroy[0]->total) }} VND</span>
                                <span>Trả hàng</span>
                            </div>
                        </div>
                        <div
                            class="block-statistic-today__content__order block-statistic-today__content__order--light-blue">
                            <div class="block-statistic-today__content__order__icon">
                                <i class="fa fa-arrow-up"></i>
                            </div>
                            <div class="block-statistic-today__content__order__right">
                                <span style="opacity: 0">0</span>
                                <span>{{ number_format($percentGrowth, 2) }}%</span>
                                <span>So với cùng kì tháng trước</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="block-monthly-revenue box-shadow">
                    <h5 class="block-dashboard__title">DOANH THU THÁNG NÀY</h5>
                    <canvas id="blockMonthlyRevenue"></canvas>
                </div>
                <div class="block-monthly-revenue box-shadow">
                    <h5 class="block-dashboard__title">TOP 10 HÀNG HOÁ BÁN CHẠY THÁNG NÀY</h5>
                    <canvas id="blockMonthlyRevenueTopProduct"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>


</script>
