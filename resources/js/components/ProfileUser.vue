<template >
    <div>

    <h2  >
        {{ nama }}
    </h2>
    <h1>hai orang asing {{ $route.params.id_peminjaman }}</h1>
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
                    <th scope="col">Jumlah Yang Tersedia</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col" colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
      
                  <tr v-for="item in model.data">
                    <th scope="row">
                     </th>
                    <td>
                     </td>
                    <td>
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
          axios.get('/api/detailpinjam',   this.$route.params.id_peminjaman)
          .then(function (resp){
              Vue.set(vm.$data,'model',response.data.model)
           }).catch(function (resp){
             
          });
      }
}
</script>
