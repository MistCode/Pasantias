	<div class="form-group row">
		<label class="col-md col-form-label">Nombre de la Comunidad:</label>
		<div class="col-md-8">
			<input type="text" name="name" value="{{ $dat->name }}" class="form-control">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md col-form-label">Url:</label>
		<div class="col-md-8">
			<input type="text" name="slug" value="{{ $dat->slug }}" class="form-control">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md col-form-label">Imagen:</label>
		<div class="file-loading"> 
		    <input id="input-b1" name="avatar" type="file" class="file" data-browse-on-zone-click="true">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md col-form-label">¿De que se tratara esta Comunidad?</label>
		<div class="col-md-8">
			<input type="text" name="describir" value="{{ $dat->describir }}" class="form-control">
		</div>
	</div>