@yield('navbar')
<x-navbar />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset ('css/index.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container">
    <table id="cart" class="table table-bordered">
        <thead>
            <tr style="text-align: center;">
                <th class="w-25" data-th="Image">Hình Ảnh</th>
                <th class="w-25" data-th="Product">Tên Sản Phẩm</th>
                <th class="w-20" data-th="Quantity">Số Lượng</th>
                <th class="w-20" data-th="Price">Giá</th>
                <th class="w-20" data-th="Total">Tổng Giá</th>
                <th class="w-10">Xóa</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @php $total = 0; $itemCount = 0; @endphp
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <tr rowId="{{ $id }}">
                <td data-th="Image" class="align-middle">
                    <img src="{{ $details['image'] }}" class="img-fluid"
                        style="width: 100%; height: 250px; object-fit: cover;">
                </td>

                <td data-th="Product" class="text-center">{{ $details['product_name'] }}</td>
                <td data-th="Quantity" class="text-center">{{ $details['quantity'] }}</td>
                </td>
                <td data-th="Price" class="text-center price">{{ number_format($details['price'], 3, ',', '.') }} VND
                </td>
                <td data-th="Total" class="text-center">
                    @php
                    $subtotal = $details['quantity'] * $details['price'];
                    $total += $subtotal;
                    $itemCount += $details['quantity'];
                    @endphp
                    {{ number_format($subtotal, 3, ',', '.') }} VND
                </td>
                <td class="actions">
                    <a class="btn btn-outline-danger btn-sm delete-product"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>

        <tfoot>
            <tr style="text-align: center;">
                <td colspan="3">
                    <h2><strong>Tổng Tiền:</strong></h2>
                </td>
                <td colspan="3">
                    <h2><strong>{{ number_format($total, 3, ',', '.') }} VND</strong></h2>
                </td>
            </tr>
        </tfoot>
    </table>


    <script>
    document.querySelector(".scroll-to-top").onclick = function() {
        window.scrollTo(0, 0);
    };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(".edit-cart-info").change(function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: "{{ route('cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("rowId"),
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".delete-product").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to delete?")) {
            $.ajax({
                url: "{{ route('delete.cart.product') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });

    </script>
</div>

<div>
    <x-thanhtoan />
</div>

<!-- footer -->
<div>
    <x-footer />
</div>