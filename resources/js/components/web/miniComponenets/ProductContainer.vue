<template>
    <div class=" z-20 flex justify-center items-center w-full h-64 my-4 overflow-y-hidden text-lg font-bold  ">
        <div ref='productContainer' class=" flex w-11/12 h-full p-2 overflow-x-scroll rounded-lg  backdrop-blur bg-white/10 ">
            <!--title -->
            <div class="w-1/3 self-start mt-10 flex text-zinc-300">
                <h1 class="w-44">{{ title }}</h1>
            </div>
            <!-- product -->
            <div v-for="item in products" class="mx-1">
                <Product :product="item"/>
            </div>
        </div>
    </div>
</template>

<script>


import Product from "./Product";

export default {
    name: "ProductContainer",
    components: {
        Product
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
