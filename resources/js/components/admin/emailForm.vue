<template>
    <form ref="formPre" @submit.prevent="enviarCorreo" class="w-full max-w-lg bg-white rounded py-8 px-4">
        <fieldset :disabled="loading">
            <div class="contact-form-error alert alert-danger" v-if="error">
                <strong>¡Error!</strong> Por favor revisa el formulario, se te debe haber pasado un campo por alto :(
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full py-2 px-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="casillero-correo">
                        Asunto
                    </label>
                    <ValidationProvider rules="required|email" v-slot="{errors}">
                        <input class="appearance-none block w-full bg-gray-200 text-violet border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" id="casillero-correo" v-model="contacto.email" type="email" placeholder="nombre@ejemplo.cl">
                        <span>{{ errors[0] }}</span>
                    </ValidationProvider>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full py-2 px-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-black text-xs font-bold mb-1" for="nombre_fantasia_comercio">
                        Nombre fantasía comercio:
                    </label>
                    <ValidationProvider rules="text" v-slot="{errors}">
                        <input class="appearance-none block w-full bg-gray-200 text-violet border border-red-500 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" v-model="contacto.nombre_fantasia_comercio" id="nombre_fantasia_comercio" type="text" placeholder="Si tu negocio tiene un nombre, por favor indiquelo">
                        <span>{{ errors[0] }}</span>
                    </ValidationProvider>
                </div>
            </div>



            <div class="flex flex-wrap -mx-3">
                <div class="w-full py-2 px-3 md:mb-0">
                    <button class="bg-violet text-white font-bold py-2 px-4 rounded" type="submit">Enviar</button>
                </div>
            </div>
        </fieldset>
    </form>
</template>

<script>
export default {
name: "emailForm"
}
</script>

<style scoped>

</style>
