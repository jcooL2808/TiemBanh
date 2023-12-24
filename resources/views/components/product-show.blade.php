<div class="row">
    @foreach ($sanpham as $product)
    <div class="col-md-3 col-6 mb-4">
        <div class="card">
            <img src="{{ $product->image }}" class="card-img-top img-responsive-height"
                style="height: 305px; @media (max-width: 768px) { width: 100%; height: auto; }">
            <div class="card-body">
                <h4 class="card-title">{{ $product->product_name }}</h4>
                <span class="card-text"><strong>Giá: </strong> {{ $product->price }}.000 VND</span><br>
                <span><strong>Mô tả: </strong> {{ $product->description}}</span>
                <p class="btn-holder"><a href="{{ route('addproduct.to.cart', $product->id) }}"
                        class="btn btn-outline-success">Thêm vào giỏ hàng</a> </p>
            </div>
        </div>
    </div>
    @endforeach
</div>