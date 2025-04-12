@extends('layout')
@section('content')
<div class="col-lg-8 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">Data Employee</h6>
                </div>
                <div class="card-body">
				


  <form class="user" method="POST" action="{{ route('employee.update', $employee->id)}}" enctype="multipart/form-data" id="editForm">
  @csrf
  @method('PUT')


          <input type="hidden" name="id" value="{{ $employee->id }}">




  <div class="form-group">
  <Label>Name :</Label>
  <input type="text" class="form-control" name="name" value="{{$employee->name}}">
  </div>

  <div class="form-group">
    <Label>Email :</Label>
    <input type="email" class="form-control" name="email" value="{{$employee->email}}">
</div>
<div class="form-group">
    <Label>Phone :</Label>
    <input type="number" class="form-control" name="phone" value="{{$employee->phone}}">
</div>
<div class="form-group">
    <Label>Role :</Label>
    <select name="role" class="form-control">
        <option value="waiter" {{ $employee->role == 'waiter' ? 'selected' : '' }}>Waiter</option>
        <option value="chef" {{ $employee->role == 'chef' ? 'selected' : '' }}>Chef</option>
    </select>

</div>

<div class="form-group">
    <Label>Image :</Label>
    <input type="file" class="form-control" name="image">
</div>


   </div>


          
        <center><button type="submit" class="btn btn-primary">Update</button></center>
                    
                    


                  </form>
                  
                </div>
              </div>
            </div>
            @endsection
