	<div class="form-group row">
		<label class="col-md col-form-label">Nombre:</label>
		<div class="col-md-8">
			<input type="text" name="name" value="{{ $mostrar->name }}" class="form-control">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md col-form-label">Url:</label>
		<div class="col-md-8">
			<input type="text" name="slug"  value="{{ $mostrar->slug }}" class="form-control">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md col-form-label">Imagen:</label>
		<div class="file-loading"> 
		    <input id="input-b1" name="avatar" type="file" class="file" data-browse-on-zone-click="true">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md col-form-label">Descripción:</label>
		<div class="col-md-8">
			<input type="text" name="descript" value="{{ $mostrar->descript }}" class="form-control">
		</div>
	</div>