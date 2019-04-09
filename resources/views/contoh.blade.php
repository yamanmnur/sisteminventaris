 {{ $title }}
{{-- @extends('layouts.app-contoh')
@section('judulhalaman')
  halaman utama
@endsection
@section('header')

     
     
        <router-link class="btn btn-success" to="/profileuser">
          <i class="ni ni-tv-2 text-primary"></i> profileuser
         </router-link>
         <router-view></router-view>
         <contoh-peminjaman></contoh-peminjaman>
     

   
@endsection
@section('content')
 
@endsection


<script>
        /*  Vue.component('todo-item', {
        template: '\
          <li>\
            @{{ message }}\
            <button v-on:click="$emit(\'remove\')">Remove</button>\
          </li>\
        ',
        props: ['message']
      })
        var example = new Vue({
          el:'#contoh',
          data : {
            isi : '',
            items: [
              {
                id: 1,
                message: 'Foo',
                jumlah : 0
              },
              {
                id: 2
                message: 'boo',
                jumlah : 0
              }
            ]
          },
          methods: {
            tambahdata : function($data){
              var found = false;

              // Check if the item was already added to cart
              // If so them add it to the qty field
              this.cartItems.forEach(item => {
                if (item.id === $data.id) {
                  found = true;
                  item.jumlah += $data.jumlah;
                }
              });

              if (found === false) {
                this.items.push({
                message : $data
                })
              }

              $data.jumlah = 1;
              
              this.isi = ''
            }
          }
        })*/
</script> --}}