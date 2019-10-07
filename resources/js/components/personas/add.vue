<template>
<div class="modal fade" id="addPersona" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form @submit.prevent="savePersona">
	        <div class="form-group">
			    <label>Nombre</label>
			    <input type="text" class="form-control" placeholder="Ingresa el nombre de la Persona" v-model="name">
		  	</div>
		  	<div class="form-group">
			    <label>Foto/Perfil</label>
			    <input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Guardar</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
  import EventBus from '../../event-bus'
  export default{
    data(){
      return {
        name: null,
        picture: null
    }
  },
  methods:{
    savePersona: function(){

      let currentRoute = window.location.pathname
      
      axios.post(`http://localhost${currentRoute}/personas`, {
        name: this.name,
        picture: this.picture
      })
      .then(function(res){
        console.log(res)
        $('#addPersona').modal('hide')
        EventBus.$emit('persona-added', res.data.persona)
      })
      .catch(function(err){
        console.log(err)
      });
    }
  }
}
</script>

<style>
</style>