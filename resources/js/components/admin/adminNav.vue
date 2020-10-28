<template>
    <nav class="bg-darkviolet">
        <ul class=" flex flex-col md:flex-row">
            <li class="flex-1 mr-2">
                <a class="text-center block py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white hover:text-lightblue"><router-link :to="{ name: 'dashboardInicio' }">Inicio</router-link></a>
            </li>
            <li class="flex-1 mr-2">
                <a class="text-center block py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white hover:text-lightblue"><router-link :to="{ name: 'dashboardUsuarios' }">Usuarios</router-link></a>
            </li>
            <li class="flex-1 mr-2">
                <a class="text-center block hover:text-lightblue text-white hover:bg-gray-200 py-2 px-4" href="#"><router-link :to="{ name: 'dashboardContactos' }">Contactos</router-link></a>
            </li>
            <li class="text-center flex-1">
                <a class="block py-2 px-4 text-white hover:text-lightblue" href="#"><router-link :to="{ name: 'logout' }">Cerrar Sesión</router-link></a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "adminNav"
}
</script>

<style scoped>

</style>
