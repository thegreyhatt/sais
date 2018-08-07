@extends('layouts.main')

@section('breadcrumb')
	<li> <a href="{{ route('categories') }}">Categories</a> </li>
	<li class="active" > {{ $category->name }} </li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-4">
		<div class="x_panel">
		{!! Form::open() !!}
			<div class="x_title">
				<h2>Edit Category</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label class="control-label">@if($errors->has('name')) {{$errors->first('name')}} @else Category Name @endif</label>
							{!! Form::text('name', $category->name, ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('description')) has-error @endif">
							<label class="control-label">@if($errors->has('description')) {{$errors->first('description')}} @else Description @endif</label>
							{!! Form::textarea('description', $category->description, ['class' => 'form-control', 'style' => 'height: 100px;']) !!}
						</div>
					</div>
				</div>
			</div>
			<div class="x_footer">
				{!! Form::submit('Save Changes', ['class' => 'btn btn-primary pull-right']) !!}
			</div>
		{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection