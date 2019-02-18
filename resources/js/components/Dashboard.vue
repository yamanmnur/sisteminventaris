
        <template>
         <div>
        
            <button class="btn btn-success" data-toggle="modal" data-target="#cartModal">Barang Yang Anda Pinjam {{cartItems.length}}</button>
              
             
            
             
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
                                  <tr v-for="(item, index) in items" v-model="items">
                                     <td>{{item.nama}}</td>
                                     <td style="">
                                        <input v-model="item.jumlahqty" class="form-control input-qty" type="number" min='1' max='5'>
                                     </td>
                                      <td >
                                       
                                       <button type="button" @click="removeItem(item)" class="btn btn-errorr" style="backro">hapus</button>
                                     </td>
                                  </tr>
                                   
                                  <tr v-show="items.length === 0">
                                     <td colspan="4" class="text-center">Cart is empty</td>
                                  </tr>
                                   <tr v-show="items.length > 0">
                                       <button @click="tambahKeDatabase()" class="btn btn-primary">pinjam</button>
                                       <button   @click="hapuSemua()" class="btn btn-primary">hapussemua</button>
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
      
                  <tr v-for="item in items.data">
                    <th scope="row">
                      {{ item.nama }}
                    </th>
                    <td>
                      {{ item.jumlah }}
                    </td>
                    <td>
                      {{ item.kondisi }}
                    </td>
                    <td>
                      <button @click="addToCart(item)" class="btn btn-primary">pinjam</button>
                     </td> 
                     <td>
                      <button @click="detailbarang(item)" class="btn btn-info">detail</button>
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

    Vue.component('shopping-cart', {
      props: ['items'],

      computed: {
                 
      },

      methods: {
        hapuSemua(){
          this.items.splice(this.items[0], 1)
          this.items.splice(this.items[1], 1)
        }
        ,
        removeItem(item) {
          this.items.splice(item, )
          //this.items.splice(item, )
          //this.items.splice(index, 1)
                                                  

        },
         
        tambahKeDatabase(event){
          axios.post('/api/tambahPeminjaman',  {items : this.items})
          .then(function (resp){
            alert('berhasil meminjam')
           }).catch(function (resp){
            alert('gagal meminjam')

          });
          //this.items.splice(this.items)           
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
          iii : [],
          cartItems : [],
          detailbarangs: [],
          items : {}
        }
      },
      mounted(){
                     
        var vm = this
        axios.get('http://localhost:8000/api/inventaris')
        .then(function (response){
          Vue.set(vm.$data,'items',response.data.items)
        })
      },
      methods: {
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
            }
            // end method add to cart
      }
           
    }

    </script>