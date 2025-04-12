@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('review.create') }}" class="btn btn-success">Add Data</a>
            </div>
            <h3 class="card-title">Review Data</h3>
          </div>





          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Menu</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Action</th>




              </tr>
              </thead>
              
              <tfoot>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Menu</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Action</th>





              </tr>
              </tfoot>
              <tbody>
                @foreach ($reviews as $review)
                <tr>
                  <td>{{ $reviews->firstItem() + $loop->index }}</td>
                  <td>{{ $review->name }}</td>
                  <td>{{ $review->menu->name }}</td>
                  <td>{{ $review->rating }}</td>
                  <td>{{ $review->comment }}</td>




                  <td>


                    <form action="{{ route('review.destroy',$review->id) }}" method="POST" class="delete-form" >
                      @csrf
                      @method('DELETE')



                    <a href="{{ route('review.edit',$review->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>




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


