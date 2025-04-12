@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Data</h3>
          </div>
          <div class="card-body">
            <form class="user" method="POST" action="{{ route('order.store') }}" id="createForm">
              @csrf

              <div class="form-group">
                <label>User :</label>
                <select name="user_id" class="form-control">
                  <option value="">-- Select User --</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Reservation :</label>
                <select name="reservation_id" class="form-control">
                  <option value="">-- Select Reservation --</option>
                  @foreach ($reservations as $reservation)
                    <option value="{{ $reservation->id }}">{{ $reservation->reservation_name }}</option>
                  @endforeach
                </select>
              </div>    

              <div class="form-group">
                <label>Order Name :</label>
                <input type="text" class="form-control" name="order_name" required>
              </div>

              <div class="form-group">
                <label>Total Price :</label>
                <input type="number" class="form-control" name="total_price" id="total_price" required>
              </div>

              <div class="form-group">
                <label>Discount (%):</label>
                <input type="number" class="form-control" name="discount" id="discount" value="0" min="0" max="100" required>
              </div>

              <div class="form-group">
                <label>Final Price :</label>
                <input type="number" class="form-control" name="final_price" id="final_price" readonly required>
              </div>

              <div class="form-group">
                <label>Status :</label>
                <select name="status" class="form-control">
                  <option value="pending">Pending</option>
                  <option value="paid">Paid</option>
                  <option value="cancelled">Cancelled</option>
                </select>
              </div>

              <center>
                <input type="submit" class="btn btn-success" value="Save Data">
              </center>

            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const totalPriceInput = document.getElementById('total_price');
    const discountInput = document.getElementById('discount');
    const finalPriceInput = document.getElementById('final_price');

    function calculateFinalPrice() {
      let price = parseInt(totalPriceInput.value) || 0; // Pastikan dalam bentuk angka bulat
      let discountPercent = parseInt(discountInput.value) || 0; // Pastikan diskon juga angka bulat

      // Pastikan diskon antara 0 - 100
      if (discountPercent > 100) {
        discountInput.value = 100;
        discountPercent = 100;
      } else if (discountPercent < 0) {
        discountInput.value = 0;
        discountPercent = 0;
      }

      let discountAmount = Math.round((price * discountPercent) / 100); // Hitung jumlah diskon bulat
      let finalPrice = price - discountAmount; // Kurangi diskon dari total harga

      finalPriceInput.value = finalPrice; // Masukkan hasil ke input final price
    }

    totalPriceInput.addEventListener('input', calculateFinalPrice);
    discountInput.addEventListener('input', calculateFinalPrice);
    
    calculateFinalPrice(); // Hitung saat halaman pertama kali dimuat
  });
</script>
@endpush

