<div class="panel panel-default">
	<table class="table">
		<thead>
			<tr>
				<td>NOMBRE ROLE</td>
				<td>DESCRIPCION</td>
			</tr>
		</thead>
		<tbody>
		@foreach($roles as $role)
			<tr class="filas-fijas" onclick="divLogin('.filas-{{$role->name}}')">
     			<td>{{$role->name}}</td>
     			<td>{{$role->descripcion}}</td>
			</tr>
			@foreach(Auth::user()->allUsers() as $usuario)
				@if ($usuario->hasRole($role->name))
					<tr class="filas-ocultas filas-{{$role->name}}">
						<td>{{$usuario->name}}</td>
						<td>{{$usuario->email}}</td>
					</tr>
				@endif
	  		@endforeach
	  	@endforeach
		</tbody>
	</table>
</div>