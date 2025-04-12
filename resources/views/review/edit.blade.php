@extends('layout')
@section('content')
<div class="col-lg-8 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">Edit Review</h6>


                </div>
                <div class="card-body">
				
  <form class="user" method="POST" action="{{ route('review.update', $review->id)}}" enctype="multipart/form-data" id="editForm">
  @csrf
  @method('PUT')
          <input type="hidden" name="id" value="{{ $review->id }}">




          <div class="form-group">
          <Label>Name :</Label>
          <input type="text" class="form-control" name="name" value="{{$review->name}}">
          </div>




  <div class="form-group">
  <Label>Menu :</Label>
  <select name="menu_id" class="form-control">
    @foreach ($menus as $menu)
        <option value="{{ $menu->id }}" {{ $review->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>

    @endforeach


  </select>
  </div>


  <div class="form-group">
  <Label>Rating :</Label>
  <input type="number" class="form-control" name="rating" value="{{$review->rating}}">
  </div>



  <div class="form-group">
  <Label>Comment :</Label>
  <input type="text" class="form-control" name="comment" value="{{$review->comment}}">
  </div>





          
        <center><button type="submit" class="btn btn-primary">Update</button></center>
                    
                    


                  </form>
                  
                </div>
              </div>
            </div>
            @endsection
