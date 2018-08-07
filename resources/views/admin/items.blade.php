@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="x_panel">
			<div class="x_title">
				<h2>Items List</h2>
				<div class="clearfix" ></div>
			</div>
			<div class="x_content">
				<table class="table table-condensed table-hover table-responsive" id="items"></table>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="x_panel">
			{!! Form::open() !!}
			<div class="x_title">
				<h2>Add New Item</h2>
				<div class="clearfix" ></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label class="control-label">@if($errors->has('name')) {{$errors->first('name')}} @else Item Name @endif</label>
							{!! Form::text('name', '', ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('category_id')) has-error @endif">
							<label class="control-label">@if($errors->has('category_id')) {{$errors->first('category_id')}} @else Item Category @endif</label>
							{!! Form::select('category_id', $categories, '', ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('description')) has-error @endif">
							<label class="control-label">@if($errors->has('description')) {{$errors->first('description')}} @else Item Description @endif</label>
							{!! Form::textarea('description', '', ['class' => 'form-control', 'style' => 'height: 100px;'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('quantity')) has-error @endif">
							<label class="control-label">@if($errors->has('quantity')) {{$errors->first('quantity')}} @else Quantity @endif</label>
							{!! Form::text('quantity', '', ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('price')) has-error @endif">
							<label class="control-label">@if($errors->has('price')) {{$errors->first('price')}} @else Unit Price @endif</label>
							{!! Form::text('price', '', ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
			</div>
			<div class="x_footer">
				{!! Form::submit('Add New Item', ['class' => 'btn btn-primary pull-right']) !!}
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
	    $('#items').DataTable(
	    	{
		    	ajax: '{{ route('items list') }}',
		    	pageLength: 50,
		    	columns :[
		    		{data: 'name', title: 'Name'},
		    		{data: 'category', title: 'Category'},
		    		{data: 'description', title: 'Description'},
		    		{data: 'quantity', title: 'Quantity'},
		    		{data: 'price', title: 'Price'},
		    		{sorting: false, data: 'id', title: 'Edit', 'mRender': function(data){
	    					return '<a href="/item/'+data+'"> <i class="fa fa-edit fa-lg text-muted"></i> </a>'
	    				}
	    			},
		    	],
		    	columnDefs: [
					{
					className: 'text-right',
					targets: [3,4,5]
					}

				],
		    },
	    );

	    // $('#home_owner').select2();
	});
</script>
@endsection