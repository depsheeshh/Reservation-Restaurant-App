@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('order.create') }}" class="btn btn-success">Add Data</a>
            </div>
            <h3 class="card-title">Order Data</h3>
          </div>





          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Reservation</th>
                <th>Order Name</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Action</th>









              </tr>
              </thead>
              
              <tfoot>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Reservation</th>
                <th>Order Name</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Action</th>









              </tr>
              </tfoot>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $orders->firstItem() + $loop->index }}</td>
                    <td>{{ $order->user->name }}</td>



                  <td>{{ $order->reservation ? $order->reservation->reservation_name : 'N/A' }}</td>

                  <td>{{ $order->order_name }}</td>
                  <td>{{ $order->total_price }}</td>
                  <td>{{ $order->status }}</td>
                  <td>{{ $order->discount }}</td>
                  <td>{{ $order->final_price }}</td>






                  <td>


                    <form action="{{ route('order.destroy',$order->id) }}" method="POST" class="delete-form" >
                      @csrf
                      @method('DELETE')



                    <a href="{{ route('order.edit',$order->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>





                    <button class="btn btn-danger delete-btn" type="submit"><i class="fas fa-trash"></i></button>
                  </form>
                  </td>


                </tr>
                @endforeach
                </tbody>
            </table>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection
