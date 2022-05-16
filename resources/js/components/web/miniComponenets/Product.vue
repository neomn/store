<template class="">
    <div class=" w-32 h-44 bg-slate-700 text-zinc-200">
        <router-link :to="{name: 'product' , params:{product_number: product.number}}">
            <!-- image -->
            <div class="overflow-hidden h-2/5 border-2 border-red-600  ">
                <img :src="product[0].image" alt="product-image" class="">
            </div>
            <!--content -->
            <div class=" text-sm text-center ">
                <p>{{ product[0].name }}</p>
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
