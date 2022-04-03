<template>
  <div class="text-gray-300">
      <Header/>
      <h1>this is product component</h1>
      <h1> product number is {{product_number}}  </h1>
      <h1> product name is {{product.name}}  </h1>
      <br>
  </div>
</template>

<!---------------------------------------------------------------------------->

<script>
import Header from "../web/Header";
export default {
    name: "Product",
    components: {Header},
    data(){
        return{
            product_number: this.$route.params.product_number,
            product:[],
        }
    },

    mounted() {
        this.retriveProduct()
    },

    methods:{
        retriveProduct() {
            axios.get('/api/product/'+ this.product_number)
            .then((response)=>{
                this.product = response.data.product
                console.log('intended product >>>')
                console.log(response.data.product)
            })
            .catch(function (error){
                console.log(error)
            })
        },
    }
}
</script>

<!--------------------------------------------------------------------------->

<style scoped>

</style>
