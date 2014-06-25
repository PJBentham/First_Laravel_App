@extends('layouts.default')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-6 ">
				<h2 style="padding-top: 80px; color: SlateGray;">Hello @if(isset($user)) {{ $users[0]['username'] }} @endif, These are your projects:</h2>
			</div>
		</div>
	</div>		
@stop
