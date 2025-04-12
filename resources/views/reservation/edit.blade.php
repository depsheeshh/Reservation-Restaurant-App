@extends('layout')
@section('content')
<div class="col-lg-8 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">Data Reservation</h6>

                </div>
                <div class="card-body">
				
  <form class="user" method="POST" action="{{ route('reservation.update', $reservation->id)}}" enctype="multipart/form-data" id="editForm">
  @csrf
  @method('PUT')
          <input type="hidden" name="id" value="{{ $reservation->id }}">


          <div class="form-group">
          <Label>User :</Label>
          <select name="user_id" class="form-control">
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $reservation->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
          </select>
          </div>


  <div class="form-group">
  <Label>Table Number :</Label>
  <select name="table_number" class="form-control">
    @foreach ($tables as $table)
        <option value="{{ $table->table_number }}" {{ $reservation->table_number == $table->table_number ? 'selected' : '' }}>{{ $table->table_number }}</option>
    @endforeach

  </select>
  </div>


  <div class="form-group">
  <Label>Reservation Date :</Label>
  <input type="date" class="form-control" name="reservation_date" value="{{$reservation->reservation_date}}">
  </div>

  <div class="form-group">
  <Label>Reservation Name :</Label>
  <input type="text" class="form-control" name="reservation_name" value="{{$reservation->reservation_name}}">
  </div>



  <div class="form-group">
  <Label>Status :</Label>
  <select name="status" class="form-control">
    <option value="not reserved">Not reserved</option>
    <option value="reserved">Reserved</option>
  </select>
  </div>





          
        <center><button type="submit" class="btn btn-primary">Update</button></center>
                    
                    


                  </form>
                  
                </div>
              </div>
            </div>
            @endsection
