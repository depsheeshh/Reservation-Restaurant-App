@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Category Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">




            <form class="user" method="POST"  action="{{ route('category.store')}}" id="createForm">
              @csrf
              

              
              <div class="form-group">
                  <Label>Name :</Label>
                  <input type="text" class="form-control" name="name">
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



  