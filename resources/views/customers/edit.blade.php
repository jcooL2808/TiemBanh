@extends('admin.app')

@section('title', 'Edit Customer')

@section('contents')
<h1 class="mb-0">Edit Customer</h1>
<hr />
<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $customer->name }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $customer->email }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" placeholder="Type"
                value="{{ $customer->type }}">
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>
@endsection