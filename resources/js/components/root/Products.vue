<template>
  <div class="text-gray-300">
      {{products}}
  </div>
</template>

<script>
export default {
    name: "Products",
    data(){
        return{
            products:[],
        }
    },
    mounted() {
        this.retriveAllProducts()
    },
    methods:{
        retriveAllProducts() {
            axios.get('/api/products')
            .then((response)=>{
                this.products = response.data
            })

        },
    }
}
</script>

<style scoped>

</style>
