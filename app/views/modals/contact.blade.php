@extends('master')

@section('title') Home @stop

@section('content')
	{{-- Alert --}}
	@include('template/modules.alert')

	<div class="row">

		{{-- Thread Listing --}}
		<div class="col-md-9">
		
			{{-- Tab pane --}}
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#recent" data-toggle="tab">
						Recent
					</a>
				</li>

				<li>
					<a href="#hot" data-toggle="tab">
						Hot
					</a>
				</li>
			</ul>

			{{-- Content --}}
			<div class="tab-content">

				<div class="tab-pane active" id="recent">
					{{-- Threads List --}}
					@foreach($recent as $thread)
						<div class="row thread">
							{{-- Basic Thread Stats --}}
							<div class="col-md-1">
								<h4 class="text-center">
									0 <br />
									<small> votes </small>
								</h4>
							</div>

							<div class="col-md-1">
								<h4 class="text-center">
									{{ count($thread->posts) }} <br />
									<small> posts </small>
								</h4>
							</div>

							<div class="col-md-1">
								<h4 class="text-center">
									{{ $thread->hits }} <br />
									<small> hits </small>
								</h4>
							</div>

							<div class="col-md-9">
								<h4>
									<a href="{{ URL::route('thread.show', $thread->id) }}">
										{{ $thread->title }}
									</a>
								</h4>
							</div>
						</div>
						<hr>
					@endforeach
				</div>{{-- /.tab-pane --}}

				<div class="tab-pane" id="hot">
					{{-- Threads List --}}
					@foreach($hot as $thread)
						<div class="row thread">
							{{-- Basic Thread Stats --}}
							<div class="col-md-1">
								<h4 class="text-center">
									0 <br />
									<small> votes </small>
								</h4>
							</div>

							<div class="col-md-1">
								<h4 class="text-center">
									{{ count($thread->posts) }} <br />
									<small> posts </small>
								</h4>
							</div>

							<div class="col-md-1">
								<h4 class="text-center">
									{{ $thread->hits }} <br />
									<small> hits </small>
								</h4>
							</div>

							<div class="col-md-9">
								<h4>
									<a href="{{ URL::route('thread.show', $thread->id) }}">
										{{ $thread->title }}
									</a>
								</h4>
							</div>
						</div>
						<hr>
					@endforeach
				</div>{{-- /.tab-pane --}}

			</div>{{-- /.tab-content --}}

		</div>{{-- /.col-md-9 --}}

	</div>{{-- /.row --}}
@stop