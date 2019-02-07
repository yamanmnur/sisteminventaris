<template>

    <table>
        <tr>
            <th>Kode Jenis</th>
            <th>Nama Jenis</th>
        </tr>
        <tr v-for="models in model.data">
            <td>{{models.kode_jenis}}</td>
            <td>{{models.nama_jenis}}</td>
        </tr>
    </table>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            model: {}
        }
    },
    created: function(){
        this.ambilData();
    },
    methods: {
        ambilData(){
            var vm = this
            axios.get('http://localhost:8000/api/jenis')
            .then(function (response){
                Vue.set(vm.$data,'model',response.data.model)
            })
        }
    }
}
</script>
