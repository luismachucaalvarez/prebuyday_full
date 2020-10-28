<template>
    <div>
        <Navigation></Navigation>
        <AdminNav></AdminNav>
        <detalle-contacto></detalle-contacto>
    </div>
</template>

<script>
import AdminNav from "../../components/admin/adminNav";
import detalleContacto from "../../components/admin/detalleContacto";
export default {
    name: "DetalleContacto",
    components: {AdminNav, detalleContacto}
}
</script>

<style scoped>

</style>
