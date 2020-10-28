<template>
    <div data-aos="fade-right" data-aos-delay="1500">

    <section class="captacion-pattern">
        <div class="container flex flex-wrap py-8">
            <div class="lg:p-4 w-full sm:w-full lg:w-1/2 text-white" >
                <div class="container border-b-8 border-violet">
                    <h2 class="text-3xl uppercase italic text-center font-bold">Únete a nosotros</h2>
                </div>
                <p class="py-4 px-2 text-xl">No pierdas la oportunidad de seguir vendiendo, somos tu nueva ventana para potenciales compradores. Nos convertiremos en tu aliado en el aumento de tus ventas.</p>
            </div>

            <div class="p-4 w-full sm:w-full lg:w-1/2" data-aos="fade-left">

                <FormPreinscripcion></FormPreinscripcion>

            </div>


        </div>


    </section>
        <Footer></Footer>
    </div>
</template>

<script>
import FormPreinscripcion from "./FormPreinscripcion";
import Footer from "./Footer"
export default {
name: "SeccionCaptacion",
    components:{
    FormPreinscripcion, Footer
    }
}
</script>

<style scoped>

</style>
