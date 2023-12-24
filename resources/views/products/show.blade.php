@extends('admin.app')

@section('title', 'Show Product')

@section('contents')
<h1 class="mb-0">Detail Product</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Product</label>
        <input type="text" name="product_name" class="form-control" placeholder="Product Name"
            value="{{ $product->product_name }}" readonly>
    </div>
    <div class="col">
        <label class="form-label">Price</label>
        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" readonly>
    </div>
    <div class="col">
        <label class="form-label">Image</label>
        <input type="text" name="image" class="form-control" placeholder="Image" value="{{ $product->image }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">product_code</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->product_code }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" placeholder="Descriptoin"
            readonly>{{ $product->description }}</textarea>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At"
            value="{{ $product->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
            value="{{ $product->updated_at }}" readonly>
    </div>
</div>
@endsection