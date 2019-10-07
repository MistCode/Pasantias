<template>
        <div class="card text-center border-danger" style="margin-top: 15px; margin-bottom: 15px;">
        			<input v-if="editMode" type="text" class="form-control" placeholder="Imagen Url" v-model="persona.picture">	
        			<img v-else style="height: 180px; width: 130px; background-color: #EFEFEF; margin-top: 10px;" v-bind:src="persona.picture" class="card-img-top mx-auto d-block border border-dark" alt="">
        				<div class="card-body">
        					<input v-if="editMode" type="text" class="form-control" placeholder="Nombre" v-model="persona.name">
        					<h5 class="card-title" v-else> {{ persona.name }} </h5>
        						<button v-if="editMode" class="btn btn-success" @click.prevent="updatePersona(persona, index)"><i class="fas fa-check"></i> Actualizar</button>
        						<button v-else class="btn btn-warning" @click.prevent="editPersona()"><i class="fas fa-edit"></i> Editar</button>
        						<button class="btn btn-danger" @click.prevent="deletePersona(persona, index)"><i class="fas fa-trash"></i> Eliminar</button>
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
	        		this.$emit('updatePersona', persona);
        		})
                .catch(function(err){
                    console.log(err)
                })
        	}
        }
    }
</script>