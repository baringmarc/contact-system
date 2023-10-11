@extends('layout')

@section('content')
    {!! Form::open(['action' =>['ContactController@update',$data->id], 'method' => 'PUT','files'=>true])!!}

        <div class="col-md-6">

			 <div class="form-group required">
				{!! Form::label("NAME") !!}
				{!! Form::text("name", $data->name ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <div class="form-group required">
				{!! Form::label("COMPANY") !!}
				{!! Form::text("company", $data->company ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! Form::label("EMAIL") !!}
				{!! Form::text("email", $data->email ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! Form::label("PHONE") !!}
				{!! Form::text("phone", $data->phone ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <div class="well well-sm clearfix">
                <button class="btn btn-success pull-right" title="Save" type="submit">Update</button>
            </div>
        </div>

    {!! Form::close() !!}
@endsection