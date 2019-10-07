<template>
<div class="modal fade" id="AddMsj" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Mensaje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form @submit.prevent="saveMensaje">
	        <div class="form-group">
			    <label>Asunto</label>
			    <input type="text" class="form-control" placeholder="Ingresa el Asunto" v-model="name">
		  	</div>
		  	<div class="form-group">
			    <label>Contenido</label>
			    <input type="text" class="form-control" placeholder="Escribe el contenido" v-model="description">
		  	</div>
		  	<div class="card-footer">
			  	<button type="submit" class="btn btn-outline-primary">Enviar</button>
		  	</div>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
	import EventBus from '../../event-bus'
	export default {
		data(){
			return {
				name: null,
				description: null
			}
		},
		methods:{
			saveMensaje: function(){
				let currentRoute = window.location.pathname

				axios
				.post(`http://localhost${currentRoute}/info`,{
					name: this.name,
					description: this.description
				})
				.then(function(res){console.log(res)
					$('#AddMsj').modal('hide')
					EventBus.$emit('msj-added', res.data.info)
					
				})
				.catch(function(err){
					console.log(err)
				});
			}
		}
	}
</script>