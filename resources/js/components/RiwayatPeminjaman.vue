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
                    <th scope="col">KODE PEMINJAMAN</th>
                    <th scope="col">status pengembalian</th>
                   
                   
                    <th scope="col">status denda</th>
                    <th scope="col">status peminjaman</th>
                  </tr>
                </thead>
                <tbody>
      
                  <tr v-for="item in model">
                     <td>
                      {{ item.kode_peminjaman }}
                    </td>
                    <th scope="row">
                      {{ item.status_peminjaman }}
                    </th>
                   
                    
                  
                    <td>
                      belum dikenakan denda
                    </td>
                    <td>
                      {{ item.status_pinjam }}
                    </td>
                    <td>
                      <router-link :to="{name : 'detailpinjam', params : { id_peminjaman : item.id_peminjaman }  }" class="btn btn-primary">lihat detail</router-link>
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
      
          model : {}
        }
      },
      mounted(){
                     
        var vm = this;
        axios.get('http://localhost:8000/api/peminjamanuser')
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          vm.$swal('data berhasil di load')
        });
      },
      methods: {
   
            // end method add to cart
      }
           
    }

</script>
