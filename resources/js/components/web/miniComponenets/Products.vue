<template>
    <div v-if="productContainer.length > 0 " class="z-20 absolute w-full h-fit text-zinc-200  border">
        <div class="gird grid-cols-1 flex flex-col items-center border">
            <div v-for="product in productContainer" class="w-full h-44 flex border">
                <!-- -->
                <div class="w-3/5">

                </div>
                <!--product image -->
                <div class="w-2/5">
                    <img :src="product.image" alt="product image" class="w-full h-full object-fill" >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ImageSlider from "./ImageSlider";
export default {
    name: "Products",
    components: {ImageSlider},
    props: [

    ],
    data(){
        return {
            productContainer: {}
        }
    },
    mounted() {
        this.$root.$on('loadProducts',(categoryId)=>{
            this.retrieveProducts(categoryId)
        })

        this.$watch(() => this.$route.params.category , (newValue , oldValue) => {
            this.productContainer = {}
        })
    },
    methods: {
        retrieveProducts(categoryId){
            axios.get('/api/productContainer/'+ categoryId)
            .then(response => {
                this.productContainer = response.data.product
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
