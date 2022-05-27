<template>
    <div class=" flex flex-col justify-start w-full h-auto  ">

        <!-- social media -->
        <div class=" flex flex-col  w-full h-auto my-10  ">
            <div class=" ml-8 text-zinc-200 text-lg font-bold ">
                <span> </span>
            </div>
            <div class=" flex justify-center w-full h-auto ">
                <div class=" flex justify-center items-center w-11/12 h-auto rounded-lg  ">
                    <div class=" w-16 h-16 mx-4 rounded-lg bg-slate-800 ">
                        <img src="/storage/images/socialMedia/instagram.png" alt="instagram">
                    </div>
                    <div class=" w-16 h-16 mx-4 rounded-lg bg-slate-800 ">
                        <img src="/storage/images/socialMedia/linkedin.png" alt="linked-in">
                    </div>
                    <div class=" w-16 h-16 mx-4 rounded-lg bg-slate-800 ">
                        <img src="/storage/images/socialMedia/telegram.png" alt="telegram">
                    </div>
                </div>
            </div>
        </div>

        <!-- certificates -->
        <div class="relative flex flex-col items-center w-full h-52 text-zinc-200 mb-16 ">
            <div class="flex flex-col w-11/12 h-52 rounded-lg  ">
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
