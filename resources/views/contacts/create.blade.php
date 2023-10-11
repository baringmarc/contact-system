@extends('layout')

@section('content')

<form method="POST" id="submitform" action="/store" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <h2>CREATE CONTACT</h2>
    </div>
    <div class="col-md-12">

			 <div class="form-group required p-2">
				{!! Form::label("NAME") !!}
				{!! Form::text("name", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <div class="form-group required p-2">
				{!! Form::label("COMPANY") !!}
				{!! Form::text("company", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required p-2">
				{!! Form::label("EMAIL") !!}
				{!! Form::text("email", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required p-2">
				{!! Form::label("PHONE") !!}
				{!! Form::text("phone", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

        <div class="well well-sm clearfix">
            <button class="btn btn-success pull-right" title="Save" type="submit">Create</button>
        </div>
    </div>

</form>
@endsection