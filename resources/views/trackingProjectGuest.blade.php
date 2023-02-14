@extends('master-layout')

@section('title', 'Track a Document')

@section('content')

<div class="container text-center mt-5 table-responsive">
    {{-- @dd($projects->projectname) --}}
    <h4>Tracking Slip for By {{ $projects->department->department }}</h4>
    <table class="table table-bordered">
        <thead>
          <tr>
              <th scope="col">Reference No.</th>
            <th scope="col">Project Name</th>
            <th scope="col">Department</th>
            <th scope="col">Current Office</th>
            <th scope="col">Responsible Officer</th>
            <th scope="col">Location</th>
          </tr>
        </thead>
        <tbody>
          <tr id="project">
            {{-- @foreach ($transactions as $transaction) --}}
            {{-- @dd($transactions[$projects->status-2]->user->office->office) --}}
            {{-- @foreach ($projects as $project) --}}
            {{-- @dd($offices) --}}
            {{-- @dd($transactions->user) --}}
            <td>{{ $projects->referenceNumber }}</td>
            <td>{{ $projects->projectName }}</td>
            <td>{{ $projects->department->department }}</td>
            <td>{{ $offices->office}}</td>
            <td>{{ $transactions->user->fname }} {{ $transactions->user->lname }}</td>
            <td>{{ $projects->location }}</td>

            {{-- @endforeach --}}

          </tr>
        </tbody>
    </table>
    <a href="{{ route('tracking-guest') }}" class="btn btn-primary btn-md">Track Again</a>



@endsection
