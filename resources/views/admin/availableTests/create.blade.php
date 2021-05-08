
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Create New Test
        <!-- {{ trans('global.create') }} {{ trans('cruds.room.title_singular') }} -->
    </div>

    <div class="card-body">



    <form method="POST" action="{{ route("availale-tests-store") }}" enctype="multipart/form-data">
            @csrf  <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="catagory_id">Test Category</label>
                <select class="form-control select2 {{ $errors->has('catagory_id') ? 'is-invalid' : '' }}" name="catagory_id" id="room_id" required>
                    @foreach($categoryNames as $id => $categoryName)
                        <option value="{{ $id }}" {{ old('room_id') == $id ? 'selected' : '' }}>{{ $categoryName }}</option>
                    @endforeach
                </select>
                @if($errors->has('room'))
                    <div class="invalid-feedback">
                        {{ $errors->first('room') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.room_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="name">Test Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.name_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="testFee">Test Fee</label>
                <input class="form-control {{ $errors->has('testFee') ? 'is-invalid' : '' }}" type="number" name="testFee" id="testFee" value="{{ old('testFee', '') }}" step="1"required>
                @if($errors->has('testFee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testFee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.capacity_helper') }}</span>
            </div>
    </div>
  </div>


  <div class="row">
  <div class="col-md-2">
                    <label class="required" for="initialNormalValue">First Normal Range</label>

                        <div class=''>
                        <input class="form-control {{ $errors->has('initialNormalValue') ? 'is-invalid' : '' }}" type="number" name="initialNormalValue" id="initialNormalValue" value="{{ old('initialNormalValue', '') }}" step="1"required>
                             <span class="input-group-addon">
                                 <span class=""></span>
                             </span>
                        </div>
                    </div>

                    <div class="col-md-2">
                    <label class="required" for="finalNormalValue">Final Normal Range</label>

                        <div class='' id=''>
                        <input class="form-control {{ $errors->has('finalNormalValue') ? 'is-invalid' : '' }}" type="number" name="finalNormalValue" id="finalNormalValue" value="{{ old('finalNormalValue', '') }}" step="1"required>

                             <span class="input-group-addon">
                                 <span class=""></span>
                             </span>
                        </div>
                    </div>


                    <div class="col-md-2">
                    <label class="required" for="firstCriticalValue">First Critical Value</label>

                        <div class='' id=''>
                        <input class="form-control {{ $errors->has('firstCriticalValue') ? 'is-invalid' : '' }}" type="number" name="firstCriticalValue" id="firstCriticalValue" value="{{ old('firstCriticalValue', '') }}" step="1"required>

                             <span class="input-group-addon">
                                 <span class=" "></span>
                             </span>
                        </div>
                    </div>

                    <div class="col-md-2">
                    <label class="required" for="finalCriticalValue">Final Critical Value</label>

                        <div class=' ' id=''>
                        <input class="form-control {{ $errors->has('finalCriticalValue') ? 'is-invalid' : '' }}" type="number" name="finalCriticalValue" id="finalCriticalValue" value="{{ old('finalCriticalValue', '') }}" step="1"required>

                             <span class="input-group-addon">
                                 <span class=" "></span>
                             </span>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
      <label for="validationServer05">Test Units</label>
      <input class="form-control {{ $errors->has('units') ? 'is-invalid' : '' }}" type="text" name="units" id="units" value="{{ old('name', '') }}" required>
      <div class="invalid-feedback">
        <!-- Please provide a valid zip. -->
      </div>
    </div>
  </div>
                    </div>
                    
                    <div class="card-body">

                    <div class="row">

                    <div class="col-md-3 mb-3">
  <button class="btn btn-primary" type="submit">Submit</button>
  </div>
  </div>
  </div>

</form>









@endsection