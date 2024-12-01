@extends('layouts.main')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $i)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $i->images }}" class="img-fluid me-5 rounded-circle"
                                            style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $i->name }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{ number_format($i->gia) }} đ</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border btnGiam"
                                                data-id="{{ $i->idpv }}" onclick="getCartAPI(-1, this)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0"
                                            value="{{ number_format($i->soluong) }}" readonly>
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border btnTang"
                                                data-id="{{ $i->idpv }}" onclick="getCartAPI(1, this)">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{ number_format($i->gia * $i->soluong) }} đ</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4"
                                        onclick="getCartAPIX('{{ $i->idpv }}', this)">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="row g-4 justify-content-end">
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">{{ number_format($i->gia * $i->soluong) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">Free ship</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">{{ number_format($i->gia * $i->soluong) }}</p>
                        </div>
                        {{-- <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Thanh toán</button> --}}
                            <a href="/sendMail" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">
                                Thanh toán
                            </a>
                            
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function updateTotal() {
            let total = 0;
            // Iterate over all products in the cart to calculate the total
            document.querySelectorAll('.cart-item').forEach(item => {
                let price = parseInt(item.querySelector('.product-price').textContent.replace(/[^0-9]/g, ''));
                let quantity = parseInt(item.querySelector('.product-quantity').value);
                total += price * quantity;
            });

            // Update the total price on the page
            document.querySelector('.total-price').textContent = new Intl.NumberFormat().format(total) + ' đ';
        }

        function getCartAPI(sL, o) {
            let idpv = o.dataset.id;

            let quantityInput = o.closest('tr').querySelector('.form-control');
            let currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity + sL < 1) {
                $.notify("Số lượng sản phẩm không được dưới 1", "error");
                return; // Prevent the API request from being sent
            }

            fetch('/gio-hang/them-sp-gh', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        idv: idpv,
                        sl: sL
                    })
                })
                .then(kQ => kQ.json())
                .then(kQ => {

                    if (!kQ.error)
                        window.location.reload();
                    else {
                        $.notify(kQ.message, "error");

                    }
                })
                .catch(e => console.log(e))
        }

        function getCartAPIX(id, o) {
            fetch('/gio-hang/xoa-sp-gh/' + id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(kQ => kQ.json())
                .then(kQ => {

                    if (!kQ.error) {
                        $.notify(kQ.message, "success");
                        o.parentElement.parentElement.remove();
                    } else {
                        $.notify(kQ.message, "error");

                    }
                })
                .catch(e => console.log(e))
        }
        
    </script>

    <!-- Cart Page End -->
@endsection
