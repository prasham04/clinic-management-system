@if (!(request()->is('/')))
    <div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('front.home') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">doctors</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>
@endif

