@extends('layouts.template_base')

@section('content')
<div id="mySidenav" class="sidenav" data-ng-app="registrosModule" data-ng-controller="usuarioApiCtrl as vm">
	<h1 class="sidenav-titulo">Administración</h1>
	<hr>
		 <div>
			<ul>
				<li id="menuUrl" data-ng-init="vm.urlListadoUrl='{{asset('ABM/usuarios/listado/url')}}'" data-ng-click="vm.buscarUrls()">Urls</li>
				<li id="menuAltaUrl" data-ng-init="vm.urlForm='{{asset('ABM/usuarios/alta/url')}}'" data-ng-click="vm.formUrl()">Alta Url</li>
				<li id="menuPermisos" data-ng-init="vm.urlUsuarios='{{asset('ABM/usuarios/listado')}}'" data-ng-click="vm.buscarUsuarios()">Permisos</li>
				<li id="menuRoles" data-ng-init="vm.urlPermisos='{{asset('ABM/usuarios/roles')}}'" data-ng-click="vm.buscarPermisos()">Roles</li>
			</ul>
		 </div>
</div>

<div id="myContentUser"></div>

@endsection

@section('scripts')
	<link rel="stylesheet" href="{{asset('css/abmUsuarios.css')}}">

	<script src="{{asset('app/app.js')}}"></script>
	<script src="{{asset('app/controller/usuariosController.js')}}"></script>
	<script src="{{asset('js/abmUsuarios.js')}}"></script>
@endsection