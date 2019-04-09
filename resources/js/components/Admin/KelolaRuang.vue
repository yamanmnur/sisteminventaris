<template>
    <div>
      <button class="btn btn-success" @click="bukamodal()">Tambah Barang</button>
              
             
            <br>
            <br>
                           <input @keyup="ambilData" class="form-control" placeholder="Search" type="text" v-model="search">

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
                        <label class="form-control-label" for="input-username">Nama jenis  </label>
                        <input v-model = "formdata.nama_ruang" type="text" id="input-username" class="form-control " placeholder="example" >
                      </div>
                    </div>
                     
                    <div class="col-lg-12"  >
                      <div class="form-group">
                        <label class="form-control-label" for="input-email" >keterangan </label>
                        <textarea name="" v-model="formdata.keterangan" cols="30" rows="10" class="form-control"  >{{ formdata.keterangan }}</textarea>
                       
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
                     <th scope="col">keterangan</th>
                  </tr>
                </thead>
                <tbody>
                   <tr   v-for="item in model.data">
                    

                    <td>
                        {{ item.nama_ruang }}
                    </td>
                    <td>
                      {{ item.keterangan_ruang }}
                    </td>
                     
                    <td>
                       <button @click="updateuser(item)" class="btn btn-success">update</button>
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
            judul_form : "tambah barang",
                        datadiri : {'kode_user' : '',"nama" : '',"email": "","password" : '',"kelas" : '', "jurusan" : "","level" : '',"no_id" : ""},

            formdata : {
                 "nama_ruang" : '',
                 "keterangan" : '',
                 "kode_ruang" : '',
            },
            error : {nama : '',kelas : ''},
            level : '',
            value : 'error',
            model_jenis : {},
            model_ruang : {},
            nama : '',
            search : '',
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
        axios.get('http://localhost:8000/admin/api/getallruang/'+this.search)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
           
          vm.last_page = vm.model['last_page']
          vm.$swal('data berhasil di load')
           

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
        this.judul_form = "tambah ruang";
        this.judul_password = "password baru";
        this.formdata.nama_ruang = "";
         this.formdata.keterangan = "";
       
        this.formdata.kode_ruang = "";
        },
      updateuser(item){
          $("#cartModal").modal('show');
           this.judul_form = "update ruang";
         this.formdata.nama_ruang = item.nama_ruang;
          this.formdata.keterangan = item.keterangan_ruang;
         this.formdata.kode_ruang = item.kode_ruang;
       },
      ambilDataPagination(nomor){
           
        var vm = this;
        axios.get('http://localhost:8000/admin/api/getallruang/'+this.search+'?page='+nomor)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)
          vm.page = nomor
           
        });

      },
      ambilData(){
        var vm = this;
        axios.get('http://localhost:8000/admin/api/getallruang/'+this.search)
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)   
          
          vm.last_page = vm.model['last_page']
            

          var a = []
          for(var i = 0;i < vm.last_page ;i++){
                                 

            //Vue.set(vm.$data,'pagination2',i)
           a[i] = {nomor : i ,href : 'http://localhost:8000/operator/api/getalluser?page='+i}
          }
           Vue.set(vm.$data,'pagination2',a)
        });
      },
      ambilDataLangsung(){
        var vm = this;
        axios.get('http://localhost:8000/admin/api/getallruang')
        .then(function (response){
          Vue.set(vm.$data,'model',response.data.model)   
        });
      },
        tambahUser(event){
          var vm = this
          if (this.judul_form == 'update ruang') {
            if (this.formdata.nama_ruang == "" || this.formdata.keterangan == "" 
            ) {
              vm.$swal('update ruang gagal, tidak boleh ada data yang kosong');
            } else {
              
              axios.post('/admin/api/editruang',   { formdata : this.formdata})
            .then(function (resp){
              vm.$swal('ruang berhasil diupdate')
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
            
            if (this.formdata.nama_ruang == "" || this.formdata.keterangan == "" 
            ){
              vm.$swal("data barang tidak boleh kosong");
            } else {
              
            
            
            
            axios.post('/admin/api/tambahruang',   { formdata : this.formdata})
            .then(function (resp){
              vm.$swal('ruang berhasil ditambahkan')
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
