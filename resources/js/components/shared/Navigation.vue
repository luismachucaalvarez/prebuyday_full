<template>
    <header class="bg-gradient-bl-lightblue-violet-with-stops h-20" >
    <nav class="bg-grey-darkest p-4 w-full" data-aos="fade-up">
        <img class="mx-auto" src="/img/img_logo1.png" alt="" srcset="" width="200rem">

        <!--<div class="block lg:hidden">
            <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>-->

        <!--<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="#">Inicio</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="#">¿Quienes somos?</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-grey-dark no-underline hover:text-grey-lighter hover:text-underline py-2 px-4" href="#">Lo qué podemos ofrecer</a>
                </li>
                <li class="mr-3">
                    <router-link to="/formcontacto" class="inline-block rounded text-violet bg-white no-underline hover:text-grey-lighter hover:text-underline p-2">Preinscríbase</router-link>
                    <button v-on:click="irFormulario()" class="inline-block rounded text-violet bg-white no-underline hover:text-grey-lighter hover:text-underline p-2">Preinscribase</button>
                </li>
            </ul>
        </div>-->
    </nav>
    </header>
</template>

<script>
export default {
name: "Navigation"
}
</script>

<style scoped>

</style>
