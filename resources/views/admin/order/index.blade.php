@extends('layouts.app')
@section('title', 'Order')
@section('content')
    <div class="block-product">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-12">
                <a href="{{ route('admin.order.create') }}" class="btn btn-primary mb-3">
                    <i class="fa fa-plus me-3" aria-hidden="true"></i>Add order
                </a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Total price</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>Payment type</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ number_format($order['total_price']) }} VND</td>
                            <td>{{ $order['phone'] }}</td>
                            <td>{{ $order['address'] }}</td>
                            <td>{{ $order['paymentType']->name }}</td>
                            @switch($order['status'])
                                @case(0)
                                    <td class="text-warning">waiting</td>
                                    @break
                                @case(1)
                                    <td class="text-success">success</td>
                                    @break
                                @case(2)
                                    <td class="text-danger">destroy</td>
                                    @break
                            @endswitch
                            <td>{{ $order['created_at'] }}</td>
                            <td>{{ $order['updated_at'] }}</td>
                            <td style="display: flex">
                                <form action="{{ route('admin.order.accept',$order->id) }}" method="POST">

                                    @csrf
                                    <button type="submit" class="btn btn-success me-1">
                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.order.destroy',$order->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('admin.order.show',$order->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>

</script>
