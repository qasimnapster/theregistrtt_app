@extends('master')
@section('stylesheets')

@endsection
@section('content')

	<section class="container container-registeries">
		<div class="head-main">
			<div class="row clearfix">
				<div class="col-sm-9">
					<h1 class="text-light text-left"> <i class="fa fa-fw fa-shopping-cart"></i> Shopping Cart</h1>
				</div>
				<div class="col-sm-3" style="padding-top: 20px;">
					<form action="{{config('app.url')}}guest/cart/process/1" method="POST" class="storeFrm">
						{{ csrf_field() }}
						<button type="button"  style="font-size:18px;" class="btn btn-default btn-lg pull-right start-purhcasing-btn"> <i class="fa fa-cc" style="color:#e5c100; padding-right:5px"></i> PROCEED TO CHECKOUT</button>
					</form>
				</div>
			</div>
		</div>

			<div style="margin-top: 30px;">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Title</th>
							<th>Price</th>
							<th>Registry</th>
							<th>Name</th>
							<th>Promo Code</th>
							<th>Qty</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $item)
						@foreach($item as $subitem)
							<tr id="row-{{ $subitem->id }}">
								<td>{{ $subitem->id }}</td>
								<td><img src="{{ $subitem->image }}" alt="" width="40" height="40"></td>
								<td>{{ $subitem->title }}</td>
								<td>${{ $subitem->price }}</td>
								<td>{{ $subitem->reg_title }}</td>
								<td>{{ $subitem->first_name }}</td>
								<td><span class="label label-success"> {{ $subitem->promo_code }} </span></td>
								<td><span class="badge">{{ $qtys[$subitem->id] }}</span></td>
							</tr>
						@endforeach
					@endforeach
					</tbody>
				</table>
			</div>
		
	</section>

	@section('scripts')
		<script>
			
		</script>
	@endsection

@endsection