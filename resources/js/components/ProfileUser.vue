<template >
    <div>

    <h2  >
        {{ nama }}
    </h2>
    <h1>hai orang asing {{ $route.params.kode_user }}</h1>
    </div>
</template>
<script>
export default {
               
      data(){        
        return {
      
          nama : this.$route.params.kode_user
        }
      },
         mounted(){
            ;this.nama = this.$route.params.kode_user;   
        
      }
}
</script>
