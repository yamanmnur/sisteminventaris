
        <template>
         <div>
        
            <button class="btn btn-success" data-toggle="modal" data-target="#cartModal">Barang Yang Anda Pinjam {{cartItems.length}}</button>
              
             
            <br>
            <br>
                           <input @keyup="ambilData" class="form-control" placeholder="Search" type="text" v-model="search">

              <!--<router-link to="/home/contoh" class="btn btn-success" data-toggle="modal" data-target="#detailmodal">lihat</router-link>-->

              <router-view   ></router-view>
              
              <br>
            <br>
            <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">          <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel">Cart</h4>
                      </div>
                      <div class="modal-body">
                         <shopping-cart inline-template :items="cartItems"  >
                            <div>
                               <table class="table table-cart">
                                 <tr>
                                   <th>
                                     nama
                                   </th>
                                   <th>jumlah</th>
                                   <th>stok</th>
                                   <th>aksi</th>
                                 </tr>
                                  <tr v-for="(item, index) in items" v-model="items">
                                     <td>{{item.nama}}</td>
                                     <td style="">
                                        <input v-model="item.jumlahqty" class="form-control input-qty" type="number" min='1' max='5'>
                                     </td>
                                     <td>
                                       {{ item.jumlah }}
                                     </td>
                                      <td >
                                       
                                       <button type="button" @click="removeItem(index)" class="btn btn-errorr" style="backro">hapus</button>
                                     </td>
                                  </tr>
                                   
                                  <tr v-show="items.length === 0">
                                     <td   class="text-center" colspan="4">Cart is empty</td>
                                  </tr>
                                  <tr v-show="items.length > 0">
                                    <td colspan="4">

                                    <p>{{ tanggal_sekarang }}</p>
                                    <p>kapan barang akan dikembalikan {{ tanggal_kembali }}</p>
                                    <input  v-model="tanggal_kembali" class="form-control input-qty" type="date" >
                                    <p>jam berapa barang akan dikembalikan {{ jam_kembali }}</p>
                                    <input v-model="jam_kembali" type="time" class="form-control input-qty">
                                    <span v-if="new Date(tanggal_kembali) < tanggal_sekarang">tidak</span>
                                    <span v-else>boleh</span>
                                    </td>
                                  </tr>
                                   <tr v-show="items.length > 0">
                                     <td colspan="4">

                                     
                                       <button @click="tambahKeDatabase()" class="btn btn-primary">pinjam</button>
                                        <button   @click="hapuSemua()" class="btn btn-primary">hapussemua</button>
                                    </td>
                                  </tr>
                               </table>
                            </div>
                            <!-- /.container -->
                         </shopping-cart>
                      </div>
                      <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                   </div>
                </div>
             </div>
            <!-- detail barang -->
              <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                  <div class="modal-content bg-gradient-danger">
                    <detail-barang inline-template  :items="detailbarangs"  >
                      <div>

                      <div  v-for="(item, index) in items">

                      
                      <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      
                      <div class="modal-body">
                        
                          <div class="py-3 text-center">
                              <i class=" ni-3x">{{ item.nama }}</i>
                              <h4 class="heading mt-4"> </h4>
                              <p>jumlah tersedia : {{ item.jumlah }}</p>
                              <p>kondisi : {{ item.kondisi }}</p>
                          </div>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" id="login-modal" class="btn btn-white">lihat letak barang / lebih detail</button>
                       </div>
                      </div>
                      </div>
                    </detail-barang> 
                  </div>
                </div>
              </div>
<!-- detail barang -->


          
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
              <table class="table align-items-center ">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Yang Tersedia</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col" colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
      
                  <tr v-for="item in items.data">
                    <th scope="row">
                      {{ item.nama }}
                    </th>
                    <td>
                      <span v-if="item.jumlah <= 0">habis</span>
                      <span v-else>{{ item.jumlah }}</span>
                    </td>
                    <td>
                      {{ item.kondisi }}
                    </td>
                    <td>
                      <button  v-if="item.jumlah <= 0 " class="btn btn-error">habis</button>
                      <button @click="addToCart(item)" v-else class="btn btn-primary">pinjam</button>
                     </td> 
                     <td>
                      <button @click="detailbarang(item)" class="btn btn-info">detail</button>
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
    
      import axios from 'axios';
      import VueSweetalert2 from 'vue-sweetalert2';
      window.Vue = require('vue');
      Vue.use(VueSweetalert2);
      Vue.component('shopping-cart',  {
        props: ['items'],
        data(){
          return{
            tanggal_sekarang : new Date(),
            tanggal_kembali : null,
            jam_kembali : null
          }
        },

        computed: {
                 
        },

        methods: {
          hapuSemua(){
            this.items.splice(this.items)
//            this.items.splice(this.items[1], 1)
          },
          removeItem(index) {
            this.items.splice(index, 1)
            //this.items.splice(item, )
            //this.items.splice(index, 1)
          },
          
          tambahKeDatabase(event){
            var vm = this
            
            var array = [];
            for (let index = 0; index < this.items.length; index++) {
              if(this.items[index]['jumlahqty'] > this.items[index]['jumlah']){
                array[index] = {kondisi : 'melebihi jumlah stok'}              
              }
              
             }
            if (array.length > 0) {
                vm.$swal('gagal , barang yang anda pinjam melebihi stok barang');              
            } else {
              if(new Date(vm.tanggal_kembali) < vm.tanggal_sekarang){
                vm.$swal('gagal , tanggal kembali tidak boleh lampau');
              }else{
                
              
              axios.post('/api/tambahPeminjaman',  {items : this.items,tanggalkembali : vm.tanggal_kembali+" "+vm.jam_kembali})
            .then(function (resp){
              vm.$swal('barang berhasil dipinjam')
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
        }
      });

      Vue.component('detail-barang', {
        props: ['items'],

        computed: {
                  
        },

        methods: {
          
        }
      });
      export default {
                  
        data(){        
          return {
            kondisitanggal : null,
            search : '',
            iii : [],
            cartItems : [],
            detailbarangs: [],
            items : {},
            tersedia : null,
                      pagination2 : {},
          last_page : null,
          page : 1
          }
        },
        mounted(){
           var vm = this
          axios.get('http://localhost:8000/api/inventaris/'+this.search)
          .then(function (response){
            
            Vue.set(vm.$data,'items',response.data.items)
            vm.$swal('data berhasil di load')
             vm.last_page = vm.items['last_page']

          var a = []
          for(var i = 0;i < vm.last_page ;i++){
                                 

            //Vue.set(vm.$data,'pagination2',i)
           a[i] = {nomor : i }
          }
           Vue.set(vm.$data,'pagination2',a)
          })
        },
        methods: {
          ambilDataPagination(nomor){
           
        var vm = this;
        axios.get('http://localhost:8000/api/inventaris/'+this.search+'?page='+nomor)
        .then(function (response){
          Vue.set(vm.$data,'items',response.data.items)
          vm.page = nomor
           
        });

      },
          ambilData(){
            var vm = this;
            axios.get('http://localhost:8000/api/inventaris/'+this.search)
            .then(function (response){
              Vue.set(vm.$data,'items',response.data.items)
               vm.last_page = vm.items['last_page']

          var a = []
          for(var i = 0;i < vm.last_page ;i++){
                                 

            //Vue.set(vm.$data,'pagination2',i)
           a[i] = {nomor : i }
          }
           Vue.set(vm.$data,'pagination2',a)
            });
          },
          hapusSemua(){
            alert('sdf')
          },
          detailbarang(items){
          this.detailbarangs.splice(this.detailbarangs[0],1);
            this.detailbarangs.push(items);
            $("#detailmodal").modal('show');

          },
              addToCart(itemToAdd) {
                var found = false;
                          // Check if the item was already added to cart
    
    // If so them add it to the qty field
                itemToAdd.jumlahqty = 1;
                this.cartItems.forEach(item => {
  //                item.jumlah = 1; //menset jumlah cart menjadi 1 ketika tombol pinjam di klik

                  if (item.id_inventaris === itemToAdd.id_inventaris) {
                    found = true;
                    item .jumlahqty++; // menambah jumlah item 1 ketika tombol pinjam di klik
                  }
                });

                if (found === false) {
                            
                  this.cartItems.push(Vue.util.extend({}, itemToAdd));
                              
                }
                this.$swal('ditambahkan ke keranjang');
              }
              // end method add to cart
        }
            
      }

    </script>