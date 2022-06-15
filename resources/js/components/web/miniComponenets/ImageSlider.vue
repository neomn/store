<template>
    <div class="relative flex justify-center w-full h-72  ">
        <div class="w-11/12 max-w-md h-60 ">
            <img ref="slider" :src="images[0]" alt="image slider" class=" w-full h-60 mt-4 rounded-2xl object-fill  ">
        </div>
        <div class=" absolute bottom-16 right-4 w-2/5 p-1 rounded-lg text-center text-zinc-900  ">
            <span ref="imageTitle"></span>
        </div>
        <div class="absolute bottom-1 flex justify-around items-center w-1/2 h-6 rounded-lg  ">
            <div v-for="(image , index) in images" :key="index" :ref="'img'+index"
                 class="w-6 h-4 rounded-lg border">
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
            firstTime: true,
            images: [
                '/storage/images/products/electronicsAndRobotics/raspberryPi/raspberryPi.png',
                '/storage/images/products/electronicsAndRobotics/arduino/arduino.png',
            ]
        }
    },
    mounted() {
        // setInterval(this.slider, 3000)
        // this.setImageNavigatorLocation()
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
            //remove current location effect from all navigators
            for (let i = 0; i < this.images.length; i++) {
                let item = 'img' + i
                this.$refs[item][0].classList.remove('backdrop-blur', 'bg-white/60')
            }
            if (this.firstTime) {
                this.$refs.img0[0].classList.add('backdrop-blur', 'bg-white/60')
                this.firstTime = false
            }
            let item = 'img' + index
            if (this.$refs[item] !== undefined)
                this.$refs[item][0].classList.add('backdrop-blur', 'bg-white/60')
        },
    },
}
</script>

