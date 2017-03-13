<div class="panel panel-default">
	<div class="alert alert-success" hidden="true" role="alert" id="eliminar_alert_success">
		<p id="id_msg_success"></p>
	</div>
	<div class="alert alert-danger" hidden="true" role="alert" id="eliminar_alert_error">
		<p id="id_msg_error"></p>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<td>DIRECCION URL</td>
				<td>METODO</td>
				<td>ADMIN</td>
				<td>NIVEL 1</td>
				<td>NIVEL 2</td>
			</tr>
		</thead>
		<tbody>
		@foreach($urls as $url)
			<tr>
				<td>{{$url->urlRelativa}} <input type="hidden" id="url_{{$url->id}}" value="{{$url->urlRelativa}}"></td>
	     		<td>{{$url->action}} <input type="hidden" id="metodo_{{$url->id}}" value="{{$url->action}}"></td>
	     		<td><input type="checkbox" {{ $url->hasRole('admin') ? 'checked' : ''}} id="role_admin_{{$url->id}}"></td>
	     		<td><input type="checkbox" {{ $url->hasRole('nivel_1') ? 'checked' : ''}} id="role_nivel_1_{{$url->id}}"></td>
	     		<td><input type="checkbox" {{ $url->hasRole('nivel_2') ? 'checked' : ''}} id="role_nivel_2_{{$url->id}}"></td>
	     		<td><button class="btn btn-primary" onclick="asignar_permisos_url({{$url->id}})">asignar</button></td>
			</tr>
	  	@endforeach
		</tbody>
	</table>
</div>