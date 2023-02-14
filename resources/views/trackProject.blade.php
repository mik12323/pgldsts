@extends('master-layout')

@section('title', 'Track a Document')

@section('content')

<div class="container text-center mt-5 table-responsive">
    {{-- @dd($projects->projectname) --}}
    <h4>Tracking Slip for By {{ $projects->department->department }}</h4>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Project Name</th>
            <th scope="col">Reference No.</th>
            <th scope="col">Location</th>
          </tr>
        </thead>
        <tbody>
          <tr id="project">
            {{-- @foreach ($projects as $project) --}}
            <td>{{ $projects->projectName }}</td>
            <td>{{ $projects->referenceNumber }}</td>
            <td>{{ $projects->location }}</td>

            {{-- @endforeach --}}

          </tr>
        </tbody>
    </table>
    <ul class="list-group list-group-horizontal mb-5 pb-5   ">
        {{-- @dd($project) --}}

        <table class="table table-bordered bg-info border-dark mt-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ACTIVITIES</th>
                <th scope="col">RESPONSIBLE OFFICE</th>
                <th scope="col">DATE & TIME IN</th>
                <th scope="col">DATE & TIME OUT</th>
                <th scope="col">ALLOWABLE TIME</th>
                <th scope="col">REMARKS</th>
              </tr>
            </thead>

            <tbody>


                <?php $i = '1';?>
                @foreach ($transactions as $transaction)
                @if ($transaction->timeOut == '00-00-00 00:00:00')
                    @continue
                @endif
                <tr class="project">
                    {{-- @dd($transaction->office) --}}
                    <th scope="row">{{ $i++}}</th>
                    <td>{{$transaction->activity->activityName}}</td>
                    <td>{{ $transaction->user->office->office }}</td>
                    <td id="timeIn">{{ $transaction->timeIn }}</td>
                    <td id="timeOut">{{ $transaction->timeOut }}</td>
                    <td></td>
                    <td></td>

                </tr>
                @endforeach




            </tbody>
          </table>


    </ul>
</div>







@endsection
