@extends('master-layout')

@section('title', 'Track a Document')

@section('content')

<div class="container text-center mt-5">
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
              <tr id="project">

                <th scope="row">1</th>
                <td>POW, ABC, PR Alobs, DUPA & Plans Recommending for approval</td>
                <td>PEO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row">2</th>
                <td>20% DF Charging</td>
                <td>PPDO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row">3</th>
                <td>Obligation Request Approval</td>
                <td>PBO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>
              <tr id="project">

                <th scope="row">4</th>
                <td>Advertisement</td>
                <td>BAC</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td>7-21 CD</td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row">5</th>
                <td>Opening of Bids</td>
                <td>BAC</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td>1 CD</td>
                <td></td>

              </tr>
              <tr id="project">

                <th scope="row">6</th>
                <td>Bid Evaluation</td>
                <td>BAC</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td>1-7 CD</td>
                <td></td>

              </tr>
              <tr id="project">

                <th scope="row">7</th>
                <td>Post-Qualification</td>
                <td>BAC</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td>1-30 CD</td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row" rowspan="2">8</th>
                <td rowspan="2">Approval of Resolution/ Issuance of Notice of Award</td>
                <td>BAC</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td rowspan="2">2-7 CD</td>
                <td></td>
              </tr>
              <tr id="project">
                <td>PGO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
              </tr>

              <tr id="project">

                <th scope="row" rowspan="2">9</th>
                <td rowspan="2">Preperation & Approval of Contract (for by contract)</td>
                <td>BAC</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td rowspan="2">2-25 CD</td>
                <td></td>
              </tr>
              <tr id="project">
                <td>PGO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
              </tr>

              <tr id="project">

                <th scope="row" rowspan="2">10</th>
                <td rowspan="2">Issuance of NTP/PO</td>
                <td>BAC</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td rowspan="2">1-3 CD</td>
                <td></td>
              </tr>
              <tr id="project">
                <td>PGO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
              </tr>

              <tr id="project">

                <th scope="row">11</th>
                <td>Preparation of Voucher/ Budget Appropriation</td>
                <td>Accounting</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row">12</th>
                <td>Certification of Availability of Funds</td>
                <td>PTO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row">13</th>
                <td>Voucher Approval</td>
                <td>PGO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row">14</th>
                <td>Issuance of Check</td>
                <td>Cashier's Office</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>

              <tr id="project">

                <th scope="row" rowspan="2">15</th>
                <td rowspan="2">Approval of Check</td>
                <td>PTO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td rowspan="2"></td>
                <td></td>
              </tr>
              <tr id="project">
                <td>PGO</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
              </tr>

              <tr id="project">

                <th scope="row" rowspan="2">16</th>
                <td rowspan="2">Issuance of Check Advice</td>
                <td>Cashier's Office</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td rowspan="2"></td>
                <td></td>
              </tr>
              <tr id="project">
                <td>Accounting</td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
              </tr>

              <tr id="project">

                <th scope="row">17</th>
                <td>Receipt of Supplier/Contractor</td>
                <td></td>
                <td id="timeIn"></td>
                <td id="timeOut"></td>
                <td></td>
                <td></td>

              </tr>


            </tbody>
          </table>


    </ul>
</div>







@endsection
