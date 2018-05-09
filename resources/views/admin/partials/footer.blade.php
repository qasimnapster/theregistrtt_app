@if( Auth::check() )
	<footer class="main-footer">
	    <strong>Copyright &copy; 2018 </strong> All rights reserved.
	</footer>
@endif
</body>
<!-- jQuery 3 -->
<script src="{{ config('app.url') }}panel/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ config('app.url') }}panel/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
@if( Auth::check() )
	<!-- Select2 -->
	<script src="{{ config('app.url') }}panel/vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="{{ config('app.url') }}panel/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{ config('app.url') }}panel/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="{{ config('app.url') }}panel/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="{{ config('app.url') }}panel/vendors/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ config('app.url') }}panel/assets/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ config('app.url') }}panel/assets/js/demo.js"></script>
	<!-- page script -->
	<script>
	  $(function () {
	    
	    window.table = $('#products-table').DataTable({
	      'paging'      : true,
	      'lengthChange': false,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : false
	    });

	    $('.select2').select2();

	    $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

	    $('[data-product-id]').on('click', function(){
	    	
	    	var $this = $(this),
	    		$product_id = $this.data('product-id');

	    	$confirm = confirm('Are you sure you want to delete this product?');

	    	if( $confirm )
	    	{
	    		//console.log(response);
	            console.log(window.table);

		    	$.ajax({
	                url: '{{ config("app.url") }}administrator/products/delete',
	                type: 'POST',
	                dataType: 'html',
	                data: {
	                    'product_id': $product_id,
	                    _token: '{!! csrf_token() !!}'
	                },
	                success: function(response){
	                    if( response == '1' )
	                    {
	                    	console.log(response);
	                    	window.table.draw();
	                    }
	                },
	                error: function(response){
	                    console.log(response)
	                }
	            });
            }

	    });

	  });
	</script>
@endif