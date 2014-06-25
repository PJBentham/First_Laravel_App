@extends('layouts.default')

@section('content')
<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 ">
          			<img style="max-width: 100%; max-height: 100%;" src="../assets/img/main.png"></img>
        		</div>
				<div class="col-lg-6">
					<h2 class="subtitle">The fastest, simplest &amp; greenest solution for returning on site sign-off documents!</h2>
					<h5 class="subtitle">Do you require a timesheet, job completion certificate or delivery notification to be completed as part of the service you offer?</h5>
					<h5 class="subtitle">Is a physical signature a part of this requirement?</h5>
					<h5 class="subtitle">Mysignoff.co.uk can help you achieve this by giving your members of staff a portal to log into on their smart phone / tablet, complete a form &amp; pass their device to your customer for a real signature! <a href="http://mysignoff.co.uk/example">(See example here)</a></h5>
					<h5 class="subtitle">Once the form is submitted it gets translated onto a PDF document and emailed to whomever you choose (more than one email possible).  <a href="http://www.mysignoff.co.uk/example/exampledb.php">It can also be uploaded to a database which can be sorted by date, location, job number etc...</a></h5>
					<h5 class="subtitle">There are many huge benefits to your business:</h5>
					<ul class="page1list">
						<li><p>Fast! - No need to wait for your employee to return a signed paper document</p></li>
						<li><p>Simple! - No convoluted processes to go through, complete a form, sign , submit... that's it.</p></li>
						<li><p>Green! - Allowing the full sign off process to be paperless</p></li>
						<li><p>Digital! - Need to send on the document? no need to scan in a paper sheet as you already have a pdf copy you can send.</p></li>
	        			<li><p>Mobile! - Available on most smart phones / tablets with a modern browser.</p></li>
					</ul>
					<h5 class="subtitle">If you're interested in saving your business time &amp; money, enter your email below and we will be in touch very soon to see how we can help you best achieve an online sign off.</h5>			
						{{ Form::open(array('class' => 'form-inline signup', 'action' => 'HomeController@registerInterest')) }}
							{{ Form::email('email', 'Enter e-mail address', array('class' => 'form-control')) }}
							{{ Form::submit('Request Details', array('class' => 'btn btn-theme')) }}
						@if (isset($interest)) 
							<h4>{{ $interest }}</h4>
						@endif
						{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-1">
					@if (isset($message)) 
						<h4>{{ $message }}</h4>
					@endif
					{{ Form::open(array('class' => 'form-horizontal', 'action' => 'HomeController@processLogin')) }}
						{{ Form::label('username', 'Username: ', array('class' => 'control-label')) }}
						{{ Form::text('username', null, array('class' => 'form-control')) }}
						{{ Form::label('password', 'Password: ', array('class' => 'control-label')) }}
						{{ Form::password('password', array('class' => 'form-control')) }}					
						{{ Form::submit('Sign In', array('class' => 'btn')) }}
        		     {{ Form::close() }}
		        </div>
    		</div>
    	</div>
    </div>		
@stop    	