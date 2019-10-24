<template>
	<div class="row">
		<spinner v-show="loading"></spinner>
						<contenido-person class="col-sm-3 offset-sm-1" v-for="(persona, index) in personas"
						:key="persona.id" 
						:persona="persona"
						@updatePersona="updatePersona(index, ...arguments)" 
						@deletePersona="deletePersona(index)"
						></contenido-person>
	</div>
</template>

<script>
	import EventBus from '../../event-bus'
	import push from 'push.js'
	export default{
		data(){
			return {
				personas: [],
				loading: true
			}
		},
		created(){
			EventBus.$on('persona-added', data => {
				this.personas.push(data)
				push.create('¡Persona Creada!',{
                    body: "Se Creo Correctamente",
                    icon: '../images/2110717_0.jpg',
                    timeout: 4000,
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });
			})
		},
		mounted() {
			let currentRoute = window.location.pathname
            axios
            .get(`http://localhost${currentRoute}/personas`)
            .then((res) => {
            	console.log(res)
				this.personas = res.data
				this.loading = false
            })
        },
        methods:{
        	updatePersona: function(index, persona){
        		this.personas[index] = persona;
        	},
        	deletePersona: function(index){
        		this.personas.splice(index, 1);
        	}
        }
	}
</script>