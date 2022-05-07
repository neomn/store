<template>
    <div class="">
        <Header/>
        <img :src="product.image" alt="product image" class="w-screen h-60">
        <br>
        <div class="ml-4 text-gray-300">
            <h1 class="pb-3"> product number is {{ product_number }} </h1>
            <h1 class="pb-3"> product name is {{ product.name }} </h1>
            <h1 class="pb-3"> available count is {{ product.available_count }} </h1>
        </div>
        <br>
    </div>
</template>

<!---------------------------------------------------------------------------->

<script>
import Header from "../web/Header";

export default {
    name: "Product",
    components: {Header},
    data() {
        return {
            product_number: this.$route.params.product_number,
            product: {},
        }
    },

    mounted() {
        this.retriveProduct()
    },

    methods: {
        retriveProduct() {
            axios.get('/api/product/' + this.product_number)
                .then((response) => {
                    this.product = response.data.product
                    console.log('intended product >>>')
                    console.log(response.data.product)
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
    }
}
</script>

<!--------------------------------------------------------------------------->

<style scoped>

</style>
