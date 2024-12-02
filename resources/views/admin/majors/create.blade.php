@extends('admin.inc.master')

@section('title')
 Create major
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"> Create Major Form</h3>
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

            <form action="{{ route('admin.major.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Title</label>
                <input class="form-control form-control" type="text" name="title" value="{{ old('title') }}">
                <br>
                <label for="">Image</label>
                <input class="form-control form-control" type="file" name="image">
                <br>
                <input class="btn btn-primary" type="submit">
            </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>

</div>
@endsection