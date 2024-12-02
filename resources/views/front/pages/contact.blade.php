@extends('front.inc.master')

@section('title')
Contact Us
@endsection

@section('content')

    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">

          {{-- success message --}}
          @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @endif

        <form class="form" action="{{ route('front.contact.store') }}" method="POST">
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
                    <label class="form-label required-label" for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="message">Message</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
    
@endsection