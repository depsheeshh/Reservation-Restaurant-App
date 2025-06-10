@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Employee Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">





            <form enctype="multipart/form-data" class="user" method="POST"  action="{{ route('employee.store')}}" id="createForm">
              @csrf
              



              
              <div class="form-group">
                  <Label>Name :</Label>
                  <input type="text" class="form-control" name="name">
                </div>             
                <div class="form-group">
                    <Label>Email :</Label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <Label>Phone :</Label>
                    <input type="number" class="form-control" name="phone">
                </div>
                <div class="form-group">
                    <Label>Role :</Label>
                    <select name="role" class="form-control">
                        <option value="waiter">Waiter</option>
                        <option value="chef">Chef</option>
                    </select>
                </div>

                <div class="form-group">
                    <Label>Image :</Label>

                    <input type="file" class="form-control" name="image">
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



  