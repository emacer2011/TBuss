<div class="panel panel-default">
	<div class="alert alert-success" hidden="true" role="alert" id="eliminar_alert_success">
		<p id="id_msg_success"></p>
	</div>
	<div class="alert alert-danger" hidden="true" role="alert" id="eliminar_alert_error">
		<p id="id_msg_error"></p>
	</div>
	<div class="form-group row">
		<label for="url_permiso" class="col-sm-1 col-form-label">URL</label>
		<div class="col-sm-11">
			<input type="text" class="form-control" id="url_permiso" name="url_permiso" placeholder="URL Relativa">
		</div>
	</div>
	<label></label>
	<div class="form-group row">
		<label for="metodo" class="col-sm-1 col-form-label">METODO</label>
		<div class="col-sm-11">
			<input type="text" class="form-control" id="metodo" name="metodo" placeholder="Metodo">
		</div>
	</div>
	<button class="btn btn-primary" onclick="enviar_url()">Enviar</button>
</div>