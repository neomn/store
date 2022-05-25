<template>
    <div>
        <div class=" w-full ">
            <img ref="slider" :src="images[0]" alt="image slider" class=" w-full h-52 object-fill">
        </div>
    </div>
</template>

<script>
export default {
    name: "ImageSlider",
    data(){
        return {
            currentlyDisplayingImage: 0,
            images:[
                '/resources/img/Welcome.jpg',
                '/storage/images/products/electronicsAndRobotics/arduino/arduino.png',
                '/storage/images/products/electronicsAndRobotics/esp/esp.png',
                '/storage/images/products/electronicsAndRobotics/raspberryPi/raspberryPi.png',
            ]
        }
    },
    mounted() {
        // this.slider()
        setInterval( this.slider, 3000)
        console.log(this.images)
        console.log(this.images.length)
    },
    methods: {
        slider(){
            this.$refs.slider.src = this.pickImage()
            // console.log(this.pickImage())
        },
        pickImage(){
            if (this.currentlyDisplayingImage < this.images.length-1){
                this.currentlyDisplayingImage++
                return this.images[this.currentlyDisplayingImage]
            } else {
                this.currentlyDisplayingImage = 0
                return this.images[this.currentlyDisplayingImage]
            }
        },
    },
}
</script>

<style scoped>

</style>
