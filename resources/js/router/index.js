/*import FormPreinscripcion from "./components/landing/FormPreinscripcion";
import AdminLogin from './components/landing/login'
import login from "./components/landing/login";
import QuienesSomos from "./components/landing/QuienesSomos";
import Home from "./pages/Home";*/
import Login from "../views/Login";

import Home from "../views/Home.vue"

import store from '../store'

export default {
    mode: 'history',
    routes: [{
            name: 'home',
            path: '/',
            component: Home
        },
        /*{
            name: 'QuienesSomos',
            path: '/quienessomos',
            component: QuienesSomos
        },

        {
            name: 'Preinscripcion',
            path: '/formcontacto',
            component: FormPreinscripcion

        },*/
        {
            name: 'login',
            path: '/login',
            component: () =>
                import ('../views/Login'),
        },
        {
            name: 'dashboardInicio',
            path: '/dashboard/inicio',
            component: () =>
                import ('../views/Dashboard/Inicio'),
            beforeEnter: (to, from, next) => {
                // check if the route requires authentication and user is not logged in
                if (!store.state.isLoggedIn) {
                    // redirect to login page
                    next({ name: 'login' })
                    return
                }

                // if logged in redirect to dashboard
                if (to.path === '/login' && store.state.isLoggedIn) {
                    next({ name: 'dashboard' })
                    return
                }

                next()
            },
        },
        {
            name: 'dashboardUsuarios',
            path: '/dashboard/usuarios',
            component: () =>
                import ('../views/Dashboard/Usuarios'),
            beforeEnter: (to, from, next) => {
                // check if the route requires authentication and user is not logged in
                if (!store.state.isLoggedIn) {
                    // redirect to login page
                    next({ name: 'login' })
                    return
                }

                // if logged in redirect to dashboard
                if (to.path === '/login' && store.state.isLoggedIn) {
                    next({ name: 'dashboard' })
                    return
                }

                next()
            },
        },
        {
            name: 'dashboardContactos',
            path: '/dashboard/contactos',
            component: () =>
                import ('../views/Dashboard/Contactos'),
            beforeEnter: (to, from, next) => {
                // check if the route requires authentication and user is not logged in
                if (!store.state.isLoggedIn) {
                    // redirect to login page
                    next({ name: 'login' })
                    return
                }

                // if logged in redirect to dashboard
                if (to.path === '/login' && store.state.isLoggedIn) {
                    next({ name: 'dashboard' })
                    return
                }

                next()
            },
        },
        {
            name: 'detalleContacto',
            path: '/dashboard/contactos/:id',
            component: () =>
                import ('../views/Dashboard/DetalleContacto'),
            beforeEnter: (to, from, next) => {
                // check if the route requires authentication and user is not logged in
                if (!store.state.isLoggedIn) {
                    next({ path: '/login' })
                        // redirect to login page
                        //next({ path: '/login', redirect: '/dashboard/contactos' })

                } else next()

                // if logged in redirect to dashboard
                /*if (to.path === '/login' && store.state.isLoggedIn) {
                    next({ name: 'dashboard' })
                    return
                }*/

                //next()
            },

        },
        {
            name: 'emailContacto',
            path: '/dashboard/contactos/:id/email',
            component: () =>
                import ('../views/Dashboard/EnviarCorreo'),
            beforeEnter: (to, from, next) => {
                // check if the route requires authentication and user is not logged in
                if (!store.state.isLoggedIn) {
                    // redirect to login page
                    next({ name: 'login' })
                    return
                }

                // if logged in redirect to dashboard
                if (to.path === '/login' && store.state.isLoggedIn) {
                    next({ name: 'dashboard' })
                    return
                }

                next()
            },

        },

        {
            path: '/logout',
            name: 'logout',
            component: () =>
                import ('../views/Logout')
        }
    ]


}