@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Reservation Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">



            <form class="user" method="POST"  action="{{ route('reservation.store')}}" id="createForm">
              @csrf

              <div class="form-group">
              <Label>User :</Label>
              <select name="user_id" class="form-control">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
              </div>

              <div class="form-group">
              <Label>Table Number :</Label>
             <select name="table_number" class="form-control">
              @foreach ($tables as $table)
              <option value="{{ $table->table_number }}">{{ $table->table_number }}</option>
              @endforeach

             </select>
              </div>


   



              <div class="form-group">
              <Label>Reservation Date :</Label>
              <input type="date" class="form-control" name="reservation_date">
              </div>

              <div class="form-group">
              <Label>Reservation Name :</Label>
              <input type="text" class="form-control" name="reservation_name">



              </div>




              <div class="form-group">
              <Label>Status :</Label>
              <select class="form-control" name="status">
                <option value="not reserved">Not reserved</option>
                <option value="reserved">Reserved</option>
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
@endsection



  