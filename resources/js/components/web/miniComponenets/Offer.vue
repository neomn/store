<template>
    <div class="z-20 flex justify-center w-full h-60  ">
        <div class=" relative w-11/12 max-w-sm  h-52 m-4  ">
            <!--image-->
            <img :src="imageUrl" alt="offer" class=" absolute right-0 w-60 h-52 text-zinc-200 ">
            <div class=" absolute top-0 flex  overflow-hidden ">
                <!--discount-->
                <div class=" flex justify-center  ">
                    <div class=" w-20 h-20 ">
                        <div class=" relative w-auto h-10 ">
                            <img src="/storage/images/other/discount.png" alt="discount">
                            <div class="absolute top-4  left-5 text-zinc-200">
                                <h1>{{ discountPercentage }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!--title-->
                <div class=" pt-4  text-zinc-200">
                    <h3>Arduino Uno R3</h3>
                </div>
            </div>
            <!--description-->
<!--            <div class=" absolute bottom-0 w-44 pl-2 text-sm text-zinc-200 hidden ">-->
<!--                <span>buy the most popular Arduino with an special discount</span>-->
<!--            </div>-->
        </div>
    </div>
</template>

<script>
export default {
    name: "Offer",
    props: [
        'imageUrl',
        'discountPercentage',
    ],
}
</script>

<style scoped>

</style>
