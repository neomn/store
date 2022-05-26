<template>
    <div class=" flex flex-col justify-start w-full h-96 ">

        <!-- social media -->
        <div class="w-full h-32 border">

        </div>

        <!-- certificates -->
        <div class="relative w-full h-52  text-zinc-200 border">
            <div >
                <span> Certificates  </span>
            </div>
            <div class="absolute bottom-0 flex justify-center w-full h-44 ">
                <div class="">
                    <img src="/storage/images/certificates/enamad.png" alt="enamad"
                         class="w-40 h-40 object-fill ">
                </div>
                <div class="">
                    <img src="/storage/images/certificates/samandehi.png" alt="samandehi"
                         class="w-40 h-44 object-fill ">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>
div.fixed {
    position: fixed;
    bottom: 0;
    width: 1300px;
    display: inline;
    text-align: center;
}

h1 {
    color: white;
}
</style>
