@extends('admin.inc.master')

@section('title')
 Edit User
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title"> Edit User Form</h3>
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

            <form action="{{ route('admin.user.update', $user) }}" method="POST">
                @csrf
                @method('put')
                <label for="">Name</label>
                <input class="form-control form-control" type="text" name="name" value="{{ $user->name }}">
                <br>
                <label for="">Email</label>
                <input class="form-control form-control" type="text" name="email" value="{{ $user->email }}">
                <br>
                <label for="">Phone</label>
                <input class="form-control form-control" type="phone" name="phone" value="{{ $user->phone }}">
                <br>
                <label for="">Password</label>
                <input class="form-control form-control" type="password" name="password">
                <br>
                <label for="">Confirm Password</label>
                <input class="form-control form-control" type="password" name="password_confirmation">
                <br>
                <input class="btn btn-success" type="submit">
            </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>

</div>
@endsection