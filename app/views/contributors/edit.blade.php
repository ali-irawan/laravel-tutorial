@extends("layouts/default")
@section("title")
  Laravel Angular Training - Contributors
@stop
@section("content")
    <div class="container">
    
    	<h2>Contributors - Edit Contributor</h2>
    	
    	{{ HTML::ul($errors->all(), array('class' => 'alert alert-danger')) }}
    	
    	{{ Form::model($contributor, array ( 'method' => 'PUT', 'url' => '/contributors/' . $contributor->id  )  ) }}
    		<div class="form-group">
    			{{ Form::label('name','Name') }}<span class="required">*</span>
    			{{ Form::text('name', Input::old('name'), array ( 'placeholder' => 'e.g. John Smith', 'class' => 'form-control' ) ) }}
    		</div>
    		<div class="form-group">
    			{{ Form::label('email','Email') }}<span class="required">*</span>
    			{{ Form::text('email', Input::old('email'), array ( 'placeholder' => 'e.g. johnsmith@gmail.com', 'class' => 'form-control' ) ) }}
    		</div>
    		<div class="form-group">
    			{{ Form::label('role_id','Role') }}
    			{{ Form::select('role_id', $role_list, Input::old('role'), array ( 'class' => 'form-control' ) ) }}
    		</div>
    		
    		{{ Form::submit('Submit', [ 'class' => 'btn btn-primary'] ) }}
    		{{ Form::button('Back', [ 'class' => 'btn btn-default']) }} 
    	{{ Form::close() }}
    </div>
@stop    