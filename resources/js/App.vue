<template>
    <router-view></router-view>
    <!--<div>
        <Navbar></Navbar>
        <Hero></Hero>
        <QuienesSomos></QuienesSomos>
        <NuestroFoco></NuestroFoco>
        <QueHacemos></QueHacemos>
        <Subhero></Subhero>
        <SeccionCaptacion></SeccionCaptacion>
    </div>-->
</template>

<script>
import Navigation from "./components/shared/Navigation";
/*import Navbar from "./components/landing/Navbar";
import Hero from "./components/landing/Hero";
import QuienesSomos from "./components/landing/QuienesSomos";
import NuestroFoco from "./components/landing/NuestroFoco";
import QueHacemos from "./components/landing/QueHacemos";
import Subhero from "./components/landing/Subhero";
import SeccionCaptacion from "./components/landing/SeccionCaptacion";*/

export default {
    name: 'App',
    components: {
        Navigation
        /*QueHacemos,
        QuienesSomos,
        NuestroFoco,
        Navbar,
        Hero,
        Subhero,
        SeccionCaptacion*/
    },
    data(){
        return{
            //isLoading: true
        }
    }

}
</script>


<style scoped>
</style>
