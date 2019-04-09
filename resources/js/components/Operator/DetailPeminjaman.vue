<template >
    <div>

    <h2  >
       
    </h2>
    <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col" >
                  <h3 class="mb-0" >status denda     : </h3>
                  <h3 class="mb-0" >dipinjam oleh     : {{ detail_peminjaman.name }} </h3>
                  <h3 class="mb-0" >disetujui oleh    : {{ detail_peminjaman.nama_operator_menyetujui }} </h3>
                  <h3 class="mb-0" >di kembalikan oleh     : {{ detail_peminjaman.nama_operator_mengembalikan }} </h3>
                   <h3 class="mb-0" >dikembalikan pada tanggal     : {{ detail_peminjaman.tanggal_dikembalikan }}</h3>
                  <h3 class="mb-0" >status pinjam     : {{ detail_peminjaman.status_peminjaman }}  </h3>
                  <h3 class="mb-0" >status peminjaman :  {{ detail_peminjaman.status_pinjam }}  </h3>
                </div>
                 <div class="col text-right">
           <div v-show="detail_peminjaman.status_pinjam == 'belum dipinjam'">
                    <button class="btn btn-success" @click="setujuipeminjaman()">setujui peminjaman</button>
          </div>
          <div v-show="detail_peminjaman.status_peminjaman == 'belum dikembalikan' && detail_peminjaman.status_pinjam == 'sudah dipinjam'  ">
                    <button class="btn btn-success" @click="kembalikanbarang()">kembalikan barang</button>
          </div>
          <div v-show="detail_peminjaman.status_peminjaman == 'belum dikembalikan' && detail_peminjaman.status_pinjam == 'belum dipinjam'  ">
                    <button class="btn btn-danger" >batalkan peminjaman</button>
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
                    <th scope="col">Jumlah</th>
                    <th scope="col">stok</th>
                    <th scope="col">Tanggal Di pinjam</th>
                    <th scope="col">Tanggal kembali</th>
                    <th scope="col">Tanggal dikembalikan</th>
                    <th scope="col">yang menyetujui</th>
                    <th scope="col">yang mengembalikan</th>
                     <th scope="col" colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
      
                  <tr v-for="(item, index) in model">
                    <th scope="row">
                      {{ item.nama }}
                     </th>
                    <td>
                      {{ item.jumlah }}
                    </td>
                    <td>
                      {{ item.jumlah_inventaris }}
                     </td>
                    <td>
                      {{ item.tanggal_pinjam }}
                    </td>
                    <td>{{ item.tanggal_kembali }}</td>
                    <td>{{ item.tanggal_dikembalikan }}</td>
                    <td>{{ item.nama_operator_menyetujui }}</td>
                    <td>{{ item.nama_operator_mengembalikan }}</td>
                    <td>
                     <span v-show="item.status_peminjaman == 'belum dikembalikan' && item.status_pinjam == 'sudah dipinjam' ">
                       <button class="btn btn-success" @click="kembalikanBarangSatuan(item)">kembalikan barang</button>
                     </span>
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
      window.axios = require('axios');

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': window.csrf_token
};

// Automatically add CSRF token to every outgoing request
 
// Let’s omit this so far, see the explanation below
 
export default {
             //  getDetailPeminjamanUser
      data(){        
        return {
          model : {},
          nama : this.$route.params.id_peminjaman,
          detail_peminjaman : [],
          id_peminjaman : '',
          interval : null,
          status_pinjam : '',
          kodeid : null,
          status_peminjaman : '',
          response_data : {},
          datainventaris : {}
        }
      },
      mounted(){
        //this.interval = setInterval(this.ambildata,5000)
        var vm = this
         vm.nama = vm.$route.params.id_peminjaman;   
        vm.id_peminjaman = this.$route.params.id_peminjaman;
         // var vm = this
        // axios.get('http://localhost:8000/api/operator/detailpinjam/'+this.$route.params.id_peminjaman)
        // .then(function (response){
        //   Vue.set(vm.$data,'model',response.data.model)
        // })
        vm.ambildata()

      },
      methods : {
      //
        kembalikanBarangSatuan(item){
          var vm = this
 //                   this.kodeid = id_peminjaman
                    ///api/kembalikanbarangsatuan
           axios.post("http://localhost:8000/operator/api/kembalikanbarangsatuan",{ detail: item})
          .then(function (response){
            vm.$swal('berhasil di kembalikan')
            vm.ambildata();
          })

         // vm.$swal('berhasil dikembalikan'+id_peminjaman)
        }
        ,
        ambildata(){
         // this.nama = this.$route.params.id_peminjaman;   
        var vm = this
          axios.get('http://localhost:8000/api/operator/detailpinjam/'+vm.id_peminjaman)
          .then(function (response){
            Vue.set(vm.$data,'model',response.data.model)
            Vue.set(vm.$data,'detail_peminjaman',response.data.dd)
            vm.status_peminjaman = vm.model[0]['status_peminjaman']
            vm.status_pinjam = vm.model[0]['status_pinjam'];
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
          //vm.$swal("jh")
          axios.get('http://localhost:8000/operator/setujuipeminjaman/'+ this.$route.params.id_peminjaman)
          .then(function (response){
            //vm.$swal('berhasil disetujui')
            //Vue.set(vm.$data,'response_data',response.data.model)
            Vue.set(vm.$data,'datainventaris',response.data.detailnya)
            if (response.data.model['res'] == 'berhasil') {
              vm.$swal('berhasil disetujui');
            } else {
              vm.$swal('gagal, stok barang habis atau kurang')
            }
            vm.ambildata()
          });
        }
      //
      }
}
</script>


