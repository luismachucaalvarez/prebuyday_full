<template>
    <div>
        <Navigation></Navigation>
        <admin-nav></admin-nav>
        <emailForm></emailForm>
    </div>
</template>

<script>
import adminNav from "../../components/admin/adminNav";
import emailForm from "../../components/admin/emailForm";
export default {
name: "EnviarCorreo",
    components:{
        adminNav,
        emailForm
    }
}
</script>

<style scoped>

</style>
