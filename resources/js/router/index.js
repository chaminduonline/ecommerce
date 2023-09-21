/*
 *   Copyright (c) 2023 Chamindu Dilshan
 *   All rights reserved.
 *   Full Stack Engineer
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)

/* Guest Component */
const Login = () => import('../components/Auth/Login.vue' /* webpackChunkName: "resource/js/components/login" */)
const Register = () => import('../components/Auth/Register.vue' /* webpackChunkName: "resource/js/components/register" */)
const Welcome = () => import('../components/Welcome.vue' /* webpackChunkName: "resource/js/components/register" */)
const ProductDetail = () => import('../components/Product/ProductDetail.vue' /* webpackChunkName: "resource/js/components/register" */)
const Products = () => import('../components/Product/Products.vue' /* webpackChunkName: "resource/js/components/register" */)
/* Guest Component */

/* Layouts */
const Layout = () => import('../components/Layout/App.vue' /* webpackChunkName: "resource/js/components/layout/dashboard" */)
/* Layouts */

/* Authenticated Component */
const Dashboard = () => import('../components/Home.vue' /* webpackChunkName: "resource/js/components/dashboard" */)
const Profile = () => import('../components/Auth/Profile.vue' /* webpackChunkName: "resource/js/components/auth/profile" */)
const EmailVerification = () => import('../components/Auth/EmailVerification.vue' /* webpackChunkName: "resource/js/components/auth/profile" */)
const EmailVerify = () => import('../components/Auth/Verify.vue' /* webpackChunkName: "resource/js/components/auth/profile" */)
/* Authenticated Component */

const Routes = [
    {
        name: "products",
        path: "/",
        component: Products,
        meta: {
            middleware: "guest",
            title: `Products`
        }
    },
    {
        name: "ProductDetail",
        path: "/item/:id",
        component: ProductDetail,
        meta: {
            middleware: "guest",
            title: `Product Detail`
        }
    },
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Register`
        }
    },
    {
        name: "dashboard",
        path: '/home',
        component: Dashboard,
        meta: {
            title: `Dashboard`,
            middleware: "auth"
        }
    },
    {
        name: "profile",
        path: '/profile',
        component: Profile,
        meta: {
            title: `Profile`,
            middleware: "auth"
        }
    },
    {
        path: '/verify-email/:id/:token', // Include a route parameter for the verification token
        name: 'email-verified',
        component: EmailVerification,
        meta: {
            title: `Verify`,
            middleware: "auth"
        }
    },
    {
        path: '/email/verify', // Include a route parameter for the verification token
        name: 'email-verify',
        component: EmailVerify,
        meta: {
            title: `Verify`,
            middleware: "auth"
        }
    },
]

var router = new VueRouter({
    mode: 'history',
    routes: Routes
})

router.beforeEach((to, from, next) => {
    document.title = `${to.meta.title} - ${process.env.MIX_APP_NAME}`
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})

export default router