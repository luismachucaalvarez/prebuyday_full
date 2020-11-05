<template>
    <!-- component -->
    <div class="bg-gray-200 rounded py-16 px-12 m-16 flex flex-col items-center justify-center">
        <!-- User profile image -->
        <img class="rounded-full h-32 w-32" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="user avatar" />
        <form method="post" class="mt-8 mb-4" v-on:submit.prevent="login">
            <div class="mb-4">
                <label for="userEmail" class="sr-only">Email address</label>
                <input class="border-solid border border-gray-400 rounded px-2 py-3" v-model="email" type="email" id="userEmail" placeholder="Email address" required />
            </div>
            <div>
                <label for="userEmail" class="sr-only">Password</label>
                <input class="border-solid border border-gray-400 rounded px-2 py-3" v-model="password" type="password" id="userPass" placeholder="Password" required />
            </div>
            <div class="my-4 flex items-center">
                <input class="h-4 w-4 mr-2" type="checkbox" id="userRemember" />
                <label for="userRemember">Remember me</label>
            </div>
            <button class="bg-violet hover:bg-darkviolet text-white font-bold w-full py-3" type="submit">Sign in</button>
        </form>
        <a href="#" class="self-start">Forgot the password?</a>
    </div>
</template>

<script>
import store from '../../store'
export default {
name: "login",
    data(){
        return {
            email: '',
            password: '',
            loginError: false,
            errors: {},
            url: ''
            //isProgress: false
        }
    },
    methods: {
        login(){
            this.loginError = false;
            this.url = this.$router.history._startLocation
            axios.post('https://preinscripcion.buyday.cl/api/auth/login', {
            //axios.post('http://localhost:8000/api/auth/login', {
                email: this.email,
                password: this.password
            }).then(response => {
                store.commit('loginUser')
                localStorage.setItem('token', response.data.access_token)
                console.log(this.url)
                if (this.url == '/login'){
                    this.$router.push({name: 'dashboardInicio'})
                } else {
                    this.$router.push({path: this.url})
                }
            })
            .catch(error =>{
                //console.log(error)
                this.loginError = true
            })
        }
    }
}
</script>

<style scoped>

</style>
