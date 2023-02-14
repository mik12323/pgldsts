@extends('master-layout')
@section('title', 'Add Project')

@section('content')

<style>
    #timeOutButton{
        display: none;
    }
</style>

<div class="container mt-5 p-5 justify-content-center bg-light">

    <h4>Projects Available for {{ $data->department->department }}</h4>
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
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            {{-- @dd($projectsWork->department->department) --}}
            <?php $i = '1';?>
            @foreach ($projectsWork as $project)
          <tr id="project">
                <th scope="row">{{ $i++}}</th>
                <td>{{ $project->referenceNumber }}</td>
                <td>{{ $project->department->department }}</td>
                <td>{{ $project->projectName }}</td>
                <td>{{ $project->location }}</td>
                <td id="timeInDisplay"><a class="timeInButton btn btn-success btn-sm" id="timeInButton">Time in</a></td>
                <td id="timeOutDisplay"><a class="btn btn-danger btn-sm" id="timeOutButton">Time out</a></td>
                <td id="projectStatus">{{ $project->status }}</td>
            @endforeach

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
            <label for="projectname" class="form-label">File Name:</label>
            <input type="text" name="projectname" class="form-control sm" value="{{ old('projectname') }}">
            <div class="span text-danger">@error('projectname') {{ $message }} @enderror</div>
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

<script>
    const timeOutButton = document.getElementById('timeOutButton');
    const timeInButton = document.getElementById('timeInButton');
    const timeInDisplay = document.getElementById('timeInDisplay');
    const timeOutDisplay = document.getElementById('timeOutDisplay');
    const projectStatus= document.getElementById('projectStatus');
    const project = document.getElementById('project');

    timeInButton.addEventListener("click", (e)=> {
        let today = new Date();
        let month = today.getMonth() +1;
        let year = today.getFullYear();
        let date = today.getDate();
        let current_date = `${year}-${month}-${date}`;

        let hours = (today.getHours()===0)? 24:today.getHours();
        let minutes = today.getMinutes();
        let seconds = today.getSeconds();
        let current_time = `${hours}:${minutes}:${seconds}`;
        let timeIn = current_date +" "+ current_time;
        timeInDisplay.innerText = timeIn;
        timeOutButton.style.display = "block";

    });
    timeOutButton.addEventListener("click", (e)=> {
        event.preventDefault()


        let today = new Date();
        let month = today.getMonth() +1;
        let year = today.getFullYear();
        let date = today.getDate();
        let current_date = `${year}-${month}-${date}`;

        let hours = (today.getHours()===0)? 24:today.getHours();
        let minutes = today.getMinutes();
        let seconds = today.getSeconds();
        let current_time = `${hours}:${minutes}:${seconds}`;
        let timeOut = current_date +" "+ current_time;
        timeOutDisplay.innerText = timeOut;

        // projectStatus.style.color = 'red';
        // project.remove();

    });
</script>


@endsection
