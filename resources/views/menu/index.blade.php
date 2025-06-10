@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('menu.create') }}" class="btn btn-success">Add Data</a>
            </div>
            <h3 class="card-title">Menu Data</h3>
          </div>




          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Image</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>



              </tr>
              </thead>
              
              <tfoot>
              <tr>
                <th>No</th>
                <th>Image</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>



              </tr>
              </tfoot>
              <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menus->firstItem() + $loop->index }}</td>
                  <td>
                    @if($menu->image)
                      <img src="{{ url('/Menu_img/'.$menu->image) }}" alt="Foto Menu" width="200px">
                    @else
                      <span>Tidak ada Foto</span>

                   @endif
                  </td>
                  <td>{{ $menu->category->name}}</td>
                  <td>{{ $menu->name }}</td>
                  <td>{{ $menu->price }}</td>
                  <td>{{ $menu->description }}</td>

                  <td>


                    <form action="{{ route('menu.destroy',$menu->id) }}" method="POST" class="delete-form" >
                      @csrf
                      @method('DELETE')


                    <a href="{{ route('menu.edit',$menu->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>




                    <button class="btn btn-danger delete-btn" type="submit"><i class="fas fa-trash"></i></button>
                  </form>
                  </td>


                </tr>
                @endforeach
                </tbody>
            </table>

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


