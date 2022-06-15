<template>
    <div v-if="productContainer.length > 0 " class=" w-full h-fit text-zinc-200  ">
        <div class="gird grid-cols-1 flex flex-col items-center  ">
            <div v-for="product in productContainer" class="w-11/12 h-44 flex justify-end m-2 rounded-lg border">
                <!-- product info -->
                <div class="grow h-full flex flex-col justify-start ">
                    <div class="text-center font-bold border-b">
                        {{product.name}}
                    </div>
                </div>
                <!--product image -->
                <div class="">
                    <img :src="product.image" alt="product image" class="w-44 h-44  rounded-tr-lg rounded-br-lg" >
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
