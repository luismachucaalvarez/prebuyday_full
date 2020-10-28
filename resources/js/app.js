/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import App from "./App.vue";
import Vue from 'vue';
import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueScrollTo from 'vue-scrollto';
import { library } from '@fortawesome/fontawesome-svg-core';
import { far } from '@fortawesome/free-regular-svg-icons'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import axios from 'axios';
import VueGoodTablePlugin from 'vue-good-table';
import { ValidationObserver } from "vee-validate";
import { ValidationProvider, extend } from 'vee-validate/dist/vee-validate.full.esm';
import KonamiCode from 'vue-konami-code';
import {alpha_spaces, required, digits, email} from "vee-validate/dist/rules";
import { rutValidator, rutFilter, rutInputDirective } from 'vue-dni';
import aos from 'aos';
import 'aos/dist/aos.css'
import 'vue-good-table/dist/vue-good-table.css'
import Loading from 'vue-loading-overlay';

import 'vue-loading-overlay/dist/vue-loading.css';

Vue.use(Loading);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueSweetalert2);
Vue.use(VueScrollTo);
library.add(far)

Vue.use(VueGoodTablePlugin);
Vue.use(KonamiCode, {callback: function () {
        alert('Snake? Snake!? Snaaaake!')
    }});
Vue.directive('rut', rutInputDirective);

extend("required", {
    ...required,
    message: 'Por favor revisa este campo'
});

extend("alpha_spaces",{
    ...alpha_spaces,
    message: 'Solo se aceptan letras y espacios'
});

extend("digits",{
    ...digits,
    message: 'Solo se aceptan digitos'
});

extend("telefono", value =>{
    if (value.length == 9){
        return true;
    }
    return  'El número telefónico debe tener nueve dígitos'
});

extend("email",{
    ...email,
    message: 'Debes ingresar una dirección de correo válido'
});


import routes from "./router";
import store from "./store";

Vue.component("ValidationProvider", ValidationProvider);
Vue.component("ValidationObserver", ValidationObserver);
Vue.component('Navigation', require('./components/shared/Navigation').default);
Vue.component('font-awesome-icon', FontAwesomeIcon);

axios.defaults.baseURL = 'http://localhost:8000/api';

//Vue.config.productionTip = false

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const app = new Vue({
    el: '#app',
    created() {
        aos.init({
            duration: 2000,
        })
    },
    components:{
      ValidationProvider,
    },
    router: new VueRouter(routes),
    store,
    render: h => h(App),
});


