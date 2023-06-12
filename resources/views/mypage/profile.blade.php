@extends('layouts.vertical')
@section('title', 'Profile')
@section('content')
    <div class="block-profile">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-2">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('mypage.profile.index') }}">Hồ sơ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('mypage.change-password.show', $user->id) }}">Đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Đơn hàng</a>
                        </li>
                    </ul>
                </div>
                <div class="col-10">
                    <form method="post" action="{{ route('mypage.profile.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="box-shadow">
                            <h3>Hồ sơ của tôi</h3>
                            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                            <hr>

                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2">
                                    <label class="col-form-label">Họ tên</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{ $user->name }}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            @foreach ($errors->getMessages()['name'] as $error)
                                                <div>{{$error}}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <input type="hidden" name="address" value="{{ $user->address }}">
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2">
                                    <label class="col-form-label">Email</label>
                                </div>
                                <div class="col-auto">
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('mypage.change-email.show', $user->id) }}">Thay đổi</a>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2">
                                    <label class="col-form-label">Địa chỉ</label>
                                </div>
                                <div class="col-auto">
                                    <span>{{ $user->address }}</span>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('mypage.change-address.show', $user->id) }}">Thay đổi</a>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2">
                                    <label class="col-form-label">Số điện thoại</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone" value="{{ $user->phone }}">
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            @foreach ($errors->getMessages()['phone'] as $error)
                                                <div>{{$error}}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="isAdmin" value="{{ $user->isAdmin }}">
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
<script type="text/javascript">

</script>
