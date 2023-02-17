@extends('master-layout')

@section('title', 'Track a Document')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>

@section('content')

{{-- <section class="vh-100"> --}}
<div class="container py-5 h-100 mt-5">
    <div class="row d-flex justify-content-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5 m-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <h2 class="fw-bold mb-2 text-uppercase">Track document</h2>
            <p class="text-white-50 mb-5">Please enter the reference number</p>
            <form action="{{ route('track-project-guest') }}" method="POST">
            @csrf
            <div class="form-outline form-white mb-2 pb-2">
                <label class="form-label" for="referenceNumber">Reference No.</label>
                <input type="number" name="referenceNumber" class="form-control form-control-lg" placeholder="Enter reference number" />
                <span class="text-danger">@error('referenceNumber') <p>Please enter a valid reference number.</p>  @enderror</span>
            </div>
            <div class="form-outline form-white mb-2 pb-2">
                <label class="form-label" for="location">Location</label>
                <input type="text" name="location" class="form-control form-control-lg" placeholder="Enter the location" />
                <span class="text-danger">@error('location') <p>Please enter a valid location.</p>  @enderror</span>
            </div>


            <button class="btn btn-outline-light btn-lg px-5" type="submit">Submit</button>

            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
{{-- </section> --}}




@endsection
