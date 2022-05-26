<template>
    <div class=" relative flex justify-center w-full  ">
        <div class="w-full ">
            <img ref="slider" :src="images[0]" alt="image slider" class=" w-full h-52 object-fill ">
        </div>
        <div class=" absolute bottom-16 right-4 w-2/5 p-1 rounded-lg text-center text-zinc-900  ">
            <span ref="imageTitle"></span>
        </div>
        <div class="absolute bottom-2 flex justify-around items-center w-1/2 h-6 rounded-lg  ">
            <div v-for="(image , index) in images" :key="index" :ref="'img'+index" class="w-8 h-4 'backdrop-blur' 'bg-white/60' rounded-lg border">

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ImageSlider",
    data() {
        return {
            currentlyDisplayingImage: 0,
            images: [
                '/resources/img/Welcome.jpg',
                '/storage/images/products/electronicsAndRobotics/arduino/arduino.png',
                '/storage/images/products/electronicsAndRobotics/esp/esp.png',
                '/storage/images/products/electronicsAndRobotics/raspberryPi/raspberryPi.png',
            ]
        }
    },
    mounted() {
        setInterval(this.slider, 3000)
        this.setImageNavigatorLocation()
    },
    methods: {
        slider() {
            this.$refs.slider.src = this.pickImage()
            this.setImageNavigatorLocation(this.currentlyDisplayingImage)
        },
        pickImage() {
            if (this.currentlyDisplayingImage < this.images.length - 1) {
                this.currentlyDisplayingImage++
                return this.images[this.currentlyDisplayingImage]
            } else {
                this.currentlyDisplayingImage = 0
                return this.images[this.currentlyDisplayingImage]
            }
        },
        setImageNavigatorLocation(index) {
            for (let i = 0; i < this.images.length; i++) {
                let item = 'img' + i
                console.log(item)
                this.$refs[item][0].classList.remove('backdrop-blur', 'bg-white/60')
            }
            let item = 'img' + index
            console.log(this.$refs[item][0])
            this.$refs[item][0].classList.add('backdrop-blur', 'bg-white/60')
        },
    },
}
</script>

<style scoped>

</style>
