/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('lista-de-personas', require('./components/personas/list.vue').default);
Vue.component('modal-button', require('./components/personas/modal-button.vue').default);
Vue.component('create-form-person', require('./components/personas/add.vue').default);
Vue.component('contenido-person', require('./components/personas/contenido.vue').default);
Vue.component('spinner', require('./components/widgets/Spinner.vue').default);

//Vue.component('listando', require('./components/info/Read.vue').default);
//Vue.component('formulario', require('./components/info/Create.vue').default);
//Vue.component('boton', require('./components/info/Click.vue').default);
//Vue.component('content', require('./components/info/contenido-msj.vue').default);
/**

No Eliminar
updatePersona: function(persona){
                let currentRoute = window.location.pathname
            var url = `http://localhost${currentRoute}/personas/` + persona.id;
            axios.put(url, {
              name: persona.name,
              picture: persona.picture
            })
            .then((res) => {
              console.log(res)
          this.editMode = false;
          this.personas[index, 1] = persona
            })
                .catch(function(err){
                    console.log(err)
                })
          }
esto es importante

 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
