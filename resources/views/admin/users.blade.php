@extends('layouts.main')

@section('breadcrumb')
	<li class="active" >Users</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-2">
		<div class="x_panel">
			<div class="x_title">
				<h2>Users</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-condensed table-hover table-responsive" id="categories"></table>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12">
		<div class="x_panel">
		{!! Form::open() !!}
			<div class="x_title">
				<h2>Add New User</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label class="control-label">@if($errors->has('name')) {{$errors->first('name')}} @else Complete Name @endif</label>
							{!! Form::text('name', '', ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('username')) has-error @endif">
							<label class="control-label">@if($errors->has('username')) {{$errors->first('username')}} @else Username @endif</label>
							{!! Form::text('username', '', ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('password')) has-error @endif">
							<label class="control-label">@if($errors->has('password')) {{$errors->first('password')}} @else Password @endif</label>
							{!! Form::password('password', ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('account_type')) has-error @endif">
							<label class="control-label">@if($errors->has('account_type')) {{$errors->first('account_type')}} @else Account Type @endif</label>
							{!! Form::select('account_type', [1 => 'Administrator', 2 => 'Clerk', 3 => 'Cashier'], '', ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
			</div>
			<div class="x_footer">
				{!! Form::submit('Add New User', ['class' => 'btn btn-primary pull-right']) !!}
			</div>
		{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
	
	$(document).ready(function() {
	    $('#categories').DataTable(
	    	{
		    	ajax: '{{ route('users list') }}',
		    	pageLength: 10,
		    	columns :[
		    		{data: 'username', title: 'Username'},
		    		{data: 'name', title: 'Name'},
		    		{data: 'account_type', title: 'Account Type'},
		    		{sorting: false, data: 'id', title: 'Edit', 'mRender': function(data){
	    					return '<a href="user/'+data+'"> <i class="fa fa-edit fa-lg text-muted"></i> </a>'
	    				}
	    			},
		    	]
		    }
	    );
	});
</script>
@endsection