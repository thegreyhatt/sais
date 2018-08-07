@extends('layouts.main')

@section('breadcrumb')
	<li class="active" >Categories</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Categories List</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-condensed table-hover table-responsive" id="categories"></table>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="x_panel">
		{!! Form::open() !!}
			<div class="x_title">
				<h2>Add New Category</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label class="control-label">@if($errors->has('name')) {{$errors->first('name')}} @else Category Name @endif</label>
							{!! Form::text('name', '', ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('description')) has-error @endif">
							<label class="control-label">@if($errors->has('description')) {{$errors->first('description')}} @else Description @endif</label>
							{!! Form::textarea('description', '', ['class' => 'form-control', 'style' => 'height: 100px;']) !!}
						</div>
					</div>
				</div>
			</div>
			<div class="x_footer">
				{!! Form::submit('Add New Category', ['class' => 'btn btn-primary pull-right']) !!}
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
		    	ajax: '{{ route('category list') }}',
		    	pageLength: 10,
		    	columns :[
		    		{data: 'name', title: 'Name'},
		    		{data: 'description', title: 'Description'},
		    		{sorting: false, data: 'id', title: 'Edit', 'mRender': function(data){
	    					return '<a href="category/'+data+'"> <i class="fa fa-edit fa-lg text-muted"></i> </a>'
	    				}
	    			},
		    	]
		    }
	    );
	});
</script>
@endsection