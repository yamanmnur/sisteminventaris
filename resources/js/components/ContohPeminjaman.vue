
        <template>
         <div>
        
             <button class="btn btn-success" data-toggle="modal" data-target="#cartModal">Cart {{cartItems.length}}</button>
           
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
                                        <input v-model="item.jumlah" class="form-control input-qty" type="number" min='1' max='5'>
                                     </td>
                                      <td>
                                        <button type="button" @click="removeItem(index)" class="btn btn-errorr" style="backro">hapus</button>
                                     </td>
                                  </tr>
                                  <tr >
                                      <td colspan="3">
                            <button @click="tambahKeDatabase()" class="btn btn-primary">pinjam</button>

                                      </td>
                                  </tr>
                                  <tr v-show="items.length === 0">
                                     <td colspan="4" class="text-center">Cart is empty</td>
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
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Page visits</h3>
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
                    <th scope="col">Page name</th>
                    <th scope="col">Visitors</th>
                    <th scope="col">Unique users</th>
                    <th scope="col">Bounce rate</th>
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
                  </tr>
      
                </tbody>
              </table>
            </div>
          </div>
          
            
        </div>
    </template>

    <script>
      import axios from 'axios'
    Vue.component('shopping-cart', {
      props: ['items'],

      computed: {
                 
      },

      methods: {
        removeItem(index) {
          this.items.splice(index, 1)
                                                  

        },
        tambahKeDatabase(event){
          axios.post('/api/tambahPeminjaman',  {items : this.items})
          .then(function (resp){
            alert('berhasil meminjam')
          }).catch(function (resp){
            alert('gagal meminjam')

          });           
        }
      }
    })
            
    export default {
                
      data(){        
        return {
          iii : [],
          cartItems : [],
             
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
            addToCart(itemToAdd) {
              var found = false;
                        // Check if the item was already added to cart
                                // If so them add it to the qty field
              this.cartItems.forEach(item => {
                item.jumlah = 1; //menset jumlah cart menjadi 1 ketika tombol pinjam di klik

                if (item.id_inventaris === itemToAdd.id_inventaris) {
                  found = true;
                  item .jumlah++; // menambah jumlah item 1 ketika tombol pinjam di klik
                }
              });

              if (found === false) {
                          
                this.cartItems.push(Vue.util.extend({}, itemToAdd));
                            
              }
                            //itemToAdd.jumlah = 1;
            }
            // end method add to cart
      }
           
    }

    </script>