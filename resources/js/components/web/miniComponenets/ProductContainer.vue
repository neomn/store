<template>
    <div class=" flex justify-start items-center w-full h-1/4 my-2 pl-2 overflow-y-hidden bg-emerald-300 ">
        <Product :product="product" />
    </div>
</template>

<script>


import Product from "./Product";

export default {
    name: "ProductContainer",
    components: {
        Product
    },
    props:[
      'product'
    ],
}
</script>

<style scoped>

</style>
