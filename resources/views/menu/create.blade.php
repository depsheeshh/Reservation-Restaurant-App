@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">



<form class="user" method="POST" action="{{ route('menu.store')}}" id="createForm" enctype="multipart/form-data">

              @csrf
              
              
              <div class="form-group">
                  <Label>Name :</Label>
                  <input type="text" class="form-control" name="name">
                </div>           

                <div class="form-group">
                  <Label>Category :</Label>
                  <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                    <Label>Price :</Label>
                    <input type="number" class="form-control" name="price">
                </div>
                
                
                <div class="form-group">
                    <Label>Description :</Label>
                    <input type="text" class="form-control" name="description">
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
