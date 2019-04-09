
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import detailpeminjamanoperator from './components/Operator/DetailPeminjaman.vue';
import vuerouter from 'vue-router';
import profileuser from './components/ProfileUser.vue';
import contoh from './components/Contoh.vue';
import VueRouter from 'vue-router';
import dashboard from './components/Dashboard.vue';
import riwayatpeminjaman from './components/RiwayatPeminjaman.vue';
import pesancomponent from './components/PesanComponent.vue';
import detailpeminjaman from './components/DetailPeminjaman.vue';
import operatordashboard from './components/Operator/Dashboard.vue';
import pesanop from './components/Operator/PesanOp.vue';
import profileop from "./components/Operator/ProfileOperator.vue";
import kelolapengguna from './components/Operator/KelolaPengguna.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import kelolabarang from './components/Admin/KelolaBarang.vue';
import kelolaoperator from './components/Admin/KelolaOperator.vue';
import dashboardadmin from './components/Admin/Dashboard.vue';
import kelolajenis from './components/Admin/KelolaJenis.vue';
import kelolaruang from './components/Admin/KelolaRuang.vue';
import genaratelaporan from './components/Admin/GenerateLaporan.vue';
import detailpeminjamanadmin from './components/Admin/DetailPeminjaman.vue';
import riwayatpeminjamanadmin from './components/Admin/RiwayatPeminjaman.vue';
//import kelolaoperator from './components/Admin/KelolaRuang.vue';
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
    },
    {
        name : 'dashboard',
        path : '/operator',
        component : operatordashboard,
        props : true
    },
    {
        name : 'detailpeminjamanoperator',
        path : '/operator/detailpeminjamanuser/:id_peminjaman',
        component : detailpeminjamanoperator,
        props : true
    },{
        name : 'profileop',
        path : '/operator/profilee/:profile',
        component : profileop,
        props : true
    }
    ,{
        name : 'pesanop',
        path : '/operator/pesanop',
        component : pesanop,
        props : true
    },{
        name : 'kelolapengguna',
        path : '/operator/kelolapengguna',
        component : kelolapengguna,
        props : true
    }
    //admin routes
    ,{
        name : 'admin',
        path : '/admin',
        component : dashboardadmin,
        props : true
    }
    ,{
        name : 'inventarisir',
        path : '/admin/inventarisir',
        component : kelolabarang,
        props : true
    },{
        name : 'kelolaoperator',
        path : '/admin/kelolaoperator',
        component :kelolaoperator,
        props : true
    },{
        name : 'kelolaruang',
        path : '/admin/kelolaruang',
        component :kelolaruang,
        props : true
    },{
        name : 'kelolajenis',
        path : '/admin/kelolajenis',
        component :kelolajenis,
        props : true
    },{
        name : 'riwayatpeminjaman',
        path : '/admin/riwayatpeminjaman',
        component :riwayatpeminjamanadmin,
        props : true
    } ,{
        name : 'detailpeminjaman',
        path : '/admin/detailpeminjaman/:id_peminjaman',
        component :detailpeminjamanadmin,
        props : true
    },{
        name : 'generatelaporan',
        path : '/admin/generatelaporan',
        component :genaratelaporan,
        props : true
    }
    
    

];

// const routesoperator = [
//     {
//         name : 'dashboard',
//         path : '/operator',
//         component : operatordashboard,
//         props : true
//     }
// ]

 
const router = new VueRouter({
    mode: 'history',
    routes
})
// const routeroperator = new VueRouter({
//     mode: 'history',
//     routesoperator
// })


const app = new Vue({
   // el : "#app",
    router
}).$mount("#app");
 
// const operator = new Vue({
//     routeroperator
// }).$mount("#operatorapp");