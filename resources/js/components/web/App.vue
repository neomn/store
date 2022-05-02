<template>
    <div class=" bg-slate-800 min-h-screen ">
        <!-- this img tag is for prevent childes moving parent  -->
        <img src="" alt="" class="bg-slate-800">
        <router-view/>
    </div>
</template>

<script>
export default {
    name: "app"
}
</script>

<style scoped>

</style>
