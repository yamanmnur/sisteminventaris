<template >
    <div>

    <h2  >
       
    </h2>
    <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col" >
                  <h3 class="mb-0" >status pinjam     : {{ status_peminjaman }}  </h3>
                  <h3 class="mb-0" >status peminjaman :  {{ model[0]['status_pinjam'] }}  </h3>
                </div>
                 <div class="col text-right">
          <h2>barang barang yang anda pinjam pada tanggal   {{ model[0]['status_pinjam'] }}</h2>
          <div v-show="model[0]['status_pinjam'] == 'belum dipinjam'">
                    <button class="btn btn-success" @click="setujuipeminjaman()">setujui peminjaman</button>
          </div>
          <div v-show="model[0]['status_peminjaman'] == 'belum dikembalikan' && model[0]['status_pinjam'] == 'sudah dipinjam'  ">
                    <button class="btn btn-success" @click="kembalikanbarang()">kembalikan barang</button>
          </div>
       
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
          nama : this.$route.params.id_peminjaman,
          interval : null,
          status_peminjaman : ''
        }
      },
      mounted(){
        //this.interval = setInterval(this.ambildata,5000)
        this.nama = this.$route.params.id_peminjaman;   
        
        
        // var vm = this
        // axios.get('http://localhost:8000/api/operator/detailpinjam/'+this.$route.params.id_peminjaman)
        // .then(function (response){
        //   Vue.set(vm.$data,'model',response.data.model)
        // })
        this.ambildata()

      },
      methods : {
      //
        ambildata(){
          this.nama = this.$route.params.id_peminjaman;   
          var vm = this
          axios.get('http://localhost:8000/api/operator/detailpinjam/'+this.$route.params.id_peminjaman)
          .then(function (response){
            Vue.set(vm.$data,'model',response.data.model)
            vm.status_peminjaman = vm.model[0]['status_peminjaman']
          })
        },
        kembalikanbarang(){
          var vm = this
          axios.post("http://localhost:8000/operator/api/operator/kembalikanbarang",{ id_peminjaman: this.$route.params.id_peminjaman})
          .then(function (response){
            vm.$swal('berhasil di kembalikan')
            vm.ambildata();
          })
        },
        setujuipeminjaman(){
          var vm = this;
          axios.post('http://localhost:8000/operator/setujuipeminjaman',{ id_peminjaman : this.$route.params.id_peminjaman})
          .then(function (response){
            vm.$swal('berhasil disetujui')
            vm.ambildata()
          });
        }
      //
      }
}
</script>
