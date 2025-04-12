@extends('layout')
@section('content')
<div class="col-lg-8 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">Data Table</h6>
                </div>
                <div class="card-body">
				
  <form class="user" method="POST" action="{{ route('table.update', $table->id)}}" enctype="multipart/form-data" id="editForm">
  @csrf
  @method('PUT')
          <input type="hidden" name="id" value="{{ $table->id }}">


  <div class="form-group">
  <Label>Table Number :</Label>
  <input type="text" class="form-control" name="table_number" value="{{$table->table_number}}">
  </div>


  <div class="form-group">
  <Label>Capacity :</Label>
  <input type="text" class="form-control" name="capacity" value="{{$table->capacity}}">
   </div>

   <div class="form-group">
  <Label>Status :</Label>
  <select class="form-control" name="status">
    <option value="Available">Available</option>
    <option value="Occupied">Occupied</option>
    <option value="Reserved">Reserved</option>
  </select>
   </div>



          
        <center><button type="submit" class="btn btn-primary">Update</button></center>

                    
                    


                  </form>
                  
                </div>
              </div>
            </div>
            @endsection
