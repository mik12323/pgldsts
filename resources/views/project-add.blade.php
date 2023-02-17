@extends('master-layout')
@section('title', 'Projects')

@section('content')



<div class="container mt-5 p-5 justify-content-center bg-light table-responsive">

    <h4>Projects <span class="text-success">Available</span> for you</h4>
    <table class="table table-bordered bg-light text-center">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Reference No.</th>
            <th scope="col">Department</th>
            <th scope="col">Project Name</th>
            <th scope="col">Location</th>
            <th scope="col">Time in</th>
            <th scope="col">Time out</th>
            {{-- <th scope="col">Status</th> --}}
          </tr>
        </thead>
        <tbody>
            {{-- @dd($projectsWork->department->department) --}}
            <?php $i = '1';?>
            {{-- @foreach ($projectsWork as $project) --}}
          <tr id="project">
                @if ($projectAvailable==null || $projectForMe==null)
                @else
                <th scope="row">{{ $i++}}</th>
                <td>{{ $projectForMe->referenceNumber }}</td>
                <td>{{ $projectForMe->department->department }}</td>
                <td>{{ $projectForMe->projectName }}</td>
                <td>{{ $projectForMe->location }}</td>

                {{-- @dd($transactions) --}}
                <form id="timeInForm" action="{{ route('addTransaction') }}" method="POST">
                    @csrf
                    <input type="hidden" name="project_id" id="project_id" value="{{ $projectForMe->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ $data->id }}">
                    <input type="hidden" name="department_id" id="department_id" value="{{ $projectForMe->department->id }}">
                    <input type="hidden" name="office_id" id="office_id" value="{{ $projectForMe->office->id }}">
                    <input type="hidden" name="activity_id" id="activity_id" value="{{ $data->office_id }}">
                    <input type="hidden" name="timeIn" id="timeInDisplay">
                    {{-- <input type="hidden" name="timeOut" id="timeOutDisplay"> --}}
                    <input type="hidden" name="status" id="status" value="{{ $projectForMe->status }}">
                    {{-- @dd($transactions=='[]') --}}
                    @if ($transactions!=null)
                    <td id="timeIn">{{ $transactions->timeIn }}</td>
                    @else
                    <td id="timeIn"><button type="submit" class="btn btn-success btn-sm" id="timeInButton">Time in</button></td>
                    @endif

                    {{-- <td id="timeOut"><button type="submit" class="btn btn-danger btn-sm" id="timeOutButton">Time out</button></td> --}}
                </form>
                {{-- <td id="projectStatus">{{ $project->status }}</td> --}}
                <form id="timeOutForm" action="{{ route('timeOutButton') }}" method="POST">
                    @csrf

                    <input type="hidden" name="project_id" id="project_id" value="{{ $projectForMe->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ $data->id }}">
                    <input type="hidden" name="department_id" id="department_id" value="{{ $projectForMe->department->id }}">
                    <input type="hidden" name="office_id" id="office_id" value="{{ $projectForMe->office->id }}">
                    <input type="hidden" name="activity_id" id="activity_id" value="{{ $data->office_id }}">

                    @if ($transactions!=null)
                    <input type="hidden" name="timeIn" id="timeInDisplay" value="{{ $transactions->timeIn }}">
                    @else
                    @endif
                    <input type="hidden" name="timeOut" id="timeOutDisplay">
                    <input type="hidden" name="status" id="status" value="{{ $projectForMe->status }}">
                    <td id="timeOut"><button type="submit" class="btn btn-danger btn-sm" id="timeOutButton">Time out</button></td>
                    {{-- @dd($transaction->timeOut) --}}
                    {{-- @dd($project->id) --}}
                </form>
                {{-- @endforeach --}}
                @endif
          </tr>
        </tbody>
      </table>

      <h4>Previous project</h4>
      <table class="table table-bordered bg-light text-center">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Reference No.</th>
              <th scope="col">Department</th>
              <th scope="col">Project Name</th>
              <th scope="col">Location</th>
              {{-- <th scope="col">Time in</th> --}}
              {{-- <th scope="col">Time out</th> --}}
            </tr>
          </thead>
          <tbody>
              <?php $i = '1';?>
              @if ($projectsDone==null)
              @else
              @foreach ($projectsDone as $project)
            <tr id="project">
                  <th scope="row">{{ $i++ }}</th>
                  <td>{{ $project->referenceNumber }}</td>
                  <td>{{ $project->department->department }}</td>
                  <td>{{ $project->projectName }}</td>
                  <td>{{ $project->location }}</td>
                  {{-- <td id="timeInDisplay"></td>
                  <td id="timeOutDisplay"></td> --}}
              @endforeach
                @endif
            </tr>
          </tbody>
        </table>

    <form action="{{ route('project-store') }}" method="POST">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        @csrf


        <div class="col-auto mb-3">
            <label for="projectName" class="form-label">File Name:</label>
            <input type="text" name="projectName" class="form-control sm" value="{{ old('projectName') }}">
            <div class="span text-danger">@error('projectName') {{ $message }} @enderror</div>
        </div>
        <div class="col-auto mb-3">
            <label for="referenceNumber" class="form-label">Reference Number:</label>
            <input type="number" name="referenceNumber" class="form-control sm" value="{{ old('referenceNumber') }}">
            <div class="span text-danger">@error('referenceNumber') {{ $message }} @enderror</div>
        </div>
        <div class="col-auto mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" name="location" class="form-control sm" value="{{ old('location') }}">
            <div class="span text-danger">@error('location') {{ $message }} @enderror</div>
        </div>
        <button class="btn btn-success btn-sm" type="submit">Add</button>
    </form>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>

    let timeOutButton = document.getElementById('timeOutButton');
    let timeInButton = document.getElementById('timeInButton');
    let timeInDisplay = document.getElementById('timeInDisplay');
    let timeOutDisplay = document.getElementById('timeOutDisplay');
    let timeIn = document.getElementById('timeIn');
    let timeOut = document.getElementById('timeOut');
    // let projectStatus= document.getElementById('projectStatus');
    // let project = document.getElementById('project');
    // let project_id = document.getElementById('project_id');
    // let user_id = document.getElementById('user_id');
    // let department_id = document.getElementById('department_id');
    // let office_id = document.getElementById('office_id');
    // let activity_id = document.getElementById('activity_id');
    // let status = document.getElementById('status');


    $(document).ready(function() {

        $('#timeInForm').submit(function(e) {

            let today = new Date();
            let month = today.getMonth()+1;
            let year = today.getFullYear();
            let date = today.getDate();
            let current_date = `${year}-${month}-${date}`;

            let hours = (today.getHours()===0)? 24:today.getHours();
            let minutes = today.getMinutes();
            let seconds = today.getSeconds();
            let current_time = `${hours}:${minutes}:${seconds}`;
            let timeInDate = current_date +" "+ current_time;
            // timeOutButton.style.display = "block";
            timeInButton.style.display = "none";
            // console.log(timeInDate);
            timeInDisplay.value = timeInDate;
            timeIn.innerHTML = timeInDate;
            // e.preventDefault();
});

        $('#timeOutForm').submit(function(e) {
                // e.preventDefault()
            let today = new Date();
            let month = today.getMonth()+1;
            let year = today.getFullYear();
            let date = today.getDate();
            let current_date = `${year}-${month}-${date}`;

            let hours = (today.getHours()===0)? 24:today.getHours();
            let minutes = today.getMinutes();
            let seconds = today.getSeconds();
            let current_time = `${hours}:${minutes}:${seconds}`;
            let timeOutDate = current_date +" "+ current_time;
            timeOutDisplay.value = timeOutDate;
            timeOut.innerHTML = timeOutDate;
            // console.log(timeOutDisplay.value)
            // e.preventDefault()
        });



    });



</script>




@endsection
