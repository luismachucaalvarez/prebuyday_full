<template>
    <div>
        <Navigation></Navigation>
        <admin-nav></admin-nav>
        <p>Dashboard</p>
        <p><router-link :to="{ name: 'logout' }">Logout</router-link></p>
    </div>
</template>

<script>
import Navigation from "../../components/shared/Navigation"
import adminNav from "../../components/admin/adminNav";
import AdminNav from "../../components/admin/adminNav";
export default {
    name: "Dashboard",
    components: {AdminNav},
    data(){
        return{
            data: 'nothing'
        }
    },

    mounted() {
        axios.get('http://localhost:8000/api/dashboard', {
            headers:{
                Authorization: 'Bearer' + localStorage.getItem('token')
            }
        })
        .then(response => {
            this.data = response.data.data
        }).catch(error =>{

        })
    }
}
</script>

<style scoped>

</style>
