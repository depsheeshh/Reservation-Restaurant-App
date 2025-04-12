@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Review Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">




            <form class="user" method="POST"  action="{{ route('review.store')}}" id="createForm">
              @csrf
              <div class="form-group">
              <Label>Name :</Label>
              <input type="text" class="form-control" name="name">
              </div>





              <div class="form-group">
              <Label>Menu :</Label>
              <select class="form-control" name="menu_id">
                @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
              </select>
              </div>
       




              <div class="form-group">
              <Label>Rating :</Label>
              <input type="number" class="form-control" name="rating">
              </div>




              <div class="form-group">
              <Label>Comment :</Label>
              <input type="text" class="form-control" name="comment">
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



  