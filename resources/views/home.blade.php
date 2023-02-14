@extends('master-layout')
@section('title','Home')
<style>
    body{
        background-image: url('img/capitol.png');
        background-repeat: no-repeat;

    }

    .imgCard{
        overflow: hidden;
    }

    img{
        transition: transform 0.5s;
    }

    .imgCard:hover{
        transform: scale(1.02);
        /* transition: transform .5s ease; */
    }
</style>
@section('content')
{{-- Showcase --}}
<section class="bg-dark text-light text-center p-3">
    <div class="container p-1">
        <img src="{{ asset('img/capitol_logo_home.png') }}" class="img-responsive mb-2" alt="">
        <h2>You can <span style="color:#ff7260">track</span> documents here</h2>
        @if (Session::has('loginId'))
        <a href="{{ route('tracking-admin') }}" class="btn btn-primary mt-3">Track</a>
        @else
        <a href="{{ route('tracking-guest') }}" class="btn btn-primary mt-3">Track</a>
        @endif

    </div>
</section>

{{-- <div class="card-group m-4 p-4 text-center">
    <div class="card m-2">
        <img class="imgCard card-img-top" src="{{ asset('/img/SirOte.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><u>Provincial Engineer</u></h5>
            <p class="card-text">Engr. Dimasira A. Macabando, Jr., Ph. D.</p>
        </div>
    </div>
    <div class="card m-2">
        <img class="imgCard card-img-top" src="{{ asset('img/gov.png') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><u>Governor</u></h5>
          <p class="card-text">Gov. Dr. Mamintal Alonto Adiong Jr.</p>
        </div>
      </div>
    <div class="card m-2">
      <img class="imgCard card-img-top" src="{{ asset('img/sirjopet.png') }}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><u>Assistant Provincial Engineer</u></h5>
        <p class="card-text">Engr. Jopet Usman</p>
      </div>
    </div>

</div> --}}

    {{-- <div class="container-fluid text-center bg-secondary p-2">
        <h5>Number of projects: {{ $projects }}</h5>
    </div> --}}

  {{-- <h4>Current number of projects as of now: {{ $projects }}</h4> --}}






@endsection
