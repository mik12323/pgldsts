@extends('master-layout')

@section('title',' Projects')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
    #timeOutButton{
        display: none;
    }
</style>

@section('content')
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
            <?php $i = '1';?>
            @foreach ($projectsWork as $project)
          <tr id="project">
                <th scope="row">{{ $i++}}</th>
                <td>{{ $project->referenceNumber }}</td>
                <td>{{ $project->department->department }}</td>
                <td>{{ $project->projectName }}</td>
                <td>{{ $project->location }}</td>
                <td id="timeInDisplay"><a class="btn btn-success btn-sm" id="timeInButton">Time in</a></td>
                <td id="timeOutDisplay"><a class="btn btn-danger btn-sm" id="timeOutButton">Time out</a></td>
                <td id="projectStatus">{{ $project->status }}</td>
            @endforeach

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
            <th scope="col">Time in</th>
            <th scope="col">Time out</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        {{-- <tbody>
            @foreach ($projectDone as $project)
          <tr id="project">
                <th scope="row">{{ $projectDone->id }}</th>
                <td>{{ $projectDone->department_id }}</td>
                <td>{{ $projectDone->projectname }}</td>
                <td>{{ $projectDone->referenceNumber }}</td>
                <td>{{ $projectDone->location }}</td>
                <td id="timeInDisplay"><button class="btn btn-success btn-sm" id="timeInButton">Time in</button></td>
                <td id="timeOutDisplay"><button disabled class="btn btn-danger btn-sm" id="timeOutButton">Time out</button></td>
                <td id="projecttatus">Not yet started</td>
            @endforeach

          </tr>
        </tbody> --}}
      </table>
</div>

{{-- <div class="container mt-5 p-5 bg-light"> --}}

{{-- </div> --}}

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

        timeInDisplay.innerText = current_date +" "+ current_time;
        // projectStatus.innerText = 'Ongoing';
        // projectStatus.style.color = 'blue';
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

        timeOutDisplay.innerText = current_date +" "+ current_time;

        projectStatus.style.color = 'red';
        // project.remove();

    });
</script>

@endsection


