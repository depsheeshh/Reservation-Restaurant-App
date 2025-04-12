@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Payment Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">


            <form class="user" method="POST" action="{{ route('payment.store')}}" id="createForm">
              @csrf
              <div class="form-group">
              <Label>Order :</Label>
              <select class="form-control" name="order_id" id="order_id">
                <option value="">Select Order</option>
                @foreach ($orders as $order)
                <option value="{{ $order->id }}" data-price="{{ $order->final_price }}">{{ $order->order_name }}</option>
                @endforeach
              </select>
              </div>

              <div class="form-group">
              <Label>Amount :</Label>
              <input type="text" class="form-control" name="amount" id="amount" readonly>
              </div>

              <div class="form-group">
              <Label>Status :</Label>
              <select class="form-control" name="status">
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
        const orderSelect = document.getElementById('order_id');
        const amountInput = document.getElementById('amount');

        // When an order is selected
        orderSelect.addEventListener('change', function() {
            const selectedOption = orderSelect.options[orderSelect.selectedIndex];
            const finalPrice = selectedOption.getAttribute('data-price');
            amountInput.value = finalPrice; // Set amount field to final_price of selected order
        });
    });
  </script>
@endsection
