@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('reservation.create') }}" class="btn btn-success">Add Data</a>
            </div>
            <h3 class="card-title">Reservations Data</h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Table</th>
                <th>Reservation Name</th>
                <th>Reservation Date</th>
                <th>Status</th>
                <th>Action</th>


              </tr>

              </thead>
              
              <tfoot>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Table</th>
                <th>Reservation Name</th>
                <th>Reservation Date</th>
                <th>Status</th>
                <th>Action</th>


              </tr>
              </tfoot>

              <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                  <td>{{ $reservations->firstItem() + $loop->index }}</td>
                  <td>{{ $reservation->user->name }}</td>
                  <td>{{ $reservation->table_number }}</td>
                  <td>{{ $reservation->reservation_name }}</td>
                  <td>{{ $reservation->reservation_date }}</td>
                  <td>{{ $reservation->status }}</td>
                  <td>




                    <form action="{{ route('reservation.destroy',$reservation->id) }}" method="POST" class="delete-form" >
                      @csrf
                      @method('DELETE')

                    <a href="{{ route('reservation.edit',$reservation->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>


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


