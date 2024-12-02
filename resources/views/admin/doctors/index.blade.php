@extends('admin.inc.master')

@section('title')
 Doctors 
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Doctors</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('admin.doctor.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>  Add Doctor
                </a>

                {{-- success message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Major</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($doctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>
                                <img src="{{ asset('images/doctors/' . $doctor->image)  }}" alt="" style="height: 150px;width: 150px;">                                
                            </td>
                            <td>{{ $doctor->major->title}}</td>
                            <td>
                                <a href="{{ route('admin.doctor.edit', $doctor) }}" class="btn btn-success">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.doctor.destroy', $doctor ) }}" method="POST" class="d-inline">                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>there is no data</p>                        
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{-- <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul> --}}
                {{ $doctors->links() }}
              </div>
            </div>
            <!-- /.card -->
          </div>         
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

