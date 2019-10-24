<template>
        <div class="card text-center border-danger" style="margin-top: 15px; margin-bottom: 15px;">
            <div v-if="editMode" style="margin-top: 5px;">
                <label for="persona.picture">Imagen de la Persona</label>
                <input type="text" class="form-control" placeholder="Imagen Url" v-model="persona.picture">
            </div>	
        	<img v-else style="height: 180px; width: 130px; background-color: #EFEFEF; margin-top: 10px;" v-bind:src="persona.picture" class="card-img-top mx-auto d-block border border-dark" alt="">
        		<div class="card-body">
                    <div v-if="editMode" style="margin-bottom: 10px;">
                        <label for="persona.name">Nombre de la persona</label>
                        <input v-if="editMode" type="text" class="form-control" placeholder="Nombre" v-model="persona.name">
                    </div>
        			<h5 class="card-title" v-else> {{ persona.name }} </h5>
        				<button v-if="editMode" class="btn btn-success" @click.prevent="updatePersona(persona, index)"><i class="fas fa-check"></i> Actualizar</button>
        				<button v-else class="btn btn-warning" @click.prevent="editPersona()"><i class="fas fa-edit"></i> Editar</button>
        				<button class="btn btn-danger" @click.prevent="deletePersona(persona, index)"><i class="fas fa-trash"></i> Eliminar</button>
        		</div>
        </div>
</template>
<script>
	import EventBus from '../../event-bus'
    import push from 'push.js'
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
                push.create('¡Persona Eliminada!',{
                    body: "Se Elimino Correctamente",
                    icon: '../images/2110717_0.jpg',
                    timeout: 4000,
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });
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
                        push.create('¡Persona Editada!',{
                        body: "Se Edito Correctamente",
                        icon: '../images/2110717_0.jpg',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
        		})
                .catch(function(err){
                    console.log(err)
                })
        	}
        }
    }
</script>