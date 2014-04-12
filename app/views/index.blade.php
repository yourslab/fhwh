@extends('master')

@section('title') FreeHomeworkHelper - Now your dog won't have to eat your homework @stop

@section('css')
@include('usuals.css')
@stop

@section('content')
<div id="wrap">
	<div class="container-fluid">
		<div class="row main-hero">
			<div class="col-md-8 vimeo">
				<div class='embed-container'>
					<iframe src="//player.vimeo.com/video/89717700?title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933&amp;" frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
			</div>
			<div class="col-md-4 cta">
				<div class="cta-container">
					<h4 class="cta-caption">Ask questions and get them answered for free by real educators and tutors</h4>
					<img src="images/icons/png/Retina-Ready.png" class="check-image"/>
					<div class="icheck-container">
					<h6 class="cta-caption-icheck">Please choose one</h6>
						<input type="radio" class="icheck" name="iCheck"/>
							<label>I'm a student.</label>
						<div class="push"></div>
						<input type="radio" class="icheck" name="iCheck"/>
							<label>I'm an educator.</label>
						<div class="push"></div>
						<input type="radio" class="icheck" name="iCheck"/>
							<label>I'm none of the above.</label>
						<div class="push"></div>
						<button type="button" class="btn btn-lg btn-success cta-form-size cta-button-last">Finish</button>
					</div>
					<div class="thanks alert alert-success">
					Thank you! We'll make sure to email you if we have any updates.
					</div>
					<form class="ask-email" role="form" action="#">
						<input type="text" placeholder="Enter email" class="form-control cta-form-size cta-email" />
					<button type="submit" class="btn btn-lg btn-success cta-form-size cta-button">Be the first to find out more >></button>
					</form>
				</div>
			</div>
		</div>

		<div class="row step-info">
			<h2 class="step-info-caption">How does it work?</h2>
			<div class="col-md-4">
				<div class="step">
					<div class="row center-row">
						<div class="col-md-4 cemter">
							<img src="images/icons/png/Mortarboard@2x.png" class="desc-image" style="margin-top:1em;" alt="Image of a clock"/>
						</div>
						<div class="clearfix visible-md"></div>
						<div class="col-md-8 center">
							<h4 class="step-title">1. Questions</h4>
							<h6 class="step-desc">Students only need to register to get homework help.</h6>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="step">
					<div class="row center-row">
						<div class="col-md-4 center">
							<img src="images/icons/png/Watches.png" class="desc-image" alt="Image of a clock"/>
						</div>
						<div class="clearfix visible-md"></div>
						<div class="col-md-8 center">
							<h4 class="step-title">2. Answers</h4>
							<h6 class="step-desc">Tutors answer questions and receive rewards for their helpfulness.</h6>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="step">
					<div class="row center-row">
						<div class="col-md-4 center">
							<img src="images/icons/png/Dude@2x.png" class="desc-image" alt="Image of a clock"/>
						</div>
						<div class="clearfix visible-md"></div>
						<div class="col-md-8 center">
							<h4 class="step-title">3. Practice</h4>
							<h6 class="step-desc">Students can also practice independently with the worksheets on the site!</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="footer">
	<div class="container-fluid">
		<div id="row center-row">
		<a data-toggle="modal" href="#suggestions"><div class="col-md-6 suggestions"><i class="fa fa-lightbulb-o fa-2x"></i><h4 class="inline">Suggestions?</h4></div></a>
		<a data-toggle="modal" href="#contact"><div class="col-md-6 contact-us"><i class="fa fa-comments-o fa-2x"></i><h4 class="inline">Contact Us</h4></div></a>
		</div>
	</div>
</div>
@stop

@section('modals')
@include('modals.suggest')
@include('modals.contact')
@stop

@section('javascript')
@include('usuals.javascript')
@stop
