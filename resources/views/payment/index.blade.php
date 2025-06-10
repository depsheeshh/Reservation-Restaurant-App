@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('payment.create') }}" class="btn btn-success">Add Data</a>
            </div>
            <h3 class="card-title">Payment Data</h3>
          </div>


          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Order</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>




              </tr>
              </thead>
              
              <tfoot>
              <tr>
                <th>No</th>
                <th>Order</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>




              </tr>
              </tfoot>
              <tbody>
                @foreach ($payments as $payment)
                <tr>
                  <td>{{ $payments->firstItem() + $loop->index }}</td>
                  <td>{{ $payment->order->order_name }}</td>
                  <td>{{ $payment->amount }}</td>
                  <td>{{ $payment->status }}</td>
                  <td>





                    
                    <form action="{{ route('payment.destroy',$payment->id) }}" method="POST" class="delete-form" >
                      @csrf
                      @method('DELETE')

                    <a href="{{ route('payment.edit',$payment->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>



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


