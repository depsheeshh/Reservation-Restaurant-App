@extends('layout')
@section('content')
<div class="col-lg-8 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">Data Category</h6>
                </div>
                <div class="card-body">
				

  <form class="user" method="POST" action="{{ route('category.update', $category->id)}}" enctype="multipart/form-data" id="editForm">
  @csrf
  @method('PUT')

          <input type="hidden" name="id" value="{{ $category->id }}">



  <div class="form-group">
  <Label>Name :</Label>
  <input type="text" class="form-control" name="name" value="{{$category->name}}">
  </div>



   </div>


          
        <center><button type="submit" class="btn btn-primary">Update</button></center>
                    
                    


                  </form>
                  
                </div>
              </div>
            </div>
            @endsection
