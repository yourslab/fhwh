@extends('master')

@section('title') Free Homework Helper - No more dogs eating your homework @stop

@section('css')
@include('usuals.css')
@stop

@section('content')
<div id="wrap">
	<div class="container-fluid">
		<div class="row main-hero">
			<div class="col-md-4 col-md-offset-8">
				<div class="cta-container">
					<h4 class="cta-caption">Ask questions and get them answered for free by real educators and tutors</h4>
					<img src="images/icons/png/Retina-Ready.png" class="check-image"/>
					<input type="text" placeholder="E-mail" class="form-control cta-form-size" />
					<a href="#fakelink" class="btn btn-lg btn-success cta-form-size">Be the first to find out more >></a>
				</div>
			</div>
		</div>

		<div class="row step-info">
			<h2 class="step-info-caption">How does it work?</h2>
			<div class="col-md-4">
				<div class="step">
					<div class="row">
						<div class="col-md-4">
							<img src="images/icons/png/Mortarboard@2x.png" class="desc-image" style="margin-top:1em;" alt="Image of a clock"/>
						</div>
						<div class="clearfix visible-md"></div>
						<div class="col-md-8">
							<h4 class="step-title">1. Ask a question</h4>
							<h6 class="step-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="step">
					<div class="row">
						<div class="col-md-4">
							<img src="images/icons/png/Watches.png" class="desc-image" alt="Image of a clock"/>
						</div>
						<div class="clearfix visible-md"></div>
						<div class="col-md-8">
							<h4 class="step-title">2. Wait for answers</h4>
							<h6 class="step-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="step">
					<div class="row">
						<div class="col-md-4">
							<img src="images/icons/png/Dude@2x.png" class="desc-image" alt="Image of a clock"/>
						</div>
						<div class="clearfix visible-md"></div>
						<div class="col-md-8">
							<h4 class="step-title">3. Read and learn</h4>
							<h6 class="step-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="footer">
	<div class="container-fluid">
		<div id="row">
		<div class="col-md-6 student-question"><h4>Suggestions?</h4></div>
			<div class="col-md-6 tutor-question"><h4>Contact Us</h4></div>
		</div>
	</div>
</div>
@stop

@section('javascript')
@include('usuals.javascript')
@stop
