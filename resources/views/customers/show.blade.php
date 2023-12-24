@extends('admin.app')

@section('title', 'Show Customer')

@section('contents')
<h1 class="mb-0">Detail Customer</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $customer->name }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $customer->email }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" placeholder="Type"
            value="{{ $customer->type }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At"
            value="{{ $customer->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
            value="{{ $customer->updated_at }}" readonly>
    </div>
</div>
@endsection