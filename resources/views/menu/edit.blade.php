@extends('layout')
@section('content')
  <div class="col-lg-8 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" align="center">Data Menu</h6>
    </div>
    <div class="card-body">

      <form class="user" method="POST" enctype="multipart/form-data" action="{{ route('menu.update', $menu->id) }}"
      id="editForm">
      @csrf
      @method('PUT')



      <div class="form-group">
        <Label>Name :</Label>
        <input type="text" class="form-control" name="name" value="{{ $menu->name }}">
        @error('name')
      <span class="text-danger">{{ $message }}</span>

      @enderror
      </div>

      <div class="form-group">
        <Label>Category :</Label>
        <select name="category_id" class="form-control">
        @foreach ($categories as $category)

      <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
        {{ $category->name }}</option>
      @endforeach
        </select>

        @error('category_id')
      <span class="text-danger">{{ $message }}</span>
      @enderror

      </div>

      <div class="form-group">
        <Label>Price :</Label>
        <input type="text" class="form-control" name="price" value="{{ $menu->price }}">
        @error('price')
      <span class="text-danger">{{ $message }}</span>

      @enderror
      </div>

      <div class="form-group">
        <Label>Description :</Label>
        <input type="text" class="form-control" name="description" value="{{ $menu->description }}">
        @error('description')
      <span class="text-danger">{{ $message }}</span>

      @enderror
      </div>


      <div class="form-group">
        <label for="">Image :</label>
        <input type="file" class="form-control" name="image" value="{{ $menu->image }}">
        @error('image')


      <span class="text-danger">{{ $message }}</span>
      @enderror
      </div>


      <center><button type="submit" class="btn btn-primary">Update</button></center>


      </form>

    </div>
    </div>
  </div>
@endsection