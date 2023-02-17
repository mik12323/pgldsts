@extends('master-layout')
@section('title','Home')
<style>
    body{
        background-image: url('img/capitol.png');
        background-repeat: no-repeat;

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

<div class="card-deck d-flex m-4 p-4">

      <div class="card-body border border-dark border-4 m-5 p-5 text-center">
        <h1 class="card-title py-3 ">{{ $projectsAvailable }}</h1>
        <h5 class="card-text py-1"><u>Available Projects</u></h5>
      </div>
      <div class="card-body border border-dark border-4 m-5 p-5 text-center">
        <h1 class="card-title py-3">{{ $projectsOngoing }}</h1>
        <h5 class="card-text py-1"><u>Ongoing Projects</u></h5>
      </div>
      <div class="card-body border border-dark border-4 m-5 p-5 text-center">
        <h1 class="card-title py-3">{{ $projectsDone }}</h1>
        <h5 class="card-text py-1"><u>Finished Projects</u></h5>
      </div>

</div>

    {{-- <div class="container-fluid text-center bg-secondary p-2">
        <h5>Number of projects: {{ $projects }}</h5>
    </div> --}}

  {{-- <h4>Current number of projects as of now: {{ $projects }}</h4> --}}






@endsection
