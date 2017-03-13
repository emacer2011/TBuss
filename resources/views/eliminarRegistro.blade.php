@extends('layouts\template_base')

@section('content')
	<center>	
		<h1>Listado de Registros de Colectivos</h1>
	</center>
	<br><br>
	<div data-ng-app="registrosModule"  data-ng-controller="eliminarApiCtrl as vm">
		<div data-ng-init="vm.url='{{asset('/angular/registro')}}';vm.buscarRegistros()">
			<div class="panel panel-default">
				<div class="form-group has-feedback">
				    <input type="text" class="form-control filterTable" placeholder="Filtrar Registros" data-ng-model="filterRegistros"/>
					<i class="glyphicon glyphicon-search form-control-feedback"></i>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<td>EMPRESA</td>
							<td>ORIGEN</td>
							<td>DESTINO</td>
							<td>COCHE</td>
							<td>PLATAFORMA</td>
							<td>FECHA</td>
							<td>HORA</td>
							<td>ARRIBO/SALIDA</td>
							<td>ELIMINAR</td>
						</tr>
					</thead>
					<tbody>
		      			<tr data-ng-repeat="reg in vm.registros | filter: filterRegistros">
			         		<td>[[reg.empresa | uppercase]]</td>
			         		<td>[[reg.origen | uppercase]]</td>
			         		<td>[[reg.destino | uppercase]]</td>
			         		<td>[[reg.coche]]</td>
			         		<td>[[reg.plataforma]]</td>
			         		<td>[[reg.fecha]]</td>
			         		<td>[[reg.hora]]</td>
			         		<td>[[reg.tipo_uso | uppercase]]</td>
			         		<td>
			         			<button class="btn color-app" data-ng-click="vm.eliminarRegistro([[reg.id]])"><span class="glyphicon glyphicon-remove"></span></button>
			         		</td>
		      			</tr>
					</tbody>
				</table>
			</div>
		</td>
	</div>
@endsection

@section('scripts')
	<script src="{{asset('js/eliminarRegistros.js')}}"></script>
	<script src="{{asset('app/app.js')}}"></script>
	<script src="{{asset('app/controller/registrosController.js')}}"></script>
@endsection