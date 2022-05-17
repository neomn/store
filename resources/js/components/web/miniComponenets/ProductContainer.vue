<template>
    <div ref='productContainer'
        class=" flex items-center w-full h-1/3 my-2 pl-2 overflow-y-hidden rounded-lg text-lg font-bold
                 bg-gradient-to-r from-slate-700
            ">

        <!--title -->
        <div class="w-1/3 self-start mt-10 flex text-zinc-400">
            <h1 class="w-44">{{ title }}</h1>
        </div>
        <!-- product -->
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
    mounted() {
      this.setColor(this.$props.color)
    },
    methods:{
      setColor(color){
          let colorString = 'from-'+color
          // this.$refs.productContainer.classList.add('bg-gradient-to-r')
          // this.$refs.productContainer.classList.add(colorString)
          // this.$refs.productContainer.classList.add('via-zinc-700')
          // this.$refs.productContainer.classList.add('to-zinc-900')
      }
    },
}
</script>

<style scoped>

</style>
