@extends('layout')

@section('content')
<div class="col-lg-8 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" align="center">Data Order</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" enctype="multipart/form-data" action="{{ route('order.update', $order->id) }}" id="editForm">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <Label>User :</Label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <Label>Reservation :</Label>
                    <select name="reservation_id" class="form-control">
                        @foreach ($reservations as $reservation)
                            <option value="{{ $reservation->id }}" {{ $order->reservation_id == $reservation->id ? 'selected' : '' }}>{{ $reservation->reservation_name }}</option>
                        @endforeach
                    </select>
                    @error('reservation_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <Label>Order Name :</Label>
                    <input type="text" class="form-control" name="order_name" value="{{ $order->order_name }}">
                </div>

                <div class="form-group">
                    <Label>Total Price :</Label>
                    <input type="number" class="form-control" name="total_price" id="total_price" value="{{ $order->total_price }}" oninput="calculateFinalPrice()">
                    @error('total_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <Label>Status :</Label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>


                <div class="form-group">
                    <Label>Discount (%) :</Label>
                    <input type="number" class="form-control" name="discount" id="discount" value="{{ $order->discount }}" oninput="calculateFinalPrice()">
                    @error('discount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <Label>Final Price :</Label>
                    <input type="number" class="form-control" name="final_price" id="final_price" value="{{ $order->final_price }}" readonly>
                    @error('final_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function calculateFinalPrice() {
        let totalPrice = parseFloat(document.getElementById('total_price').value) || 0;
        let discount = parseFloat(document.getElementById('discount').value) || 0;

        // Calculate discount amount
        let discountAmount = (discount / 100) * totalPrice;

        // Calculate final price
        let finalPrice = totalPrice - discountAmount;

        // Update final price field
        document.getElementById('final_price').value = finalPrice.toFixed(2);
    }

    // Call the function once to set initial final price
    calculateFinalPrice();
</script>
@endsection
