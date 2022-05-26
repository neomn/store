<template>
    <div class=" flex flex-col justify-start w-full h-96 ">

        <!-- social media -->
        <div class="w-full h-32 ">

        </div>

        <!-- certificates -->
        <div class="relative flex flex-col items-center w-full h-52 text-zinc-200  ">
            <div class="flex flex-col w-11/12 h-52 rounded-lg border " >
                <div class=" h-10 ml-6 text-lg font-bold ">
                    <span> Certificates  </span>
                </div>
                <div class="flex justify-center w-full h-44  ">
                    <div class=" m-2 rounded-lg bg-slate-800">
                        <img src="/storage/images/certificates/enamad.png" alt="enamad"
                             class="w-36 h-40 object-fill  ">
                    </div>
                    <div class="m-2 rounded-lg bg-slate-800">
                        <img src="/storage/images/certificates/samandehi.png" alt="samandehi"
                             class="w-36 h-40 object-fill ">
                    </div>
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
