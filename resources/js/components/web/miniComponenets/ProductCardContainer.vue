<template>
    <div class="w-full h-72 my-4 flex justify-center text-zinc-200 ">
        <div ref='productContainer' class=" flex w-11/12 h-full p-2 overflow-x-scroll rounded-lg  backdrop-blur bg-white/10 ">
            <!--title -->
            <div class="w-1/3 self-start mt-10 flex text-zinc-300">
                <h1 class="w-44">{{ title }}</h1>
            </div>
            <!-- product -->
            <div v-for="item in products" class="mx-1">
                <ProductCard :product="item"/>
            </div>
        </div>
    </div>
</template>

<script>


import ProductCard from "./ProductCard";

export default {
    name: "ProductContainer",
    components: {
        ProductCard
    },
    props: [
        'products',
        'title',
        'color',
    ],
    mounted() {
        this.setColor(this.$props.color)
        console.log('product container mounted')
    },
    methods: {
        setColor(color) {
            let colorString = 'bg-' + color
            // this.$refs.productContainer.classList.add(colorString)
        }
    },
}
</script>

<style scoped>

</style>
