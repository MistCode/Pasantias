<template>
	<div class="card bg-white border-info shadow" style="margin-top: 10px; margin-bottom: 10px;">	
        <div class="card-header bg-white border-dark"> 
			<div class="row">
				<div class="col-md-6">
					<input v-if="editMode" type="text" class="form-control" placeholder="Asunto" v-model="info.name">
				
	            <h4 v-else>{{ info.name }}</h4>
	        	</div>
			
	            <div class="offset-sm-4">
			        <button v-if="editMode" class="btn btn-success btn-sm rounded-circle" @click.prevent="updateInfo(info, index)"><i class="fas fa-check"></i></button>

			        <button v-else class="btn btn-warning btn-sm rounded-circle" @click.prevent="editInfo()"><i class="fas fa-edit"></i></button>

			        <button class="btn btn-danger btn-sm rounded-circle" @click.prevent="deleteInfo(info, index)"><i class="fas fa-trash"></i></button>
		        </div>
		    </div>
        </div>
        	<input v-if="editMode" type="text" class="form-control" placeholder="Contenido" v-model="info.description">
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
                toastr.success('Mensaje Eliminado')
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
                    toastr.success('Mensaje Editado')
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