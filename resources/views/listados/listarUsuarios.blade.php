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
				<td>NOMBRE</td>
				<td>EMAIL</td>
				<td>ADMIN</td>
				<td>NIVEL 1</td>
				<td>NIVEL 2</td>
			</tr>
		</thead>
		<tbody>
		@foreach($usuarios as $user)
			<tr>
	     		<td class="col-sm-4">{{$user->name}}</td>
	     		<td class="col-sm-4">{{$user->email}} <input type="hidden" id="email_{{$user->id}}" value="{{$user->email}}"></td>
	     		<td class="col-sm-1"><input type="checkbox" {{ $user->hasRole('admin') ? 'checked' : ''}} id="role_admin_{{$user->id}}"></td>
	     		<td class="col-sm-1"><input type="checkbox" {{ $user->hasRole('nivel_1') ? 'checked' : ''}} id="role_nivel_1_{{$user->id}}"></td>
	     		<td class="col-sm-1"><input type="checkbox" {{ $user->hasRole('nivel_2') ? 'checked' : ''}} id="role_nivel_2_{{$user->id}}"></td>
	     		<td class="col-sm-1"><button class="btn btn-primary" onclick="asignar_permisos_user({{$user->id}})">asignar</button></td>
			</tr>
	  	@endforeach
		</tbody>
	</table>
</div>