@extends('admin.inc.master')

@section('title')
 Edit major
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edit major</h3>
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

      <form action="{{ route('admin.major.update' , $major) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <label for="">Title</label>
          <input class="form-control form-control" type="text" name="title" value="{{ $major->title }}">
          <br>
          <label for="">Image</label>
          <br>
          <img src="{{ asset('images/majors/' . $major->image) }}" alt="" style="height: 150px;width: 150px;">                                
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