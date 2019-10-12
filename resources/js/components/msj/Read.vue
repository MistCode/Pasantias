<template>
    <div class="container">
        <div class="row justify-content-center">
            <spinner v-show="load"></spinner>
                <edita class="col-md-8" v-for="(info, index) in infos"
                        :key="info.id" 
                        :info="info"
                        @updateInfo="updateInfo(index, ...arguments)" 
                        @deleteInfo="deleteInfo(index)"
                        ></edita>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../event-bus'
    import moment from 'moment'

    moment.locale('es');

    export default {
        data(){
            return {
                infos: [],
                load: true
            }
        },
        created(){
            EventBus.$on('msj-added', data => {
                this.infos.push(data)
                toastr.success('Mensaje Creado')
            })
        },
        mounted() {
            let currentRoute = window.location.pathname
            axios
            .get(`http://localhost${currentRoute}/info`)
            .then((res) => {
                this.infos = res.data
                this.load = false
            })
        },
        methods:{
            updateInfo: function(index, info){
                this.infos[index] = info;
            },
            deleteInfo: function(index){
                this.infos.splice(index, 1);
            }
        }
    }
</script>