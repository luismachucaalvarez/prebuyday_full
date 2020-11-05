<template>

    <!-- component -->
    <div class="mx-auto bg-gray-700 h-full py-4 flex items-center justify-center px-8">
        <div class="flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-2/3 lg:w-4/5">
            <div class="w-full h-30 object-cover object-center bg-lightshadeblue text-center py-6 font-bold uppercase">
                <h2 class="text-2xl">Ficha contacto</h2>
            </div>
            <div class="flex flex-col w-full md:flex-row">
                <div v-if="iniciacion == true" class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-green rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                    <p class="md:text-xl">Iniciacion realizada</p>
                </div>
                <div v-else class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-red rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                    <p class="md:text-xl">Sin iniciación</p>
                </div>

                <div class="p-4 font-normal text-gray-800 md:w-3/4">
                    <h2 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800">{{ contacto.nombre_completo }}</h2>
                    <p class="leading-normal">Teléfono de contacto: {{ contacto.telefono }}</p>
                    <p class="leading-normal">Correo electrónico: {{ contacto.email }}</p>
                    <p class="leading-normal">Nombre comercio: {{ contacto.nombre_fantasia_comercio }}</p>
                    <br>
                    <h3 class="font-bold">Datos comercio</h3>
                    <div v-if="verificacion_comercio == true">
                        <p class="leading-normal">Rut Comercio: {{ comercio.rut }}</p>
                        <p class="leading-normal">Razón Social: {{ comercio.razon_social }}</p>
                        <p class="leading-normal">Cargo contacto: {{ comercio.cargo }}</p>
                    </div>
                    <div v-else>
                        <p>Contacto no registra datos de comercio formales</p>
                    </div>

                    <br>
                    <h3 class="font-bold">Categorias</h3>
                    <div class="flex flex-row items-center text-gray-700">
                        <ul v-for="categoria in categorias">
                            <li class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">{{ categoria.descripcion }}</li>
                        </ul>
                    </div>
                    <div class="flex flex-row items-center mt-4 text-gray-700">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "detalleContacto",
    data(){
        return{
            id: "",
            contacto: [],
            comercio: [],
            categorias: [],
            iniciacion: "",
            verificacion_comercio: ""

        }
    },
    methods:{
        obtenerDetalleContacto(){
            this.id = this.$route.params.id;
            //axios.get(`https://preinscripcion.buyday.cl/api/contactos/${this.id}`)
            axios.get(`http://localhost:8000/api/contactos/${this.id}`)
            .then(response =>{
                console.log(response.data)
                this.contacto = response.data.contacto
                if (response.data.contacto.iniciacion_realizada == 1){
                    console.log('Con iniciacion');
                    this.iniciacion = true
                } else {
                    console.log('Sin');
                    this.iniciacion = false
                }

                for (let x = 0; x < response.data.categorias.length; x++){
                    this.categorias.push(response.data.categorias[x]);
                }
                console.log(this.categorias)
                if (response.data.comercio.length > 0){

                    this.comercio = response.data.comercio[0]
                    this.verificacion_comercio = true
                } else {
                    this.verificacion_comercio = false
                }
            }).catch(error =>{
                console.log(error)
            })
        }


        /*async obtenerDetalleContacto(){
            axios.get('')
        }*/
    },
    mounted() {
        this.obtenerDetalleContacto();
    }

}
</script>



<style scoped>


</style>
