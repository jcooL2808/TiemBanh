<div class="container mt-4">
    <h2 class="mb-4">Thanh toán</h2>
    @csrf
    <div class="form-group">
        <label for="name">Họ và tên:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required disabled>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required disabled>
    </div>
    <div class="form-group">
        <label for="payment_method">Phương thức thanh toán:</label>
        <select class="form-select" id="payment_method" name="payment_method">
            <option value="cod">Thanh toán khi nhận hàng</option>
            <option value="online">Thanh toán trực tuyến</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Thanh toán</button>
    </div>
</div>
