
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Category  Detail
    </div>

    <div class="card-body">            
            <div class="form-row">
    <div class="col-md-2 mb-3">
    <div class="form-group">
               <b> <label  for="user_id">Test Category </label></b>
              
            <p>{{  $catagoryId->Cname ?? '' }}</p>

            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
 


    
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Test in Category </label></b>
               <p> {{ $testInThisCategory ?? '' }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>








   



    
  </div>
  </div>


  <div class="card-body">












</div>
<div>


 




</div>

  <div class="col-md-3 mb-3">
  <a class="btn btn-primary" href="{{ route('catagory-list') }}">

  <button class="btn btn-primary">
  Back
  </button>
  </a>

  </div> 




  
@endsection