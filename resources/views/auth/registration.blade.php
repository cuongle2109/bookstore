@extends('layouts.guest')

@section('content')
    <main class="block-login">
        <h3>Đăng ký</h3>
        <form action="{{ route('register.custom') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Họ và tên" id="name" class="form-control" name="name" autofocus>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="text" placeholder="Email" id="email_address" class="form-control"
                       name="email" autofocus>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="password" placeholder="Mật khẩu" id="password" class="form-control"
                       name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="text" placeholder="Số điện thoại" id="phone" class="form-control"
                       name="phone">
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <input type="text" placeholder="Địa chỉ" id="address" class="form-control"
                       name="address">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Duy trì đăng nhập</label>
                </div>
            </div>

            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Đăng ký</button>
            </div>
        </form>
    </main>
@endsection
