@if(Session::has('ok_message'))
	<div class="alert alert-success" role="alert" id="eliminar_alert">
		{{ Session::get('ok_message') }}
		<script>
			setTimeout(function() {
		        $("#eliminar_alert").fadeOut(5000);
			},3000);
		</script>
	</div>
@endif
@if(Session::has('fail_message'))
	<div class="alert alert-danger" role="alert" id="eliminar_alert">
		{{ Session::get('fail_message') }}
		<script>
			setTimeout(function() {
		        $("#eliminar_alert").fadeOut(5000);
			},3000);
		</script>
	</div>
@endif
@if($errors->any())
	<div class="alert alert-danger" role="alert">
		@foreach ($errors->all() as $error)
  			<div>{{ $error }}</div>
		@endforeach
	</div>
	@foreach ($errors->keys() as $value)
		<script>
			$(function(){
				$("#<?=$value?>").css("border-color", "#DF1D1D");;
			});
		</script>
	@endforeach
@endif