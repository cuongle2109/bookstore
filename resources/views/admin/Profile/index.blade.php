@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="block-product">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Profile</h3>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" value="{{ $user->address }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Created at</label>
                            <input type="text" class="form-control" value="{{ $user->created_at }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Updated at</label>
                            <input type="text" class="form-control" value="{{ $user->updated_at }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>

</script>
