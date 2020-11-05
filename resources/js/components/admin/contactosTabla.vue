<template>
    <div>
        <p>Contactos</p>
        <vue-good-table
            :columns="columns"
            :rows="rows"
            :pagination-options="{
                enabled: true,
                mode: 'records',
                perPage: 10,
                position: 'top',
                perPageDropdown: [5, 10, 25],
                dropdownAllowAll: false,
                setCurrentPage: 2,
                nextLabel: 'Sig.',
                prevLabel: 'Ant.',
                rowsPerPageLabel: 'Registros por página',
                ofLabel: 'de',
                pageLabel: 'page', // for 'pages' mode
                allLabel: 'All',
              }"
        >
            <template slot="table-row" slot-scope="props">
                <span v-if="props.column.field == 'acciones'">
                    <button class="bg-darkviolet text-white rounded py-1 px-4"><router-link :to="`contactos/${props.row.id}`">Ver Detalle</router-link></button>
                    <button class="bg-lightshadeblue text-darkviolet rounded py-1 px-4 border border-violet"><router-link :to="`contactos/${props.row.id}/email`">Enviar Correo</router-link></button>
                    <!--<button class="bg-white text-darkviolet rounded py-1 px-4 border border-violet" @click="eliminarContacto(`${props.row.id}`)">Eliminar</button>-->
                    <button class="bg-white text-darkviolet rounded py-1 px-4 border border-violet" @click="eliminarContacto(props.row.id)">Eliminar</button>


                </span>
            </template>
        </vue-good-table>


        <!--<sweet-modal ref="modal" icon="warning">
            `¿Deseas eliminar el contacto seleccionado? Esta acción es irreversible.`

            <button slot="button" class="bg-darkviolet text-white rounded py-1 px-4 mx-2" @click="confirmarBorradoContacto(props.row.id)">Aceptar</button>
            <button slot="button" class="bg-white text-darkviolet rounded py-1 px-4 border border-violet mx-2" @click="cerrarModal()">Cancelar</button>

        </sweet-modal>-->
    </div>

</template>

<script>
import axios from "axios";
//import VModal from 'vue-js-modal';
//Vue.use(VModal, { dynamicDefault: { draggable: true, resizable: true } })
export default {
    name: "contactosTabla",
    data(){
        return {
            id: "",
            columns: [
                {
                    label: 'Id',
                    field: this.idContacto,


                },
                {
                    label: 'Nombre completo',
                    field: 'nombre_completo',

                },
                {
                    label: 'Teléfono',
                    field: 'telefono',
                    width: '100px'
                },
                {
                    label: 'Email',
                    field: 'email',
                    //type: 'number',
                },
                {
                    label: 'Iniciacion Realizada',
                    field: 'iniciacion_realizada',
                    formatFn: this.rowIniciacion,
                    width: '100px'
                    //type: 'number',
                },
                {
                    label: 'Fecha alta',
                    field: 'fecha_alta',
                    type: 'date',
                    dateInputFormat: 'yyyy-MM-dd',
                    dateOutputFormat: 'dd/MM/yyyy',
                    width: '100px'

                },
                {
                    label: 'Acciones',
                    field: 'acciones'
                }

            ],

            rows: []
        };
    },
    methods:{
        async obtenerContactos(){
            await axios.get('https://preinscripcion.buyday.cl/api/contactos')
                .then(response =>{
                    //console.log(response.data.contactos.id)
                    this.rows = response.data.contactos

                    //this.id = response.data.contactos.id
                }).catch(error =>{
                    console.log(error)
                })
            //.then(response => )
        },
        rowIniciacion(value){
            if (value == 1){
                return 'Si'
            } else {
                return 'No'
            }
        },
        idContacto(rowObj){
            let idContacto =  rowObj.id;
        },
        eliminarContacto(id){
            this.$swal({
                icon: 'error',
                title: '¡Atención!',
                text: `¿De verdad deseas eliminar este contacto? Esta acción no se puede deshacer.`,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed){
                axios.delete(`https://preinscripcion.buyday.cl/api/contactos/${id}`)
                .then((response) =>{
                    console.log('eliminado')
                })
                .catch((error) =>{
                    console.log(error)
                })
            }
        })
            //this.$refs.modal.open();
            //this.show();
            //this.$modal.show('modalEliminarContacto');
            console.log(`${id} eliminado`)
        },
        /*confirmarBorradoContacto(){
            console.log('Contacto Borrado');
        },*/

        /*show(){
            this.$modal.show('mensajeBorrado',{
                template: `
    <div>
      <p>Close using this button:</p>
      <button @click="$emit('close')">Close</button>
    </div>
  `
            });
        },*/
        /*hide(){
            this.$modal.hide('mensajeBorrado');
        }*/
        /*async eliminarContacto(id){
            await axios.delete('https://preinscripcion.buyday.cl/api/contactos')
            .then(response =>{
                console.log('Borrado exitoso')
            }).catch( error =>{
                console.log(error)
            })
        }*/

    },
    mounted() {
        this.obtenerContactos();
        //this.hide();
    }

}
</script>

<style scoped>

</style>
