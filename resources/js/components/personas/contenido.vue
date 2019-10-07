<template>
<div class="row">
    <div class="col-sm">
		<div class="card text-center border border-danger" style="width: 18rem; margin-top: 30px; margin-bottom: 20px;">
			<input v-if="editMode" type="text" class="form-control" placeholder="Imagen Url" v-model="persona.picture">	
			<img v-else style="height: 150px; width: 100px; background-color: #EFEFEF; margin-top: 5px;" v-bind:src="persona.picture" class="card-img-top rounded-circle mx-auto d-block border border-danger" alt="">
				<div class="card-body">
					<input v-if="editMode" type="text" class="form-control" placeholder="Nombre" v-model="persona.name">
					<h5 class="card-title" v-else> {{ persona.name }} </h5>
						<a href="#" class="btn btn-primary">Ver Mas <i class="fas fa-plus-circle"></i></a>
						<button v-if="editMode" class="btn btn-success" @click.prevent="updatePersona(persona, index)"><i class="fas fa-check"></i> Actualizar</button>
						<button v-else class="btn btn-warning" @click.prevent="editPersona()"><i class="fas fa-edit"></i> Editar</button>
						<button class="btn btn-danger" @click.prevent="deletePersona(persona, index)"><i class="fas fa-trash"></i> Eliminar</button>
				</div>
		</div>
    </div>
</div>
</template>
<script>
	import EventBus from '../../event-bus'
	export default {
		props:['persona','index'],
		data(){
			return{
				editMode: false
			};
		},
        methods: {
        	deletePersona: function(persona, index){
        		let currentRoute = window.location.pathname
        		var url = `http://localhost${currentRoute}/personas/` + persona.id;
            axios
            .delete(url)
            .then((res) => {
            	console.log(res)
            	this.$emit('deletePersona');
            })
            .catch(function(err){
                console.log(err)
            })
        	},
        	editPersona: function(){
        		this.editMode = true;
        	},
        	updatePersona: function(persona, index){
                let currentRoute = window.location.pathname
        		var url = `http://localhost${currentRoute}/personas/` + persona.id;
        		axios.put(url, {
        			name: persona.name,
        			picture: persona.picture
        		})
        		.then((res) => {
            	console.log(res)
					this.editMode = false;
					const persona = response.data;
	        		this.$emit('updatePersona', persona);
        		})
                .catch(function(err){
                    console.log(err)
                })
        	}
        }
    }
</script>