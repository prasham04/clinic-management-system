@extends('admin.inc.master')

@section('title')
 Add User
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"> Add User Form</h3>
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

            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <label for="">Name</label>
                <input class="form-control form-control" type="text" name="name" value="{{ old('name') }}">
                <br>
                <label for="">Email</label>
                <input class="form-control form-control" type="text" name="email" value="{{ old('email') }}">
                <br>
                <label for="">Phone</label>
                <input class="form-control form-control" type="phone" name="phone" value="{{ old('phone') }}">
                <br>
                <label for="">Password</label>
                <input class="form-control form-control" type="password" name="password">
                <br>
                <label for="">Confirm Password</label>
                <input class="form-control form-control" type="password" name="password_confirmation">
                <br>
                <input class="btn btn-primary" type="submit">
            </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>

</div>
@endsection