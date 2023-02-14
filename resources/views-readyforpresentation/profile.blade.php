@extends('master-layout')

@section('title','Messages')

@section('content')

<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $data['fname'] }}  {{ $data['lname'] }}</h5>
              <p class="text-muted mb-1">{{ $data->department->department }}</p>
              <p class="text-muted mb-4">{{ $data->office->office }}</p>
            </div>
          </div>


        <div class="col">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $data['fname'] }} {{ $data['lname'] }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $data['email'] }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile Number</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $data['phoneNumber'] }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="m-1">Date of Birth</p>
                </div>
                <div class="col-sm-1">
                  <p class="text-muted my-1">{{ $data['dob'] }}</p>
                </div>
                <div class="col">
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
  </section>


@endsection
