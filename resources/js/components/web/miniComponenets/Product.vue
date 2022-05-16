<template class="relative">
    <div class=" absolute top-1/3 left-1/3  w-32 h-52 bg-slate-700 text-zinc-200">
        <router-link :to="{name: 'product' , params:{product_number: product.number}}">
            <!-- image -->
            <div class=" ">
                <img :src="product.image" alt="132" class="">
            </div>
            <!--content -->
            <div class=" text-sm text-center ">
                <p>{{ product.name }}</p>
            </div>
            <!--buttons -->
            <div class="">

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
