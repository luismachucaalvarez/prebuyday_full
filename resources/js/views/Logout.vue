<template>
    <p>Nos vemos...</p>
</template>

<script>
import store from '../store'
export default {
name: "Logout",
    mounted() {
    localStorage.removeItem('token')
        store.commit('logoutUser')
        this.$router.push({name: 'login'})
    }
}
</script>

<style scoped>

</style>
