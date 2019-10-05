	<div class="form-group">
		<label for="">Nombre:</label>
		<input type="text" name="name" value="{{ $mostrar->name }}" class="form-control">
	</div>

	<div class="form-group">
		<label for="">Alias:</label>
		<input type="text" name="slug" value="{{ $mostrar->slug }}" class="form-control">
	</div>

	<div class="form-group">
		<div class="file-loading"> 
		    <input id="input-b1" name="avatar" type="file" class="file" data-browse-on-zone-click="true">
		</div>
	</div>

	<div class="form-group">
		<label for="">Descripción:</label>
		<input type="text" name="descript" value="{{ $mostrar->descript }}" class="form-control">
	</div>