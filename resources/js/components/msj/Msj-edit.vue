<template>
	<div class="card bg-white border-info shadow" style="margin-top: 10px; margin-bottom: 10px;">	
        <div class="card-header bg-white border-dark"> 
			<div class="row">
				<div class="col-md-6">
                    <div v-if="editMode" style="margin-top: 5px; margin-bottom: 10px;">
                        <label for="info.name">Nombre del Asunto</label>
                        <input type="text" class="form-control" placeholder="Asunto" v-model="info.name">
                    </div>
					<h4 v-else>{{ info.name }}</h4>
	        	</div>
			
	            <div class="offset-sm-4">
                    
			        <button v-if="editMode" class="btn btn-success btn-sm rounded-circle" @click.prevent="updateInfo(info, index)"><i class="fas fa-check"></i></button>

			        <button v-else class="btn btn-warning btn-sm rounded-circle" @click.prevent="editInfo()"><i class="fas fa-edit"></i></button>

			        <button class="btn btn-danger btn-sm rounded-circle" @click.prevent="deleteInfo(info, index)"><i class="fas fa-trash"></i></button>
		        </div>
		    </div>
        </div>
        <div v-if="editMode" style="margin-top: 5px; margin-bottom: 10px;">
            <label for="info.description">Contenido</label>
            <textarea id="info.description" cols="30" rows="10" <input type="text" class="form-control" placeholder="Contenido" v-model="info.description"></textarea>
        </div>
        <div class="card-body" v-else>
            {{ info.description }}
        </div>
        <div class="card-footer">
            <small>
                Fue Creado {{ since(info.created_at) }}
            </small>
        </div>
    </div>
</template>

<script>
	import EventBus from '../../event-bus'
    import push from 'push.js'
    import moment from 'moment'

    moment.locale('es');

	export default {
		props:['info','index'],
		data(){
			return{
				editMode: false
			};
		},
        methods: {
        	deleteInfo: function(info, index){
        		let currentRoute = window.location.pathname
        		var url = `http://localhost${currentRoute}/info/` + info.id;
            axios
            .delete(url)
            .then((res) => {
            	console.log(res)
            	this.$emit('deleteInfo');
                push.create('¡Mensaje Eliminado!',{
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
        	editInfo: function(){
        		this.editMode = true;
        	},
        	updateInfo: function(info, index){
                let currentRoute = window.location.pathname
        		var url = `http://localhost${currentRoute}/info/` + info.id;
        		axios.put(url, {
        			name: info.name,
        			description: info.description
        		})
        		.then((res) => {
            	console.log(res)
					this.editMode = false;
	        		this.$emit('updateInfo', info);
                    push.create('¡Mensaje Editado!',{
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
        	},
            since: function(d){
                return moment(d).fromNow();
            }
        }
    }
</script>