<template>
    <div>
        <h1>barang yang anda pinjam baru baru ini</h1>
          <br> 
        <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Page visits</h3>
                </div>
                <div class="col text-right">
      
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">status peminjaman</th>
                    <th scope="col">nama</th>
                    <th scope="col">tanggal meminjam</th>
                    <th scope="col">tanggal kembali</th>
                  </tr>
                </thead>
                <tbody>
      
                  <tr v-for="item in model">
                    <th scope="row">
                      {{ item.status_peminjaman }}
                    </th>
                    <td>
                        {{ item.kode_user }}
                    </td>
                    <td>
                      {{ item.tanggal_pinjam }}
                    </td>
                    <td>
                      {{ item.tanggal_kembali }}
                    </td>
                    <td>
                      <router-link :to="{name : 'profile', params : { kode_user : item.kode_user }  }" class="btn btn-primary">lihat detail</router-link>
                    </td> 
                  </tr>
      
                </tbody>
              </table>
            </div>
          </div>
    </div>      
</template>
<script>
 import axios from 'axios'
      window.Vue = require('vue');

        
    export default {
                
      data(){        
        return {
      
          model : {}
        }
      },
      mounted(){
                     
        var vm = this;
        axios.get('http://localhost:8000/api/peminjamanuser')
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
        });
      },
      methods: {
   
            // end method add to cart
      }
           
    }

</script>
