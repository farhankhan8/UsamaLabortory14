@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Edit Category 
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("catagory-update", [$catagory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

        
            <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="" for="Cname">{{ trans('cruds.room.fields.name') }}</label>
                <input class="form-control {{ $errors->has('Cname') ? 'is-invalid' : '' }}" type="text" name="Cname" id="Cname" value="{{ old('Cname', $catagory->Cname) }}" required>
                @if($errors->has('Cname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('Cname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.name_helper') }}</span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>






<!-- 
            <div class="form-group">
                <label class="required" for="name">Enter New Catagory Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.name_helper') }}</span>
            </div>
          
         -->
          
  <div class="col-md-3 mb-3">

<button class="btn btn-primary" type="submit">Update</button>
</div>










        </form>
    </div>
</div>



@endsection