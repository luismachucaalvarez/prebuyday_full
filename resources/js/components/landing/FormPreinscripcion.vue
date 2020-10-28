<template>
    <div id="preForm">
        <!--<div class="loader" v-if="loading">
            <span class="helper"></span>
            <img class="loaderImg" src="../../../img/loader.gif" alt="">
        </div>-->
        <form ref="formPre" @submit.prevent="ejecutarFormulario" class="w-full bg-white rounded py-8 px-4">
            <fieldset :disabled="loading">
                <div class="contact-form-error alert alert-danger" v-if="error">
                    <strong>¡Error!</strong> Por favor revisa el formulario, se te debe haber pasado un campo por alto :(
                </div>
                <div>
                    <p class="text-right text-xs"><span class="obligatorio">*</span>Campos obligatorios</p>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/2 py-2 px-3">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="casillero-nombre">
                            Nombre Completo<span class="obligatorio">*</span>
                        </label>
                        <ValidationProvider rules="required|alpha_spaces" v-slot="{errors}">
                            <input class="appearance-none block w-full bg-gray-200 border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" id="casillero-nombre" v-model="contacto.nombre_completo" type="text" placeholder="Indique su nombre">                      <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                    <div class="w-full md:w-1/2 py-2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="casillero-telefono">
                            Número de contacto<span class="obligatorio">*</span>
                        </label>
                        <ValidationProvider rules="required|telefono|digits:9" v-slot="{errors}">
                            <div class="flex">
                                <label class="w-2/12 text-md font-light block px-1 py-2">+56</label>
                                <input class="w-9/12 appearance-none block w-full bg-gray-200 border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" id="casillero-telefono" v-model="contacto.telefono" type="tel" placeholder="XXXXXXXX">
                            </div>
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full py-2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="casillero-correo">
                        Correo de contacto<span class="obligatorio">*</span>
                        </label>
                        <ValidationProvider rules="required|email" v-slot="{errors}">
                            <input class="appearance-none block w-full bg-gray-200  border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" id="casillero-correo" v-model="contacto.email" type="email" placeholder="nombre@ejemplo.cl">
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full py-2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="nombre_fantasia_comercio">
                            Nombre fantasía comercio
                        </label>
                        <ValidationProvider rules="text" v-slot="{errors}">
                            <input class="appearance-none block w-full bg-gray-200  border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" v-model="contacto.nombre_fantasia_comercio" id="nombre_fantasia_comercio" type="text" placeholder="Si tu negocio tiene un nombre, por favor indiquelo">
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/2 py-2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" >
                             Si realizaste iniciación de actividades, activa esta opción (Si no lo has hecho, no te preocupes ;))
                        </label>
                        <div class="form-switch inline-block align-middle">
                            <input v-on:click="chequeoIniciacion" type="checkbox" v-model="contacto.iniciacion_realizada" id="interruptor_iniciacion_realizada" class="form-switch-checkbox" />
                            <label class="form-switch-label" for="interruptor_iniciacion_realizada"></label>
                        </div>
                        <label id="frase_iniciacion" class="text-xs text-grey-dark" for="interruptor_iniciacion_realizada">No</label>
                    </div>
                    <div id="div-rut-comercio" class="w-full md:w-1/2 py-2 px-3 md:mb-0 hidden">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="rut_comercio">
                            RUT comercio<span class="obligatorio">*</span>
                        </label>
                        <ValidationProvider rules="required" v-slot="{errors}">
                            <input v-rut:live class="appearance-none block w-full bg-gray-200 border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" v-model="contacto.rut_comercio" id="rut_comercio" type="text" placeholder="XXXXXXXX-X" disabled>
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                </div>
                <div id="div-razon-social" class="flex flex-wrap -mx-3 hidden">
                    <div class="w-full py-2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="razon_social">
                            Razón social<span class="obligatorio">*</span>
                        </label>
                        <ValidationProvider rules="required" v-slot="{errors}">
                            <input class="appearance-none block w-full bg-gray-200 border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white elemento-sujeto-iniciacion" v-model="contacto.razon_social" id="razon_social" type="text" placeholder="Indique la razón social del comercio"
                                    disabled>
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                </div>

                <div id="div-cargo-contacto" class="flex flex-wrap -mx-3 hidden">
                    <div class="w-full py-2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="cargo_contacto">
                            Cargo<span class="obligatorio">*</span>
                        </label>
                        <div class="relative">
                            <multiselect class="appearance-none block w-full bg-gray-200 border border-red-500 rounded leading-tight focus:outline-none focus:bg-white" v-model="contacto.cargo" placeholder="Indique su cargo" :taggable="true" :multiple="false" :options="cargo_options" track-by="id" :custom-label="mostrarEtiquetasCargos" id="cargo_contacto">
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full py-2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="seleccion-categorias">
                            Escoja las categorias de productos que deseas vender<span class="obligatorio">*</span>
                        </label>
                        <ValidationProvider rules="required" v-slot="{errors}">
                            <multiselect class="appearance-none block w-full bg-gray-200 border border-red-500 rounded leading-tight focus:outline-none focus:bg-white" v-model="contacto.categorias" placeholder="Elija por lo menos una categoria" :taggable="true" :multiple="true" :options="categorias_options" track-by="id" :custom-label="mostrarEtiquetasCategorias" id="seleccion-categorias">
                            </multiselect>
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full py-2 px-3 md:mb-0 text-sm">
                        <p>Desde Buyday.cl nos comprometemos con lo siguiente, según la ley n° 19.628:</p>
                        <ul>
                            <li class="list-disc">Te contactaremos solo para fines comerciales.</li>
                            <li class="list-disc">No venderemos tu información a terceros ni te enviaremos spam.</li>
                            <li class="list-disc">Te borraremos de la base de datos cuando lo estimes necesario o en el plazo establecido por ley.</li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full py-2 px-3 md:mb-0">
                        <label class="inline-flex items-center mt-3">
                            <ValidationProvider :rules="{ required: { allowFalse: false }}" v-slot="{errors}">
                                <input type="checkbox" v-model="contacto.terminos" class="form-checkbox h-5 w-5 text-violet"><span class="ml-2 text-violet">Declaro haber leido y aceptado las condiciones indicadas anteriormente, y que los datos ingresados son fidedignos.</span>
                                <span>{{ errors[0] }}</span>
                            </ValidationProvider>
                        </label>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full py-2 px-3 md:mb-0">
                        <button class="bg-violet w-full text-white font-bold py-2 px-4 rounded" @click="show = !show; enviarCorreo" type="submit">Enviar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</template>



<script>

//import Multiselect from 'vue-multiselect';
import Multiselect from 'vue-multiselect/src/Multiselect'
import VModal from 'vue-js-modal';
//import ModalAgradecimiento from "./ModalAgradecimiento";
//import Loading from 'vue-loading-overlay';
//import 'vue-loading-overlay/dist/vue-loading.css';
//import { rutValidator, rutFilter, rutInputDirective } from 'vue-dni';
//import ModalAgradecimiento from './ModalAgradecimiento';


export default {
    components:{
        Multiselect,
        VModal
        //Loading,
        //ModalAgradecimiento
    },
    "compilerOptions":{
      "resolveJsonModule": true,
      "esModuleInterop": true
    },
    data(){

        return{
            contacto: {
                nombre_completo:[],
                telefono:[],
                email:[],
                rut_comercio: null,
                razon_social:[],
                nombre_fantasia_comercio: [],
                cargo: [],
                iniciacion_realizada:false,
                categorias: [],
                terminos: ''
            },
            //isLoading: false,
            categorias_options: [],
            cargo_options: [],
            show: true,
            success: false,
            error: false,
            loading: false
            //agradecimiento: "Muchas gracias por su preferencia"
            //fullPage: false

        }
    },
    created() {
        extend('rut_comercio', rutValidator);
    },
    mounted() {
        this.mostrarCargos();
        this.mostrarCategorias();
    },
    methods:{
        ejecutarFormulario(){
            let loader = this.$loading.show({
                loader: 'dots'
            });
            setTimeout(() => {
                loader.hide()
            }, 6000)
            this.enviarCorreo();
            this.crearContacto();
        },
        mostrarCargos(){
          var self = this;
          axios.get('http://localhost:8000/api/cargos')
            .then(response => {
                self.cargo_options = response.data
            })
            .catch(error => console.log(error))
        },
        mostrarCategorias(){
            var self = this;
            axios.get('http://localhost:8000/api/categorias')
                .then(response => {
                    console.log(response.data)
                    self.categorias_options = response.data
                })
                .catch(error=>console.log(error))
        },
        crearContacto(){

                this.axios.post('http://localhost:8000/api/nuevocontacto', this.contacto)
                    .then((response) => {

                        this.success = true;
                        this.$swal({
                            icon: 'success',
                            text: 'Muchas gracias por inscribirte con nosotros, te contactaremos en breve. Por mientras, revisa tu correo electrónico ;)'
                        })
                        this.reset()
                        //this.mostrarMensaje()
                        console.log(response.data)
                        //location.reload()
                    }).catch((error)=>{
                        this.error = true;
                        this.$swal({
                            icon: 'error',
                            text: 'Se han detectado errores en el formulario, por favor corrigelo y envialo nuevamente :('
                    })
                        console.log(error)
                    })
        },
        enviarCorreo(){
            this.axios.post('http://localhost:8000/api/enviarcorreo', this.contacto)
            .then((response) => {
                console.log(response);
            }).catch((error)=>{
                this.error = true;
                console.log(error)
            })
        },
        reset(){
          this.success = false;
          this.error = false;
          for (let field in this.contacto){
              this.contacto[field] = null;
          }
        },
        mostrarEtiquetasCargos(option){
            return `${option.nombre}`
        },
        mostrarEtiquetasCategorias (option){
            return `${option.descripcion}`
        },
        chequeoIniciacion() {
        let checkIniciacion = document.getElementById('interruptor_iniciacion_realizada');
        let textoIniciacion = document.getElementById('frase_iniciacion');
        let divRutComercio = document.getElementById('div-rut-comercio');
        let divRazonSocial = document.getElementById('div-razon-social');
        let divCargoContacto = document.getElementById('div-cargo-contacto');
        let casilleroRut = document.getElementById('rut_comercio');
        let casilleroRazonSocial = document.getElementById('razon_social');
        let casilleroNombrefantasia = document.getElementById('nombre_fantasia_comercio');
        let seleccionCargo = document.getElementById('cargo_contacto');
        if (checkIniciacion.checked === true) {
            textoIniciacion.innerText = 'Sí';
            divRutComercio.classList.remove('hidden');
            divRazonSocial.classList.remove('hidden');
            divCargoContacto.classList.remove('hidden');
            casilleroRut.disabled = false;
            casilleroRazonSocial.disabled = false;
            seleccionCargo.disabled = false;
        } else {
            textoIniciacion.innerText = 'No';
            divRutComercio.classList.add('hidden');
            divRazonSocial.classList.add('hidden');
            divCargoContacto.classList.add('hidden');
            casilleroRut.disabled = true;
            casilleroRazonSocial.disabled = true;
            seleccionCargo.disabled = true;
        }
        },
    },

}



</script>


<style src="../../../../node_modules/vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>

#preForm {
    /* Components Root Element ID */
    position: relative;
}

.loader{  /* Loader Div Class */
    position: absolute;
    top:0px;
    right:0px;
    width:100%;
    height:100%;
    background-color:#eceaea;
    background-image: url('/assets/loader.gif');
    background-size: 50px;
    background-repeat:no-repeat;
    background-position:center;
    z-index:10000000;
    opacity: 0.4;
    filter: alpha(opacity=40);
}
</style>
