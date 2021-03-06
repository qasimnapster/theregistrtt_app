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
		@if( count( $registeries ) == 0 )
			<div class="alert alert-warning clearfix">
				<strong>Oops!</strong> No registry found.
				<a href="{{ config('app.url') }}create/registry/1" class=" btn btn-default pull-right"> Create your first free registry </a>
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
							<!-- <th>Status</th> -->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $registeries as $key => $registry )
						<tr id="row-{{ $registry->id }}">
							<td>{{ $key + 1 }}</td>
							<td><a href="{{ config('app.url') }}detail/registry/{{ $registry->id }}">{{ $registry->title }}</a></td>
							<td>{{ $registry->ocassion->title }}</td>
							<td>{{ $registry->event_date }}</td>
							<td>{{ $registry->promo_code }}</td>
							<td align="center"><span class="badge">{{ $registry->product_nums }}</span></td>
							<td align="center"><span class="badge">{{ $registry->product_nums }}</span></td>
							<!-- <td> <span class="label label-{{ $registry->registry_status->name == 'completed' ? 'info' : ($registry->registry_status->name == 'delivered' ? 'success' : 'warning') }}"> {{ $registry->registry_status->name }} </span> </td> -->
							<td>
								<a href="{{ config('app.url') }}detail/registry/{{ $registry->id }}" class="btn btn-default"> <i class="fa fa-eye" style="color:inherit;" ></i> VIEW</a>
								<a href="#" data-id="{{ $registry->id }}" class="btn btn-danger btn-delete-registry"> <i class="fa fa-trash" style="color:inherit;"></i> DELETE</a>
								@if( $registry->registry_status->name != 'delivered' )
									<a href="{{ config('app.url') }}edit/registry/1/{{ $registry->id }}" class="btn btn-default"> <i class="fa fa-pencil" style="color:inherit;" ></i> EDIT</a>
								@endif
							</td>
						</tr>
						@endforeach
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

	                $.ajax({
	                    url: '{{ config("app.url") }}registry/delete',
	                    type: 'POST',
	                    dataType: 'html',
	                    data: {
	                        'registry_id': $registryId,
	                        'customer_id': {{ Auth::user()->id }},
	                        _token: '{!! csrf_token() !!}'
	                    },
	                    success: function(response){
	                        console.log(response);
	                        $row.fadeOut('300');
	                        alert('Registry deleted successfully!');
	                    },
	                    error: function(response){
	                        //console.log(response)
	                    }
	                });

					}
				});
			})
		</script>
	@endsection

@endsection