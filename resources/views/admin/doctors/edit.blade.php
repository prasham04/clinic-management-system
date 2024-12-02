@extends('admin.inc.master')

@section('title')
 Edit Doctor
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edit doctor</h3>
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('admin.doctor.update' , $doctor) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <label for="">Name</label>
          <input class="form-control form-control" type="text" name="name" value="{{ $doctor->name }}">
          <br>
          <div class="form-group">
            <label>Major</label>
            <select class="form-control" name="major_id">
                @foreach ($majors as $major)
                <option value="{{ $major->id }}" @if ($major->id == $doctor->major_id) selected @endif >{{ $major->title }}</option>                            
                @endforeach                      
            </select>
          </div>
          <label for="">Image</label>
          <br>
          <img src="{{ asset('images/doctors/' . $doctor->image) }}" alt="" style="height: 150px;width: 150px;">                                
          <input class="form-control form-control mt-3" type="file" name="image" >
          <br>
          <input class="btn btn-primary" type="submit">
      </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>

</div>
@endsection