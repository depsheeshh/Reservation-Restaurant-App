@extends('layout')

@section('content')
<div class="col-lg-8 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" align="center">Data Payment</h6>
        </div>
        <div class="card-body">

        <form class="user" method="POST" enctype="multipart/form-data" action="{{ route('payment.update', $payment->id) }}" id="editForm">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $payment->id }}">

            <div class="form-group">
                <Label>Order :</Label>
                <select name="order_id" class="form-control" id="order_id"> <!-- Update id to 'order_id' -->
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" data-price="{{ $order->final_price }}" {{ $payment->order_id == $order->id ? 'selected' : '' }}>
                            {{ $order->order_name }}
                        </option>
                    @endforeach
                </select>
                @error('order_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <Label>Amount :</Label>
                <input type="text" class="form-control" name="amount" id="amount" value="{{ $payment->amount }}" readonly>
            </div>

            <div class="form-group">
                <Label>Status :</Label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="cancelled" {{ $payment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <center>
                <button type="submit" class="btn btn-primary">Update</button>
            </center>

        </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderSelect = document.getElementById('order_id'); // Change this to 'order_id'
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
