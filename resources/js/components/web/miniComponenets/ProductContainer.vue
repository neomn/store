<template>
    <div ref='abcd'
        class=" flex items-center w-full h-1/4 my-2 pl-2 overflow-y-hidden rounded-lg
            bg-gradient-to-r from-amber-400 via-zinc-700 to-zinc-900 text-lg font-bold">
        <div class="w-1/3 self-start mt-10 text-zinc-900">
            <h1 class="w-44">{{ title }}</h1>
        </div>
        <div v-for="item in products" class="mx-1">
            <Product :product="item"/>
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
    created() {
      //   console.log('product container created -----------')
      // this.setColor(this.$props.color)
    },
    methods:{
      // setColor(color){
      //     // this.$refs.productContainer.classList.add('bg-gradient-to-r from-'+color+'-400 via-zinc-700 to-zinc-900')
      //     console.log(this.$refs.abcd)
      //     console.log('from-'+color+'-400')
      // }
    },
}
</script>

<style scoped>

</style>
