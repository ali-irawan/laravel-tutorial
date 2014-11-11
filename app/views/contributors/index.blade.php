@extends("layouts/default")
@section("title")
  Laravel Angular Training - Contributors
@stop
@section("content")
    <div class="container">
    
		 <h2>Contributors</h2>
	     <div class="alert alert-info">
	     	{{ $message }}
	     </div>
	     
	     <a href="/contributors/create" class="btn btn-primary">Add Contributor</a>
	     <a href="/" class="btn btn-default">Back</a>
	     
	     <br/><br/>
	     
	     <table class="table table-striped table-bordered">
	     	<thead>
	     		<tr>
	     			<th>Name</th>
	     			<th>Email</th>
	     			<th>Role</th>
	     			<th style="width: 160px">Action</th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach($contributor_list as $key => $value)
	     			<tr>
	     				<td>{{ $value->name  }}</td>
	     				<td><a href="mailto:{{ $value->email }}">{{ $value->email }}</a></td>
	     				<td>{{ $value->role_name }}</td>
	     				<td>
	     						{{ Form::open([ 'url' => '/contributors/' . $value->id, 'class' => 'pull-right' ]) }}
	     							{{ Form::hidden('_method', 'DELETE') }}
									{{ Form::submit('Remove', array('class' => 'btn btn-small btn-warning', 
									                                'onclick' => "return confirm('Are you sure ?')")) }}
	     						{{ Form::close() }}
	     					
		     				<a class="btn btn-info pull-right" href="/contributors/{{ $value->id }}/edit">Edit</a>
	     				</td>
	     			</tr>
	     		@endforeach	
	     	</tbody>
	     </table>
     </div>
@stop
