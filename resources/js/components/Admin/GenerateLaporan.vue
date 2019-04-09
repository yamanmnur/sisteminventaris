<template>
    <div>
               
             
            <br>
            <br>
 <select name="" id=""  v-model='tahun'>
    <option value="2019">2019</option>
</select>
<select name="" v-model="bulan" id="">
    <option value="1">januari</option>
    <option value="2">febuari</option>
    <option value="3">maret</option>
    <option value="4">april</option>
    <option value="5">mei</option>
    <option value="6">juni</option>
    <option value="7">juli</option>
    <option value="8">agustus</option>
    <option value="9">september</option>
    <option value="10">november</option>
    <option value="11">oktober</option>
    <option value="12">desember</option>
</select>
<button @click="ambilData()">lihat</button>
<button @click="printdata()" v-show="model.length > 0">print</button>
              <!--<router-link to="/home/contoh" class="btn btn-success" data-toggle="modal" data-target="#detailmodal">lihat</router-link>-->

               
              <br>
            <br>
            <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">{{ judul_form }}</h4>
                      </div>
                      <div class="modal-body">
                                    <form @submit.prevent="tambahUser"  >
                                       
                                <div class="row">
                     <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nama Lengkap {{ datadiri.nama }} </label>
                        <input v-model = "datadiri.nama" type="text" id="input-username" class="form-control " placeholder="example" name="namalengkap">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email </label>
                        <input type="email" id="input-email" v-model="datadiri.email" class="form-control " placeholder="jesse@example.com" name="email">
                      </div>
                    </div>
                     <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">no tlp </label>
                        <input type="text" id="input-email" v-model="datadiri.no_tlp" class="form-control " placeholder="jesse@example.com" name="email">
                      </div>
                    </div>
                     
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label"  >{{ judul_password }} </label>
                        <input type="password"  v-model = "datadiri.password" class="form-control  "   name="password">
                      </div>
                    </div>
                  </div>
                          <button type="submit" class="btn btn-default" >Tambah</button>
                   
                            </form>
                      </div>
                      <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                   </div>
                </div>
             </div>
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List User</h3>
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
                      <th scope="col">nama</th>
                    <th scope="col">no tlp</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                   <tr   v-for="item in model">
                    

                    <td>
                        {{ item.name }}
                    </td>
                    <td>
                      {{ item.level }}
                    </td>
                    <td>
                      {{ item.tanggal_pinjam }}
                    </td>
                    <td>
                        {{ item.nama_barang }}
                    </td>
                    <td>
                        {{ item.tanggal_kembali }}
                    </td>
                    <td>
                        {{ item.tanggal_dikembalikan }}
                    </td>
                    <td>
                        {{ item.nama_operator_menyetujui }}
                    </td>
                    <td> 
                        {{ item.nama_operator_mengembalikan }}
                    </td>
                    <td>
                        {{ item.jumlah_pinjam }}
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
<script >
import Vue from 'vue'
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';
      window.Vue = require('vue');

// Vue.component('formtambahuser',{
//  data(){
//    return{
//      datadiri : {"nama" : '',"email": "","password" : ''}
//    }
//  },
//  mounted(){
//    var vm = this
//    this.datadiri.nama = vm.model[0]['nama']
//  },
//   computed : {
    
//   },
//   methods : {
//     tambahUser(event){
//        var vm = this
            
//             axios.post('/operator/api/tambahuser',   { datadiri : this.datadiri})
//             .then(function (resp){
//               vm.$swal('barang berhasil dipinjam')
//               //vm.$router.push('/home/riwayatpeminjaman');
//               this.ambilDataLangsung()
//               $('#cartModal').modal('hide')
              
//               // vm.$("#detailmodal").modal('');
//               //alert('berhasil')
//             }).catch(function (resp){
//                 vm.swal('hai')
//             });
     
//     }
//   }
// })
export default {
    data(){
        return{
            dataapi : {'tahun' : '2019','bulan' : '4'},
            judul_form : "tambah operator",
            judul_password : "password",
            datadiri : {'kode_operator' : '',"nama" : '',"email": "","password" : '',
            "no_tlp" : ""},
            error : {nama : '',kelas : ''},
            level : '',
            value : 'error',
            nama : '',
            search : '',
            bulan : '',
            tahun : '',
          model : {},
          interval : null,
                    pagination2 : {},
          last_page : null,
          page : 1
        }
    },
    mounted(){
      var vm = this;
      //this.interval = setInterval(this.ambilData,5000);
        // axios.get('http://localhost:8000/operator/api/getalluser')
        // .then(function (response){
        //   Vue.set(vm.$data,'model',response.data.model)
        //   vm.$swal('data berhasil di load')www.bangringo.com
        // });  
        var vm = this;
        axios.get('http://localhost:8000/admin/generatelaporanview')
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          
          vm.$swal('data berhasil di load')
           vm.last_page = vm.model['last_page']

          var a = []
          for(var i = 0;i < vm.last_page ;i++){
                                 

            //Vue.set(vm.$data,'pagination2',i)
           a[i] = {nomor : i ,href : 'http://localhost:8000/operator/api/getalluser?page='+i}
          }
           Vue.set(vm.$data,'pagination2',a)
        });
    },
    methods : {
      bukamodal(){
        $("#cartModal").modal('show');
        this.judul_form = "tambah operator";
        this.judul_password = "password baru";
        this.datadiri.nama = "";
        this.datadiri.email = "";
        this.datadiri.password = "";
        
        this.datadiri.no_tlp = "";
        this.datadiri.kode_operator = "";
      },
      updateuser(item){
          $("#cartModal").modal('show');
          this.datadiri.kode_operator = item.kode_operator;
          this.judul_form = "update operator";
          this.judul_password = "password baru";
          this.datadiri.nama = item.nama;
          this.datadiri.email = item.email;
          
          this.datadiri.no_tlp = item.no_tlp;
      },
      ambilDataPagination(nomor){
           
        var vm = this;
        axios.get('http://localhost:8000/admin/api/getalloperator/'+this.search+'?page='+nomor)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          vm.page = nomor
           
        });

      },
      printdata(){
//window.location.href = "http://siwei.me"
 var url = 'http://localhost:8000/admin/jadikanlaporanpeminjaman/'+this.bulan+'/tahun/'+this.tahun;

 window.open(url, '_blank');

      },
      ambilData(){
        var vm = this;
        axios.get('http://localhost:8000/admin/generatelaporanview/'+this.bulan+'/tahun/'+this.tahun)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)   
          
          vm.last_page = vm.model['last_page']
            

          var a = []
          for(var i = 0;i < vm.last_page ;i++){
                                 

            //Vue.set(vm.$data,'pagination2',i)
           a[i] = {nomor : i ,href : 'http://localhost:8000/admin/api/getalloperator?page='+i}
          }
           Vue.set(vm.$data,'pagination2',a)
        });
      },
      ambilDataLangsung(){
        var vm = this;
        axios.get('http://localhost:8000/admin/api/getalloperator')
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)   
        });
      },
      lihatapi(){
          var vm = this
 axios.get('/admin/jadikanlaporanpeminjaman',   { data : this.dataapi})
            .then(function (resp){
              vm.$swal('operator berhasil diupdate')
              //vm.$router.push('/home/riwayatpeminjaman');
              //vm.ambilDataLangsung()
              //$('#cartModal').modal('hide')
              
              // vm.$("#detailmodal").modal('');
              //alert('berhasil')
            }).catch(function (resp){
                vm.$swal('hai')
            });
      },
        tambahUser(event){
          var vm = this
          if (this.judul_form == 'update operator') {
            if (this.datadiri.nama == "" || this.datadiri.email == "" || this.datadiri.password == "" || this.datadiri.no_tlp == "") {
              vm.$swal('update user gagal, tidak boleh ada data yang kosong');
            } else {
              
              axios.post('/admin/api/editoperator',   { datadiri : this.datadiri})
            .then(function (resp){
              vm.$swal('operator berhasil diupdate')
              //vm.$router.push('/home/riwayatpeminjaman');
              vm.ambilDataLangsung()
              $('#cartModal').modal('hide')
              
              // vm.$("#detailmodal").modal('');
              //alert('berhasil')
            }).catch(function (resp){
                vm.$swal('hai')
            });
            }
                
          } else {
            
            if (this.datadiri.nama == "" || this.datadiri.email == "" || this.datadiri.password == "" || this.datadiri.no_tlp == "") {
              vm.$swal("data diri tidak boleh kosong");
            } else {
              
            
            
            
            axios.post('/admin/api/tambahoperator',   { datadiri : this.datadiri})
            .then(function (resp){
              vm.$swal('user berhasil ditambahkan')
              //vm.$router.push('/home/riwayatpeminjaman');
              vm.ambilDataLangsung()
              $('#cartModal').modal('hide')
              
              // vm.$("#detailmodal").modal('');
              //alert('berhasil')
            }).catch(function (resp){
                vm.$swal('hai')
            });
            }
          }
     
        }
    }
}
</script>
