@extends('layouts.main')

@section('breadcrumb')
	<li><a href="{{ route('users') }}">Users</a></li>
    <li class="active">{{ $user->name }}</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
		<div class="x_panel">
		{!! Form::open() !!}
			<div class="x_title">
				<h2>Edit User</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label class="control-label">@if($errors->has('name')) {{$errors->first('name')}} @else Complete Name @endif</label>
							{!! Form::text('name', $user->name, ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('username')) has-error @endif">
							<label class="control-label">@if($errors->has('username')) {{$errors->first('username')}} @else Username @endif</label>
							{!! Form::text('username', $user->username, ['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group @if($errors->has('account_type')) has-error @endif">
							<label class="control-label">@if($errors->has('account_type')) {{$errors->first('account_type')}} @else Account Type @endif</label>
							{!! Form::select('account_type', [1 => 'Administrator', 2 => 'Clerk', 3 => 'Cashier'], $user->account_type, ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
			</div>
			<div class="x_footer">
				{!! Form::submit('Save Update', ['class' => 'btn btn-primary pull-right']) !!}
			</div>
		{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection