
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import vuerouter from 'vue-router';
import profileuser from './components/ProfileUser.vue';
import contoh from './components/Contoh.vue';
import VueRouter from 'vue-router';
import dashboard from './components/Dashboard.vue';
import riwayatpeminjaman from './components/RiwayatPeminjaman.vue';
import pesancomponent from './components/PesanComponent.vue';
import detailpeminjaman from './components/DetailPeminjaman.vue';
import VueSweetalert2 from 'vue-sweetalert2';
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//memakai fungsi Vue Router
Vue.use(vuerouter);
//memakai libary vue sweet alert 
Vue.use(VueSweetalert2)


Vue.component('profile-user',)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('jenis-component', require('./components/JenisComponent.vue').default);
 /**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const routes = [
    {
        name: 'profile',
        path: '/home/profileuser/:kode_user',
        components: 
        {
            default : profileuser,
            profilusr : profileuser 
        },
        props : true
    },
    {
        name : 'home',
        path: '/home',
        component:dashboard,
        children : [{
                path : 'contoh',
                component :contoh
            }
        //     {
        //         name: 'pesan',
        //         path: '/home/pesan',
        //         component : pesancomponent
        ]
    },
    {   
        name : 'pesan',
        path : '/home/pesan',
        component : pesancomponent
    },
    {
        name: 'riwayatpeminjaman', 
        path: '/home/riwayatpeminjaman', 
        component:riwayatpeminjaman
    },
    {
        name : 'detailpinjam',
        path : '/home/detailpinjam/:id_peminjaman',
        component : detailpeminjaman,
        props : true
    }

]
 
const router = new VueRouter({
    mode: 'history',
    routes
})

 
const app = new Vue({
   // el : "#app",
    router
}).$mount("#app");
 
 