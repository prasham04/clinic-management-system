@extends('front.inc.master')

@section('title')
Make An Appointment with {{ $doctor->name }}
@endsection

@section('content')

    <div class="d-flex flex-column gap-3 details-card doctor-details">
        <div class="details d-flex gap-2 align-items-center">
            <img src="{{ asset('images/doctors/' . $doctor->image) }}" alt="doctor" class="img-fluid rounded-circle" height="150"
                width="150">
            <div class="details-info d-flex flex-column gap-3 ">
                <h4 class="card-title fw-bold">{{ $doctor->name }}</h4>
                <div class="d-flex gap-3 align-bottom">
                    <ul class="rating">
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                    </ul>
                    <a href="#" class="align-baseline">submit rating</a>
                </div>
                <h6 class="card-title fw-bold">{{ $doctor->major->title }}</h6>
            </div>
        </div>
        <hr />

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>  
        </div>          
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>            
        @endif
        <form class="form" action="{{ route('front.booking', $doctor) }}" method="POST">
            @csrf
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="date">Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>

    </div>

@endsection