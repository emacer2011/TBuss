@extends('layouts\template_base')
	<div class="jumbotron">
		<span class="glyphicon glyphicon-eye-open" id="ver-panel"></span>
		<span class="glyphicon glyphicon-eye-close" id="ocultar-panel"></span>
		<h1>SALIDAS Y ARRIBOS</h1>
		<h2 id="hora"></h2>
		<h2 id="fecha"></h2>
	</div>
@section('content')
	@if($registros)
		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<td>EMPRESA</td>
						<td>COCHE</td>
						<td>ORIGEN</td>
						<td>DESTINO</td>
						<td>FECHA</td>
						<td>HORA</td>
						<td>DEMORA</td>
						<td>PLATAFORMA</td>
						<td>ARRIBO/SALIDA</td>
					</tr>
				</thead>
				<tbody id="tviajes">
		      		@foreach($registros as $reg)
		      			<tr class="success">
			         		<td class="td{{$reg->id}}">{{strtoupper($reg->empresa)}}</td>
			         		<td class="td{{$reg->id}}">{{$reg->coche}}</td>
			         		<td class="td{{$reg->id}}">{{strtoupper($reg->origen)}}</td>
			         		<td class="td{{$reg->id}}">{{strtoupper($reg->destino)}}</td>
			         		<td class="td{{$reg->id}}">{{$reg->fecha}}</td>
			         		<td class="td{{$reg->id}}">{{$reg->hora}}</td>
			         		<td class="td{{$reg->id}}"> {{$reg->demora == 0? "SIN DEMORA": "$reg->demora MIN."}} </td>
			         		<td>{{$reg->plataforma}}</td>
			         		<td class="td{{$reg->id}}">{{strtoupper($reg->tipo_uso)}}</td>
		      			</tr>
			      	@endforeach
				</tbody>
			</table>
		</div>
	@else
		<h1>no tengo registros</h1>
	@endif
@endsection

@section('scripts')
	<link rel="stylesheet" href="{{asset('css/listado_registros.css')}}">
	<script src="{{asset('js/menuListarRegistros.js')}}"></script>
	<script src="{{asset('js/actualizar_reloj.js')}}"></script>
	<script src="{{asset('plugins/tween/jstween-1.2.min.js')}}"></script>
	<script src="{{asset('js/actualizar_viajes.js')}}"></script>
@endsection