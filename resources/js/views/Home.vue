<template>
    <div>
        <navigation></navigation>
        <Hero></Hero>
        <QuienesSomos></QuienesSomos>
        <NuestroFoco></NuestroFoco>
        <QueHacemos></QueHacemos>
        <SeccionComision></SeccionComision>
        <SeccionCaptacion></SeccionCaptacion>
        <ScrollTopArrow></ScrollTopArrow>
    </div>

</template>

<script>
import Navigation from "../components/shared/Navigation";
import Hero from "../components/landing/Hero";
import QuienesSomos from "../components/landing/QuienesSomos";
import NuestroFoco from "../components/landing/NuestroFoco";
import QueHacemos from "../components/landing/QueHacemos";
import SeccionComision from "../components/landing/SeccionComision";
import SeccionCaptacion from "../components/landing/SeccionCaptacion";
import ScrollTopArrow from "../components/landing/ScrollTopArrow";
export default {
name: "Home",
    components: {
        Navigation,
        Hero,
        QuienesSomos,
        NuestroFoco,
        QueHacemos,
        SeccionComision,
        SeccionCaptacion,
        ScrollTopArrow
    }
}
</script>

<style scoped>

</style>
