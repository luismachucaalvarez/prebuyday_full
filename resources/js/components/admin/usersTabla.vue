<template>
    <div>
        <vue-good-table
            :columns="columns"
            :rows="rows"
        ></vue-good-table>
    </div>

</template>
<script>
import axios from "axios";

export default {
    name: "usersTabla",
    data(){
        return{
            columns: [
                {
                    label: 'Nombre',
                    field: 'name',
                },
                {
                    label: 'Email',
                    field: 'email',
                    //type: 'number',
                },
                {
                    label: 'Acciones'
                }
            ],
            rows: []
        }

    },
    methods:{
        async obtenerUsers(){
            await axios.get('http://localhost:8000/api/usuarios', {
                headers: {
                    Authorization: 'Bearer' + localStorage.getItem('token')
                }
            })
                .then(response =>{
                    //console.log(response.data.contactos)
                    this.rows = response.data.users
                }).catch(error =>{
                    console.log(error)
                })
            //.then(response => )
        }
    },
    mounted() {
        this.obtenerUsers();
    }
}
</script>

<style scoped>

</style>
