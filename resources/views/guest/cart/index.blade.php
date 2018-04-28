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
					<form action="{{config('app.url')}}guest/cart/checkout/view" method="POST" class="storeFrm">
						{{ csrf_field() }}
						<button type="button" style="font-size:18px;" class="btn btn-default btn-lg pull-right start-purhcasing-btn proceed-to-checkout"> <i class="fa fa-cc" style="color:#e5c100; padding-right:5px"></i> PROCEED TO CHECKOUT</button>
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


	<div class="modal fade" id="modal-gift-wrapping" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Alert</h4>
	            </div>
	            <div class="modal-body clearfix">
	                <div class="col-sm-12 checkbox">
						<label for="T__xtxtDoGiftWrapping">
							<input type="checkbox" id="T__xtxtDoGiftWrapping" value="1">
							Would you like to leave a personal note for the couple and have your present gift wrapped (*$10 fee applicable)?
						</label>
					</div>
					<div class="col-sm-12 form-group note-control" style="margin:10px 0; display: none">
						<textarea id="T__xtxtNoteForGuest" class="form-control" style="height: 100px"></textarea>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-primary btn-final">Proceed</button>
	            </div>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	@section('scripts')
		<script>
			$(function(){
				var modalWrap   = $('#modal-gift-wrapping'),
					btnProceed  = $('button.proceed-to-checkout'),
					btnFinalize = $('.btn-final'),
					stormForm   = $('.storeFrm'),
					giftWrapChk = $('#T__xtxtDoGiftWrapping'),
					noteGuest   = $('#T__xtxtNoteForGuest'),
					noteCtrl    = $('.note-control');
				btnProceed.on('click', function(){
					modalWrap.modal('toggle');
				});
				btnFinalize.on('click', function(){
					$('#xtxtNoteForGuest').val( noteGuest.val() );
					stormForm.submit();
				});
				giftWrapChk.on('change', function(){
					noteCtrl.stop().slideToggle();
					if( $(this).is(':checked') )
					{
						stormForm.append('<input type="hidden" name="xtxtDoGiftWrapping" id="xtxtDoGiftWrapping" value="1" /><input type="hidden" name="xtxtNoteForGuest" id="xtxtNoteForGuest" value="'+noteGuest.val()+'" />');
					} 
					else
					{
						$('#xtxtDoGiftWrapping').remove();
						$('#xtxtNoteForGuest').remove();
					}
				});
			});
		</script>
	@endsection

@endsection