<template>
        <div class=" w-44 h-full  bg-slate-800 rounded-lg text-zinc-200 ">
            <router-link :to="{name: 'product' , params:{product_number: product.number}}">
                <!-- image -->
                <div class="overflow-hidden h-2/5 rounded-tl-lg rounded-tr-lg ">
                    <img :src="product.image" alt="product-image" class="w-full h-16 object-fill">
                </div>
                <!--content -->
                <div class=" text-sm text-center ">
                    <p>{{ product.name }}</p>
                </div>
            </router-link>
        </div>
</template>

<script>
export default {
    name: "Product",
    props: [
        'product'
    ],
    data() {
        return {}
    },

}
</script>

<style scoped>

</style>
