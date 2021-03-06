@extends('master')
@section('stylesheets')

@endsection
@section('content')

	<section class="container container-registeries">
		<div class="head-main">
			<h1 class="text-light text-center"> <i class="fa fa-fw fa-heart-o"></i> My Registeries <i class="fa fa-fw fa-heart-o"></i>
				<span class="head-bottom-line"></span>
			</h1>
		</div>
		@if( ! $registry )
			<div class="alert alert-warning clearfix">
				<strong>Oops!</strong> No registry found.
			</div>
		@else
			<div style="margin-top: 30px;">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Type of Registry</th>
							<!-- <th>Ocassion</th> -->
							<th>Event Date</th>
							<th>Regsitry Code</th>
							<th>Total Items</th>
							<th>Number of Items</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr id="row-{{ $registry->id }}">
							<td>{{ $registry->id }}</td>
							<td><a href="{{ config('app.url') }}detail/registry/{{ $registry->id }}">{{ $registry->title }}</a></td>
							<td>{{ $registry->ocassion->title }}</td>
							<td>{{ $registry->event_date }}</td>
							<td>{{ $registry->promo_code }}</td>
							<td><span class="badge">{{ $registry->product_nums }}</span></td>
							<td><span class="badge">{{ $registry->product_nums }}</span></td>
							<td><a href="{{ config('app.url') }}detail/registry/{{ $registry->id }}" class="btn btn-default"> <i class="fa fa-eye" style="color:inherit;" ></i> VIEW</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		@endif
		
	</section>

	@section('scripts')
		<script>
			$(function(){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$('.btn-delete-registry').on('click', function(){
					$registryId = $(this).data('id');
					$row = $('#row-'+$registryId);
					conf = confirm("Are you sure you want to delete the Registry?");
					if( conf )
					{	console.log( $registryId );
						console.log( $row );


	                $('.loadersmall').fadeIn();
	                $('#frmSignUp').fadeOut();

	             

					}
				});
			})
		</script>
	@endsection

@endsection