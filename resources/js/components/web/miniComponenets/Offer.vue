<template>
    <div class=" flex justify-center w-full h-60  ">
        <div class=" relative w-11/12 max-w-lg  h-52 m-4  border">
            <div class=" absolute top-0 flex flex-col items-center w-1/3 overflow-hidden ">
                <!--discount-->
                <div class=" flex justify-center">
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
                <div class=" text-zinc-200">
                    <h3>Arduino Uno R3</h3>
                </div>
            </div>
            <!--image-->
            <img :src="imageUrl" alt="offer" class="absolute right-0 w-60 h-52 border  ">
            <!--description-->
            <div class=" absolute bottom-0 w-44 text-sm text-zinc-200 ">
                <span>buy the most popular Arduino with an special discount</span>
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
