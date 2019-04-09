<template >
    <div>

    <h2  >
       
    </h2>
    <h1>barang barang yang anda pinjam pada tanggal  </h1>
    <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col ">
                    <p>denda : </p>
                    <p>status peminjaman : {{ detail_peminjaman.status_peminjaman }}</p>
                    <p>status pinjam : {{ detail_peminjaman.status_pinjam }}</p>
                    <p>tanggal pinjam : {{ detail_peminjaman.tanggal_pinjam }}</p>
                    <p>tanggal kembali : {{ detail_peminjaman.tanggal_kembali }}</p>
                 </div>

                <div class="col text-right" >
                  <button class="btn btn-danger" @click="batalkanPeminjaman()" v-show="detail_peminjaman.status_pinjam == 'belum dipinjam'">batalkan peminjaman</button>
                  <h3 class="mb-0" >   </h3>
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
                    <th scope="col">Tanggal kembali</th>
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
                      {{ item.tanggal_kembali }}
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
          detail_peminjaman  : [],
          nama : this.$route.params.id_peminjaman
        }
      },
         mounted(){
            this.nama = this.$route.params.id_peminjaman;   
           var vm = this
        axios.get('http://localhost:8000/api/detailpinjam/'+this.$route.params.id_peminjaman)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          Vue.set(vm.$data,'detail_peminjaman',response.data.dd)
        })
      },methods : {
        batalkanPeminjaman(){
          var vm = this;
          axios.get('http://localhost:8000/batalkanpeminjaman/'+vm.$route.params.id_peminjaman)
            .then(function (resp){
              vm.$swal('peminjaman di batalkan')
              vm.$router.push('/home/riwayatpeminjaman');
              
              $('#cartModal').modal('hide')
              // vm.$("#detailmodal").modal('');
              //alert('berhasil')
            }).catch(function (resp){
                swal('hai')
            });
         }
      }
}
</script>
