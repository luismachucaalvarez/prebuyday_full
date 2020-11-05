<template>
    <div>
        <Navigation></Navigation>
        <admin-nav></admin-nav>
        <contactosTabla></contactosTabla>

    </div>
</template>

<script>
import AdminNav from "../../components/admin/adminNav";
import contactosTabla from "../../components/admin/contactosTabla";
import axios from 'axios';
export default {
    components: {AdminNav, contactosTabla},
    name: "Contactos",
    /*data() {
        return {
            //fields: FieldsDef,
            //perPage: 3,
            data: []
        };
    },*/
    /*data(){
        const labels = {
            nombre_completo: "Nombre del contacto",
            telefono: "Teléfono",
            email: 'Correo electrónico',
            iniciacion_realizada: "¿Iniciación realizada?",
            fecha_creacion: "Fecha creación",
            acciones: "Acciones"
            //acciones: 'Acciones'
        }
        return {
            tableData: [],

            //processing: false,
            //url: 'http://localhost:8000/api/contactos',
            columns: ['id', 'nombre_completo', 'telefono', 'email', 'iniciacion_realizada', 'created_at', 'acciones'],
            //columns: ['id', 'nombre_completo', 'telefono', 'email', 'iniciacion_realizada', 'acciones'],
            options: {
                //filterByColumn: true,
                perPage: 25,
                perPageValues: [10, 25, 50, 100, 500],
                headings: {
                    nombre_completo: labels.nombre_completo,
                    telefono: labels.telefono,
                    email: labels.email,
                    iniciacion_realizada: labels.iniciacion_realizada,
                    created_at: labels.fecha_creacion
                    //acciones: labels.acciones
                },
                //customFilters: ['nombre_completo'],
                //filterable: ['nombre_completo'],
                /*requestFunction: function (data){
                    return axios.get(this.url, {
                        params: data
                    })
                    .then((response) => {
                        //console.log(response.data)
                        return response.data
                    })
                    .catch(function (e){
                        this.dispatch('error', e);
                    }).bind(this)
                }
            }
        }

    },*/
    /*
    methods:{
        cargarDatos(){
            axios.get('https://preinscripcion.buyday.cl/api/contactos')
            .then((response) => {
                console.log(response.data.contactos)
                this.tableData = response.data.contactos
            })
        }
    },
    created() {
        this.cargarDatos();
    }*/
    /*mounted() {
        axios
            .get('https://preinscripcion.buyday.cl/api/contactos')
        .then(response =>{
            //console.log(response.data)
            this.data = response.data
        })
            //.then(response => )
    }*/


}
</script>

<style scoped>

</style>
