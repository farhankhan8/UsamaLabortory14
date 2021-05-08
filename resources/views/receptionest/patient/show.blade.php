@extends('layouts.receptionest')
@section('content')
<div class="card">
    <div class="card-header">
    Patients Detail
    </div>
    <div class="card-body">            
            <div class="form-row">
    <div class="col-md-2 mb-3">

    <div class="form-group">
               <b> <label  for="user_id">Patient Name</label></b>
            <p>{{ $patient->Pname ?? '' }}</p>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Phone</label></b>
               <p> {{ $patient->phone ?? '' }}</p>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="state">Email</label></b>           
<p>{{ $patient->email }}</p>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Register Date</label></b>
   
<p>  {{ $patient->start_time }}</p>
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>


<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Birthday</label></b>
   
<p>  {{ $patient->dob }}</p>
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>


<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Tests Performed</label></b>
   
<p>  {{ $tests }}</p>
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
      <div>              
<div class="form-row">
<div class="col-md-12 mb-5">
<div class="form-group">
    <b><label  for="user_id">Result</label></b>
    <div style="background-color:gray;color:white;padding:20px;">
  <p>London is the capital city of England.London is the capital city of England.London is the capital city of England.London is the capital city of England. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.
  </p>
</div> 
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
</div>
  <div class="col-md-3 mb-3">
  <a class="btn btn-primary" href="{{ route('receptionest.home') }}">
  <button class="btn btn-primary">
  Back
  </button>
  </a>
  </div> 
@endsection