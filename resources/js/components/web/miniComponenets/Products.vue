<template>
    <div class="z-20 absolute w-full h-fit text-zinc-200  border">
        <div class="gird grid-cols-1 border">
            <div v-for="product in productContainer" class="w-11/12 h-44 border">
                {{product}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Products",
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
