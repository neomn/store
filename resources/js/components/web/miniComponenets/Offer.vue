<template>
    <div class="relative flex justify-start w-full h-60 ">
        <div class=" w-11/12 max-w-sm min-w-{100px} h-52 m-4 ">
            <img :src="imageUrl" alt="offer" class="w-80 h-52">
        </div>
        <div class="absolute top-32 right-10 w-auto h-10  border">
            discount
        </div>
        <div>
            title
        </div>
    </div>
</template>

<script>
export default {
    name: "Offer",
    props: [
        'imageUrl',
        'discount'
    ],
}
</script>

<style scoped>

</style>
