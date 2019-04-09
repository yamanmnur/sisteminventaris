<style>
 .whitebg{
    background:white
    }
 .graybg{
    background:#ccc
 }
</style>

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
                  <h3 class="mb-0">Page {{ page }}</h3>
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
                    <th scope="col">KODE PEMINJAMAN </th>
                     <th scope="col">tanggal meminjam</th>
                    <th scope="col">tanggal kembali</th>
                  
                    <th scope="col">status peminjaman</th>
                  </tr>
                </thead>
                <tbody>
       <!-- v-bind:class="{ item.status_pinjam == 'sudah dipinjam'? 'graybg' : 'whitebg'}" -->
                  <tr v-for="item in model.data" >
                    <td>
                      {{ item.kode_peminjaman }}
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
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0" >
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <span v-for="item in pagination2">
                    <li class="page-item active"  @click="ambilDataPagination(item.nomor+1)" v-if="item.nomor+1 == page">
                      <a class="page-link" >{{item.nomor+1}}</a>
                    </li>
                    <li class="page-item  "    @click="ambilDataPagination(item.nomor+1)" v-else>
                      <a class="page-link"  >{{item.nomor+1}}</a>
                    </li>
                  </span>
                  
                  
                   
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
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
          interval : null,
          pagination : [],
          pagination2 : {},
          last_page : null,
          page : 1
        }
      },
      mounted(){
      var vm = this;
//            this.interval = setInterval(this.ambilData,5000);

        axios.get('http://localhost:8000/api/operator/peminjamanuser/'+this.search)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          vm.last_page = vm.model['last_page']
          vm.$swal('data berhasil di load')
          var a = []
          for(var i = 0;i < vm.last_page ;i++){
                                 

            //Vue.set(vm.$data,'pagination2',i)
           a[i] = {nomor : i ,href : 'http://localhost:8000/api/operator/peminjamanuser?page='+i}
        }
         Vue.set(vm.$data,'pagination2',a)
        });  
        //vm.last_page = vm.model['last_page'];
        
       
      },
      methods: {
        ambilDataPagination(nomor){
            var vm = this;
          axios.get('http://localhost:8000/api/operator/peminjamanuser/'+this.search+'?page='+nomor)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          vm.page = nomor
           
        });
        },
        ambilData(){
           var vm = this;
           vm.page = 1
        axios.get('http://localhost:8000/api/operator/peminjamanuser/'+this.search)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
            //vm.$swal('data berhasil di load')
                      vm.last_page = vm.model['last_page']

          var a = []
          for(var i = 0;i < vm.last_page ;i++){
                                 

            //Vue.set(vm.$data,'pagination2',i)
           a[i] = {nomor : i ,href : 'http://localhost:8000/api/operator/peminjamanuser?page='+i}
        }
         Vue.set(vm.$data,'pagination2',a)
        });
        }
            // end method add to cart
      }
           
    }
</script>
<style>

</style>
