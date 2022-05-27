<template>
    <div class=" flex justify-center w-full h-60 ">
        <div class=" relative flex w-11/12 max-w-sm min-w-{100px} h-52 m-4 border ">
            <div>
                <img :src="imageUrl" alt="offer" class="w-60 h-52">
            </div>
            <div >
                <!--discount-->
                <div class="absolute top-2 right-2  w-20 h-20 ">
                    <div class=" relative w-auto h-10 ">
                        <img src="/storage/images/other/discount.png" alt="discount">
                        <div class="absolute top-4  left-5 text-zinc-200">
                            <h1>{{ discountPercentage }}</h1>
                        </div>
                    </div>
                </div>
                <!--title-->
                <div class="text-zinc-200">
                    <h3>Arduino Uno R3</h3>
                </div>
                <!--description-->
                <div class="w-44 relative bottom-4 text-sm text-zinc-200 border">
                    <span>buy the most popular Arduino with an special discount</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Offer",
    props: [
        'imageUrl',
        'discountPercentage'
    ],
}
</script>

<style scoped>

</style>
