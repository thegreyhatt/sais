@extends('layouts.cashier')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<div class="col-md-4 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Item Search</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="row">
				<div class="col-md-12">
					<label>Item Name</label>
					{!! Form::select('item', $items, '', ['class' => 'form-control', 'id' => 'items']) !!}
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<h4>Unit Price: <b id="unit_price"></b></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4>Description: <b id="description"></b></h4>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<label>Quantity</label>
					{!! Form::text('quantity', '', ['class' => 'form-control', 'id' => 'qty']) !!}
					<small>Available: <span id="available"></span></small>
				</div>
			</div>
		</div>
		<div class="x_footer">
			<div class="row">
				<div class="col-md-12">
					{!! Form::submit('Add to Cart', ['class' => 'btn btn-success pull-right']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-8 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Customer Cart</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_body">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-striped table-condensed">
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div id="keyboard">
		
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#items').select2();

	    load_item_data();
	});

	$("#items").on('change', function(){
		load_item_data();
	});

	function load_item_data() {

		var url = '{{ route('item info', ['id' => ':id']) }}';
		url = url.replace(':id', $("#items").val());
		console.log(url);

		$.ajax({
			type: 'GET',
			url: url,
			async: true,
			cache: false,
			success: function (data) {
				$("#unit_price").text(data.price);
				$("#available").text(data.quantity);
				$("#description").text(data.description);
			},
			error: function(){

			}
		});
	}
</script>

@endsection