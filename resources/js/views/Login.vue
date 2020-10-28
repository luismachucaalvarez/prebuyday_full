<template>
    <div>
        <navigation></navigation>
        <LoginCard></LoginCard>
    </div>
</template>

<script>
import Navigation from "../components/shared/Navigation";
import LoginCard from "../components/admin/loginCard";
import store from '../store';
export default {
name: "Login",
    components: {
    Navigation,
        LoginCard
    },


}
</script>

<style scoped>

</style>
