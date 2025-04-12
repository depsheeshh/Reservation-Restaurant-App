@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tables Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form class="user" method="POST"  action="{{ route('table.store')}}" id="createForm">
              @csrf

              <div class="form-group">
              <Label>Table Number :</Label>
              <input type="text" class="form-control" name="table_number">
              </div>

              <div class="form-group">
              <Label>Capacity :</Label>
              <input type="text" class="form-control" name="capacity">
              </div>       
              
              <div class="form-group">
              <Label>Status :</Label>
              <select class="form-control" name="status">
                <option value="Available">Available</option>
                <option value="Occupied">Occupied</option>
                <option value="Reserved">Reserved</option>
              </select>
              </div>
            
            

                      

                      <center>
                          <button type="submit" class="btn btn-success" onclick="confirmSubmit()">Save Data</button>
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


<script>
  function confirmSubmit() {
      Swal.fire({
          title: 'Confirmation',
          text: "Are you sure to save this data?",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Save!',

          cancelButtonText: 'Cancel'

      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('createForm').submit();
          }
      });
  }
  </script>
  