@extends('layouts.app')
@section('title', 'User | Create')
@section('content')
    <div class="block-user">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{ $user->name }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['name'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" value="{{ $user->email }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['email'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Password</label>--}}
{{--                        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" value="{{ $user->password }}">--}}
{{--                        @if($errors->has('password'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                @foreach ($errors->getMessages()['password'] as $error)--}}
{{--                                    <div>{{$error}}</div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Confirm password</label>--}}
{{--                        <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation" value="{{ $user->password }}">--}}
{{--                        @if($errors->has('password_confirmation'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                @foreach ($errors->getMessages()['password_confirmation'] as $error)--}}
{{--                                    <div>{{$error}}</div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" name="address" value="{{ $user->address }}">
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['address'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone" value="{{ $user->phone }}">
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['phone'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <input type="hidden" name="isAdmin" value="{{ $user->isAdmin }}">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>


</script>
