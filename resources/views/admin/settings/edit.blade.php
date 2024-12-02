@extends('admin.inc.master')

@section('title')
Settings
@endsection


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"> Home page</h3>
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

          {{-- success message --}}
          @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @endif

          <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <h3>Hero Section:</h3>
              <label for="">Image</label>
              <br>
              <img src="{{ asset('images/settings/' . settings('hero_image'))  }}" alt="" style="width: 200px;margin-bottom:20px;">                                
              <input class="form-control form-control" type="file" name="hero_image">
              <label for="">Title</label>
              <input class="form-control form-control" type="text" name="hero_title" value="{{ settings('hero_title') }}">
              <br>
              <label for="">Description</label>
              <textarea class="form-control form-control" name="hero_description" cols="30" rows="8">{{ settings('hero_description') }}</textarea>              
              <hr>

              <h3>Services cards:</h3>
              <label for="">Service 1 image:</label>
              <br>
              <img src="{{ asset('images/settings/' . settings('service_image_1'))  }}" alt="" style="width: 50px;margin-bottom:20px;">
              <input class="form-control form-control" type="file" name="service_image_1">
              <br>
              <label for="">Service 1 title:</label>
              <input class="form-control form-control" type="text" name="service_title_1" value="{{ settings('service_title_1') }}">
              <br>
              <label for="">Service 1 description:</label>
              <textarea class="form-control form-control" name="service_description_1" cols="30" rows="8">{{ settings('service_description_1') }}</textarea>              
              <br>

              <label for="">Service 2 image:</label>
              <br>
              <img src="{{ asset('images/settings/' . settings('service_image_2'))  }}" alt="" style="width: 50px;margin-bottom:20px;">
              <input class="form-control form-control" type="file" name="service_image_2">
              <br>
              <label for="">Service 2 title:</label>
              <input class="form-control form-control" type="text" name="service_title_2" value="{{ settings('service_title_2') }}">
              <br>
              <label for="">Service 2 description:</label>
              <textarea class="form-control form-control" name="service_description_2" cols="30" rows="8">{{ settings('service_description_2') }}</textarea>              
              <br>
              
              <label for="">Service 3 image:</label>
              <br>
              <img src="{{ asset('images/settings/' . settings('service_image_3'))  }}" alt="" style="width: 50px;margin-bottom:20px;">
              <input class="form-control form-control" type="file" name="service_image_3">
              <br>
              <label for="">Service 3 title:</label>
              <input class="form-control form-control" type="text" name="service_title_3" value="{{ settings('service_title_3') }}">
              <br>
              <label for="">Service 3 description:</label>
              <textarea class="form-control form-control" name="service_description_3" cols="30" rows="8">{{ settings('service_description_3') }}</textarea>              
              <br>

              <label for="">Service 4 image:</label>
              <br>
              <img src="{{ asset('images/settings/' . settings('service_image_4'))  }}" alt="" style="width: 50px;margin-bottom:20px;">
              <input class="form-control form-control" type="file" name="service_image_4">
              <br>
              <label for="">Service 4 title:</label>
              <input class="form-control form-control" type="text" name="service_title_4" value="{{ settings('service_title_4') }}">
              <br>
              <label for="">Service 4 description:</label>
              <textarea class="form-control form-control" name="service_description_4" cols="30" rows="8">{{ settings('service_description_4') }}</textarea>              
              <hr>

              <h3>App Section:</h3>
              <label for="">Image</label>
              <br>
              <img src="{{ asset('images/settings/' . settings('app_image'))  }}" alt="" style="width: 200px;margin-bottom:20px;">                                
              <input class="form-control form-control" type="file" name="app_image">
              <label for="">Title</label>
              <input class="form-control form-control" type="text" name="app_title" value="{{ settings('app_title') }}">
              <br>
              <label for="">Description</label>
              <textarea class="form-control form-control" name="app_description" cols="30" rows="8">{{ settings('app_description') }}</textarea>              
              <hr>

              <h3>Footer:</h3>               
              <label for="">Title</label>
              <input class="form-control form-control" type="text" name="footer_title" value="{{ settings('footer_title') }}">
              <br>
              <label for="">Description</label>
              <textarea class="form-control form-control" name="footer_description" cols="30" rows="8">{{ settings('footer_description') }}</textarea>              
              <hr>

              <input class="btn btn-primary" type="submit">
          </form>
      </div>
      <!-- /.card-body -->
    </div>
</div>

</div>

@endsection