<template>
  <div class="text-gray-300">
      <h1>this is product component</h1>
      <h1> product number is  {{$route.params.product_number}}</h1>
  </div>
</template>

<script>
export default {
    name: "Product",
    data(){
        return{
            product:[],
        }
    },
    mounted() {
        this.retriveProduct()
    },
    methods:{
        retriveProduct() {
            axios.get('/api/product/{product_number}')
            .then((response)=>{
                this.product = response.data
            })
            .catch(function (error){
                console.log(error)
            })
        },
    }
}
</script>





<style scoped>

</style>
