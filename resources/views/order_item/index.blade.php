@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('order_item.create') }}" class="btn btn-success">Add Data</a>
            </div>
            <h3 class="card-title">Order Item Data</h3>
          </div>






          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Order</th>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Action</th>





              </tr>
              </thead>
              
              <tfoot>
              <tr>
                <th>No</th>
                <th>Order</th>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Action</th>




              </tr>
              </tfoot>
              <tbody>
                @foreach ($order_items as $order_item)
                <tr>
                    <td>{{ $order_items->firstItem() + $loop->index }}</td>

                  <td>{{ $order_item->order->order_name }}</td>
                  <td>{{ $order_item->menu->name }}</td>
                  <td>{{ $order_item->quantity }}</td>
                  <td>{{ $order_item->price }}</td>
                  <td>{{ $order_item->discount }}</td>
                  <td>{{ $order_item->final_price }}</td>





                  <td>

                    
                    <form action="{{ route('order_item.destroy',$order_item->id) }}" method="POST" class="delete-form" >
                      @csrf
                      @method('DELETE')




                    <a href="{{ route('order_item.edit',$order_item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>






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


