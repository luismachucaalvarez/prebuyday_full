import Vue from "vue";
import Vuex from 'vuex';
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        isLoggedIn: !!localStorage.getItem('token')
            /*isLoggedIn: !!localStorage.getItem('token'),
            token: localStorage.getItem('token')*/
    },
    mutations: {
        loginUser(state) {
            state.isLoggedIn = true
        },
        logoutUser(state) {
            state.isLoggedIn = false
        },
        LoginUser(state, data) {
            console.log('Avispate xD')
            state.isLoggedIn = true;
            let token = data.access_token;
            state.token = token;
            localStorage.setItem('token', token)
        },
        LogoutUser(state) {
            state.isLoggedIn = false;
            state.token = localStorage.removeItem('token')
        },
        tokenStored(state) {
            state.token = localStorage.getItem('token')
        }
    },
    actions: {},
    modules: {}
})