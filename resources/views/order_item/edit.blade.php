@extends('layout')

@section('content')
<div class="col-lg-8 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" align="center">Data Order Item</h6>
        </div>
        <div class="card-body">

            <form class="user" method="POST" enctype="multipart/form-data" action="{{ route('order_item.update', $order_item->id) }}" id="editForm">
            @csrf
            @method('PUT')

            <div class="form-group">
                <Label>Order :</Label>
                <select name="order_id" class="form-control">
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" {{ $order_item->order_id == $order->id ? 'selected' : '' }}>
                            {{ $order->order_name }}
                        </option>
                    @endforeach
                </select>
                @error('order_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <Label>Menu :</Label>
                <select name="menu_id" class="form-control" id="menuSelect">
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" data-price="{{ $menu->price }}" 
                            {{ $order_item->menu_id == $menu->id ? 'selected' : '' }}>
                            {{ $menu->name }} (Rp {{ number_format($menu->price, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('menu_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <Label>Quantity :</Label>
                <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $order_item->quantity }}" min="1">
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <Label>Price :</Label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $order_item->price }}" readonly>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <Label>Discount :</Label>
                <input type="number" class="form-control" name="discount" id="discount" value="{{ $order_item->discount }}" readonly>
            </div>


            <div class="form-group">
                <Label>Final Price :</Label>
                <input type="number" class="form-control" name="final_price" id="final_price" value="{{ $order_item->final_price }}" readonly>
            </div>


            <center><button type="submit" class="btn btn-primary">Update</button></center>

            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    const priceInput = document.getElementById('price');
    const discountInput = document.getElementById('discount');
    const finalPriceInput = document.getElementById('final_price');
    const menuSelect = document.getElementById('menuSelect');

    // Fungsi untuk menghitung harga final
    function calculateFinalPrice() {
        const quantity = parseInt(quantityInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;
        let discount = 0;

        // Terapkan diskon jika kuantitas >= 3
        if (quantity >= 3) {
            discount = price * 0.4;  // Diskon 10%
        }

        discountInput.value = discount.toFixed(2);

        const totalPrice = quantity * price;
        const finalPrice = totalPrice - discount;

        finalPriceInput.value = finalPrice.toFixed(2);
    }

    // Perbarui harga berdasarkan menu yang dipilih
    menuSelect.addEventListener('change', function() {
        const selectedOption = menuSelect.options[menuSelect.selectedIndex];
        const price = parseFloat(selectedOption.getAttribute('data-price')); // Ambil harga dari data-price
        priceInput.value = price.toFixed(2);
        calculateFinalPrice();
    });

    // Perbarui harga saat kuantitas berubah
    quantityInput.addEventListener('input', calculateFinalPrice);

    // Panggil perhitungan harga awal ketika halaman dimuat pertama kali
    calculateFinalPrice();
});
</script>
@endsection
