@extends('master-layout')

@section('title', 'Register')

@section('content')

<style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
    }
    .card-registration .select-arrow {
    top: 13px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

</style>


<section class="h-100 bg-light">
    <div class="container pt-0 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="img/register.png"
                  alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">

                {{-- Form --}}
                <form class="card-body p-md-5 text-black" action="{{ route('register-user') }}" method="POST">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }} <a href="{{ route('login') }}">Login now?</a></div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                @csrf
                  <h3 class="mb-5 text-uppercase"> registration form</h3>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="fname" class="form-control form-control-lg" placeholder="Enter your first name" value="{{ old('fname') }}" />
                        <label class="form-label" for="fname">First name</label>
                        <span class="text-danger">@error('fname') <p>This field is required.</p>  @enderror</span>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="lname" class="form-control form-control-lg" placeholder="Enter your last name" value="{{ old('lname') }}" />
                        <label class="form-label" for="lname">Last name</label>
                        <span class="text-danger">@error('lname') <p>This field is required.</p> @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="dob" class="form-control form-control-lg" placeholder="Enter your date of birth ex. 12-09-1999" value="{{ old('dob') }}" />
                    <label class="form-label" for="dob">Date of Birth <span style="font-size: 12px; color:red;">MM-DD-YY</span></label><br>
                    <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Enter your email" value="{{ old('email') }}" />
                    <label class="form-label" for="email">Email</label>
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="number" name="phoneNumber" class="form-control form-control-lg" placeholder="Enter your phone number" value="{{ old('phoneNumber') }}" />
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <span class="text-danger">@error('phoneNumber') {{ $message }} @enderror</span>
                  </div>

                  {{-- <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m1" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m1">Mother's name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1n1" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n1">Father's name</label>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                    <h6 class="mb-0 me-4">Gender: </h6>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                        value="option1" />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                        value="option2" />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline mb-0">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                        value="option3" />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>

                  </div> --}}

                  <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="department_id">Department</label><br>
                        <select name="department_id" class="select">
                            <option value="">--Select Department--</option>
                            <option value="1">Admin</option>
                            <option value="2">Contract</option>
                            <option value="3">Labor</option>
                        </select><br>
                      <span class="text-danger">@error('department_id') {{ $message }} @enderror</span>

                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="office_id">Office</label><br>
                        <select name="office_id" class="select">
                            <option value="">--Select Office--</option>
                            <option value="6">Accounting</option>
                            <option value="4">BAC</option>
                            <option value="8">Cashier's Office</option>
                            <option value="3">PBO</option>
                            <option value="1">PEO</option>
                            <option value="5">PGO</option>
                            <option value="2">PPDO</option>
                            <option value="7">PTO</option>
                        </select><br>
                      <span class="text-danger">@error('office_id') {{ $message }} @enderror</span>

                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" />
                    <label class="form-label" for="password">Password</label>
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="cpassword" class="form-control form-control-lg" placeholder="Confirm password"/>
                    <label class="form-label" for="cpassword">Confirm Password</label>
                  </div>



                  <div class="d-flex justify-content-end pt-2">
                    <button type="button" class="btn btn-light btn-lg">Reset all</button>
                    <button type="submit" class="btn btn-primary btn-lg ms-2">Register</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
