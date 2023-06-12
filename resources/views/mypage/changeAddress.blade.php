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
                    <form method="post" action="{{ route('mypage.change-address.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="box-shadow">
                            <h3>Đổi Địa chỉ nhận hàng</h3>
                            <p>Để cập nhật địa chỉ mới, vui lòng xác nhận bằng cách nhập mật khẩu</p>
                            <hr>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2">
                                    <label class="col-form-label">Địa chỉ</label>
                                </div>
                                <div class="col-auto">
                                    <span>{{ $user->address }}</span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2">
                                    <label class="col-form-label">Địa chỉ mới</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" name="address">
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">
                                            @foreach ($errors->getMessages()['address'] as $error)
                                                <div>{{$error}}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-2">
                                    <label class="col-form-label">Mật khẩu</label>
                                </div>
                                <div class="col-5">
                                    <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            @foreach ($errors->getMessages()['password'] as $error)
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
                                    <a href="{{ route('mypage.profile.index') }}"  class="btn btn-secondary">Quay lại</a>
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
