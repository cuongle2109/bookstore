@extends('layouts.app')
@section('title', 'Category | Update')
@section('content')
    <div class="block-product">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{ $category->name }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                @foreach ($errors->getMessages()['name'] as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
