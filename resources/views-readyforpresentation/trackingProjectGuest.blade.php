@extends('master-layout')

@section('title', 'Track a Document')

@section('content')

<div class="container text-center mt-5">
    {{-- @dd($projects->projectname) --}}
    <h4>Tracking Slip for By {{ $projects->department->department }}</h4>
    <table class="table table-bordered">
        <thead>
          <tr>
              <th scope="col">Reference No.</th>
            <th scope="col">Project Name</th>
            <th scope="col">Current Department</th>
            <th scope="col">Location</th>
          </tr>
        </thead>
        <tbody>
          <tr id="project">
            {{-- @foreach ($projects as $project) --}}
            <td>{{ $projects->referenceNumber }}</td>
            <td>{{ $projects->projectName }}</td>
            <td>{{ $projects->department->department }}</td>
            <td>{{ $projects->location }}</td>

            {{-- @endforeach --}}

          </tr>
        </tbody>
    </table>
    <a href="{{ route('tracking-guest') }}" class="btn btn-primary btn-md">Track Again</a>



@endsection
