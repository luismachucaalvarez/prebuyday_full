<template>
    <div>
        <Navigation></Navigation>
        <admin-nav></admin-nav>
        <p>Usuarios</p>
        <users-tabla></users-tabla>
    </div>
</template>

<script>
import AdminNav from "../../components/admin/adminNav";
import usersTabla from "../../components/admin/usersTabla";
import axios from 'axios';
import UsersTabla from "../../components/admin/usersTabla";
export default {
    components: {UsersTabla, AdminNav},
    name: "Usuarios",

}
</script>

<style scoped>

</style>
