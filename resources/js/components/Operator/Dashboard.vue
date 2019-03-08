<template>
    <div>

                    
      <router-link :to="{name : 'profileop', params : { profile : 'df' }  }"  class="btn">profile</router-link>
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input @keyup="ambilData" class="form-control" placeholder="Cari Berdasarkan Kode Peminjaman" type="text" v-model="search">
            </div>
          </div>
          <br><br>
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
                    <th scope="col">KODE PEMINJAMAN</th>
                     <th scope="col">nama</th>
                    <th scope="col">tanggal meminjam</th>
                    <th scope="col">tanggal kembali</th>
                  
                    <th scope="col">status peminjaman</th>
                  </tr>
                </thead>
                <tbody>
      
                  <tr v-for="item in model">
                    <td>
                      {{ item.kode_peminjaman }}
                    </td>
                    
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
                      {{ item.status_pinjam }}
                    </td>
                    <td>
                      <router-link :to="{name : 'detailpeminjamanoperator', params : { id_peminjaman : item.id_peminjaman }  }" class="btn btn-primary">lihat detail</router-link>
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
      import VueSweetalert2 from 'vue-sweetalert2';

        
    export default {
                
      data(){        
        return {
          search : '',
          model : {},
          interval : null
        }
      },
      mounted(){
      var vm = this;
      this.interval = setInterval(this.ambilData,5000);
        axios.get('http://localhost:8000/api/operator/peminjamanuser/'+this.search)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          vm.$swal('data berhasil di load')
        });  
       
      },
      methods: {
        ambilData(){
           var vm = this;
        axios.get('http://localhost:8000/api/operator/peminjamanuser/'+this.search)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
           
        });
        }
            // end method add to cart
      }
           
    }
</script>
<style>

</style>
