@extends('layouts\template_base')

@section('content')	
	<div class="container">
	    <div class="page-header">
	        <h1><strong><font>Registro Terminal</font></strong></h1>
	    </div>
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left" style="padding-top: 10.5px;"> <font size = "5"color = "000000"><strong>Uso de Plataforma</strong></font></h4>
            </div>
            <div class="panel-body">
				@include ('function/adminErrorRegistrar')
				{{ Form::open(['route' => 'nuevo.registro.store', 'method' => 'POST', 'novalidate']) }}
					 <div class="form-group">
                      	{!! Form::label('empresa', 'Empresa') !!}
                      	{!! Form::text('empresa', Input::old('empresa'), ['class' => 'form-control' , 'required' => 'required','placeholder' => 'Nombre de la Empresa']) !!}
                  	</div>
                  	<div class="form-group">
                      	{!! Form::label('origen', 'Origen') !!}
                      	{!! Form::text('origen', Input::old('origen'), ['class' => 'form-control' , 'required' => 'required','placeholder' => 'Ciudad de Origen']) !!}
                  	</div>
                  	<div class="form-group">
                      	{!! Form::label('destino', 'Destino') !!}
                      	{!! Form::text('destino', Input::old('destino'), ['class' => 'form-control' , 'required' => 'required','placeholder' => 'Ciudad de Destino']) !!}
                  	</div>
                  	<div class="form-group">
                      	{!! Form::label('coche', 'Nro Colectivo') !!}
                      	{!! Form::text('coche', Input::old('coche'), ['class' => 'form-control' , 'required' => 'required','placeholder' => 'Numero de Colectivo']) !!}
                  	</div>
                  	<div class="form-group">
                      	{!! Form::label('plataforma', 'Nro Plataforma') !!}
                      	{!! Form::text('plataforma', Input::old('plataforma'), ['class' => 'form-control' , 'required' => 'required','placeholder' => 'Numero de Plataforma']) !!}
                  	</div>
				    <div class="form-group">
				    	<div class="row">
				    		<div class="col-sm-6">
				    			{!! Form::label('datetimepicker', 'Fecha') !!}
				    		</div>
				    		<div class="col-sm-6">
				    			{!! Form::label('datetimepicker1', 'Hora') !!}
				    		</div>
				    	</div>
					    <div class="row">
					        <div class='col-sm-6'>
					        	{!! Form::text('fecha', Input::old('fecha'), ['class' => 'form-control' , 'required' => 'required', 'id' => 'fecha']) !!}
					        </div>
					        <div class='col-sm-6'>
					            {!! Form::text('hora', Input::old('hora'), ['class' => 'form-control' , 'required' => 'required', 'id' => 'hora']) !!}
					        </div>
					    </div>
					</div>
					<div class="form-group">
						{!! Form::label('opciones', 'Tipo de Uso') !!}
						{{ Form::select('opciones', ['ARRIBO'=>'ARRIBO', 'SALIDA'=>'SALIDA'], Input::old('opciones'), ['class' => 'form-control']) }}
					</div>

			        {!! Form::submit('Enviar', ['class' => 'btn btn-default']) !!}
				{{ Form::close() }} 
            </div>
        </div>
	</div>
@endsection
@section('scripts')
	<link rel="stylesheet" href="{{asset('plugins/datePicker/css/bootstrap-datetimepicker.css')}}">
	<script src="{{asset('plugins/datePicker/js/moment.js')}}"></script>
    <script src="{{asset('plugins/datePicker/js/bootstrap-datetimepicker.js')}}"></script>
    <!-- javascript & css propio -->
	<script src="{{asset('js/registrar.js')}}"></script>
@endsection	