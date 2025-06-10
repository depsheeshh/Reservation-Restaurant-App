@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Item Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form class="user" method="POST" action="{{ route('order_item.store')}}" id="createForm">
              @csrf
              
              <div class="form-group">
                  <Label>Order :</Label>
                  <select class="form-control" name="order_id">
                    @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->order_name }}</option>
                    @endforeach
                  </select>
                </div>           

              <div class="form-group">
                    <Label>Menu :</Label>
                    <select class="form-control" name="menu_id" id="menuSelect">
                      @foreach ($menus as $menu)
                      <option value="{{ $menu->id }}" data-price="{{ $menu->price }}">{{ $menu->name }} (Rp {{ number_format($menu->price, 0, ',', '.') }})</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <Label>Quantity :</Label>
                    <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="1">
                </div>

                <div class="form-group">
                    <Label>Price :</Label>
                    <input type="number" class="form-control" name="price" id="price" readonly>
                </div>


                <div class="form-group">
                    <Label>Discount :</Label>
                    <input type="number" class="form-control" name="discount" id="discount" readonly>
                </div>


                <div class="form-group">
                    <Label>Final Price :</Label>
                    <input type="number" class="form-control" name="final_price" id="final_price" readonly>
                </div>


                <center>
                    <input type="submit" class="btn btn-success" value="Save Data">
                </center>
            </form>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
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
