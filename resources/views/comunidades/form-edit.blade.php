	<div class="form-group">
		<label for="">Nombre de la Comunidad:</label>
		<input type="text" name="name" value="{{ $dat->name }}" class="form-control">
	</div>

	<div class="form-group">
		<label for="">Escribe tu codigo:</label>
		<input type="text" name="slug" value="{{ $dat->slug }}" class="form-control">
	</div>

	<div class="form-group">
		<input id="avatar" name="avatar" type="file" class="file" data-browse-on-zone-click="true">
	</div>

	<div class="form-group">
		<label for="">¿De que se tratara esta Comunidad?</label>
		<input type="text" name="describir" value="{{ $dat->describir }}" class="form-control">
	</div>