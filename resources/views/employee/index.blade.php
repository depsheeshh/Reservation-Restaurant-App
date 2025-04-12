@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('employee.create') }}" class="btn btn-success">Add Data</a>
            </div>
            <h3 class="card-title">Employee Data</h3>
          </div>








          <!-- /.card-header -->
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>







              </tr>
              </thead>
              
              <tfoot>
              <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>






              </tr>
              </tfoot>
              <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employees->firstItem() + $loop->index }}</td>
                    <td>
                        @if($employee->image)
                          <img src="{{ url('/Employees_img/'.$employee->image) }}" alt="Foto Employee" width="200px">
                        @else

                          <span>Tidak ada Foto</span>

    
                       @endif
                      </td>

                  <td>{{ $employee->name }}</td>
                  <td>{{ $employee->email }}</td>
                  <td>{{ $employee->phone }}</td>
                  <td>{{ $employee->role }}</td>


                  <td>


                    <form action="{{ route('employee.destroy',$employee->id) }}" method="POST" class="delete-form" >
                      @csrf
                      @method('DELETE')






                    <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>







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


