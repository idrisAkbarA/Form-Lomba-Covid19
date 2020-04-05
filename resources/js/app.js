/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 

require('./bootstrap');
import * as easings from 'vuetify/es5/services/goto/easing-patterns';
import Vuetify from 'vuetify';
import Axios from 'axios';
window.Vue = require('vue');
Vue.use(Vuetify);
import LoadScript from 'vue-plugin-load-script';

Vue.use(LoadScript);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('landing', require('./components/Landing.vue').default);
Vue.component('takeoff', require('./components/Takeoff.vue').default);
Vue.component('poster', require('./components/Poster.vue').default);
Vue.component('videox', require('./components/Videox.vue').default);
Vue.component('video-upload', require('./components/VideoUpload.vue').default);
Vue.component('poster-upload', require('./components/PosterUpload.vue').default);
Vue.component('peserta', require('./components/peserta.vue').default);
Vue.component('privasi', require('./components/privasi.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const vuetify = new Vuetify(
    {
        theme: {
          dark: true,
        },
      }
);
const app = new Vue({
    el: '#app',
    vuetify,
});
