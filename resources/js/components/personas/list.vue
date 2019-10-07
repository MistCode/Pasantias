<template>
	<div class="container">
			<spinner v-show="loading"></spinner>
				<contenido-person v-for="(persona, index) in personas"
				:key="persona.id" 
				:persona="persona"
				@updatePersona="updatePersona(index, ...arguments)" 
				@deletePersona="deletePersona(index)"
				></contenido-person>
	</div>
</template>

<script>
	import EventBus from '../../event-bus'
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