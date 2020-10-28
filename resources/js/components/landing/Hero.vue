<template>
    <section class="hero-pattern bg-center bg-cover  text-center" data-aos="fade-up" data-aos-delay="3000">
        <!-- Seccion Hero-->
        <div class="container">
            <h2 class="text-white p-4 text-5xl font-bold">¡Bienvenidos a BuyDay.cl!</h2>
            <p class="text-white pt-2 pb-2 px-4 text-lg font-medium">Este es un espacio de preinscripción para vendedores, que hemos creado previo al lanzamiento del sitio de ventas, que está en el horno y estamos seguros que les encantará.</p>
            <button v-scroll-to="'#preForm'" class="transition rounded bg-violet text-white p-3 font-bold inline-block mt-6 mb-6">Preinscribirse</button>
            <!--<router-link to="/quienessomos" class="rounded bg-white text-violet p-3 font-bold inline-block mb-16">Quiero saber más</router-link>-->
            <button v-scroll-to="'#quienesSomos'" class="rounded bg-white text-violet p-3 font-bold inline-block mt-6 mb-6">Quiero saber más</button>
        </div>
        <div class="moving-mouse-holder">
            <div class="mouse">
                <div class="mouse-button">&nbsp;</div>
            </div>
            <div class="text">UTILIZA EL SCROLL DE TU MOUSE<br>PARA SABER MAS</div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Hero",
    methods:{
        mostrarQuienesSomos(){
            alert("Funciona");
        }
    }
}
</script>

<style scoped>

</style>
