@extends('master-layout')

@section('title',' Projects')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

</style>

@section('content')
<div class="container mt-5 p-5 justify-content-center bg-light table-responsive">
    <h4>Projects <span class="text-success">Available</span> for you</h4>
    <table class="table table-bordered bg-light text-center table-responsive">
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
            <?php $i = '1';?>
            {{-- @foreach ($projectsWork as $project) --}}
          <tr id="project">
            {{-- @dd($projectsWork->status) --}}
            {{-- @dd($projectAvailable) --}}
                @if ($projectAvailable==null || $projectForMe==null)
                @else
                <th scope="row">{{ $i++}}</th>
                <td id="refNo">{{ $projectForMe->referenceNumber }}</td>
                <td>{{ $projectForMe->department->department }}</td>
                <td>{{ $projectForMe->projectName }}</td>
                <td>{{ $projectForMe->location }}</td>


                <form id="timeInForm" action="{{ route('addTransaction') }}" method="POST">
                    @csrf
                    <input type="hidden" name="project_id" id="project_id" value="{{ $projectForMe->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ $data->id }}">
                    <input type="hidden" name="department_id" id="department_id" value="{{ $projectForMe->department->id }}">
                    <input type="hidden" name="office_id" id="office_id" value="{{ $projectForMe->office->id }}">
                    <input type="hidden" name="activity_id" id="activity_id" value="{{ $projectForMe->status }}">
                    <input type="hidden" name="timeIn" id="timeInDisplay">
                    {{-- <input type="hidden" name="timeOut" id="timeOutDisplay"> --}}
                    <input type="hidden" name="status" id="status" value="{{ $projectForMe->status }}">
                    {{-- @dd($transactions) --}}
                    @if ($transactions!=null)
                    <td id="timeIn">{{ $transactions->timeIn }}</td>
                    @else
                    <td id="timeIn"><button type="submit" class="btn btn-success btn-sm" id="timeInButton">Time in</button></td>
                    @endif
                    {{-- <td id="timeIn">{{ $transactions->timeIn }}</td> --}}

                    {{-- <td id="timeOut"><button type="submit" class="btn btn-danger btn-sm" id="timeOutButton">Time out</button></td> --}}
                </form>
                {{-- <td id="projectStatus">{{ $project->status }}</td> --}}
                <form id="timeOutForm" action="{{ route('timeOutButton') }}" method="POST">
                    @csrf

                    <input type="hidden" name="project_id" id="project_id" value="{{ $projectForMe->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ $data->id }}">
                    <input type="hidden" name="department_id" id="department_id" value="{{ $projectForMe->department->id }}">
                    <input type="hidden" name="office_id" id="office_id" value="{{ $projectForMe->office->id }}">
                    <input type="hidden" name="activity_id" id="activity_id" value="{{ $projectForMe->status }}">
                    {{-- @dd($transactions) --}}
                    {{-- <input type="hidden" name="timeIn" id="timeInDisplay" value="{{ $transactions->timeIn }}"> --}}
                    @if ($transactions!=null)
                    <td id="timeOut"><button type="submit" class="btn btn-danger btn-sm" id="timeOutButton">Time out</button></td>
                    <input type="hidden" name="timeIn" id="timeInDisplay" value="{{ $transactions->timeIn }}">
                    <input type="hidden" name="timeOut" id="timeOutDisplay" value="{{ $transactions->timeOut }}">
                    @else
                    @endif
                    <input type="hidden" name="status" id="status" value="{{ $projectForMe->status }}">
                </form>
                {{-- <td id="projectStatus">{{ $project->status }}</td> --}}
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
            @if ($projectAvailable=='[]')

            @else
            @foreach ($projectsDone as $project)
          <tr id="project">
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $project->referenceNumber }}</td>
                <td>{{ $project->department->department }}</td>
                <td>{{ $project->projectName }}</td>
                <td>{{ $project->location }}</td>
                {{-- <td id="timeInDisplay"></td> --}}
                {{-- <td id="timeOutDisplay"></td> --}}
            @endforeach
            @endif
          </tr>
        </tbody>
      </table>
</div>

{{-- <div class="container mt-5 p-5 bg-light"> --}}

{{-- </div> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">

    let timeOutButton = document.getElementById('timeOutButton');
    let timeInButton = document.getElementById('timeInButton');
    let timeInDisplay = document.getElementById('timeInDisplay');
    let timeOutDisplay = document.getElementById('timeOutDisplay');
    let timeIn = document.getElementById('timeIn');
    let timeOut = document.getElementById('timeOut');

    $(document).ready(function() {

        $('#timeInForm').submit(function(e) {
            // e.preventDefault();
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


