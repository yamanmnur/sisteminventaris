<template >
    <div>

    <h2  >
       
    </h2>
    <h1>barang barang yang anda pinjam pada tanggal   </h1>
    <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col" >
                  <h3 class="mb-0" >   </h3>
                </div>
                <div class="col text-right">
      
                 </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Yang Dipinjam</th>
                    <th scope="col">Tanggal Di pinjam</th>
                    <th scope="col" colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
      
                  <tr v-for="item in model">
                    <th scope="row">
                      {{ item.nama }}
                     </th>
                    <td>
                      {{ item.jumlah }}
                     </td>
                    <td>
                      {{ item.tanggal_pinjam }}
                     </td>
                    <td>
                      </td> 
                     <td>
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
             //  getDetailPeminjamanUser
      data(){        
        return {
          model : {},
          nama : this.$route.params.id_peminjaman
        }
      },
         mounted(){
            this.nama = this.$route.params.id_peminjaman;   
           var vm = this
        axios.get('http://localhost:8000/api/detailpinjam/'+this.$route.params.id_peminjaman)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
        })
      }
}
</script>
