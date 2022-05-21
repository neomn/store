<template>
    <div class=" w-full min-h-screen bg-slate-900 ">
        <Header class="z-50"/>
        <SideBar class="z-40"/>
        <h1>this is categories component</h1>
    </div>
</template>

<script>
import Header from "./Header";
import SideBar from "./Sidebar";

export default {
    name: "Categories",
    components: {SideBar, Header},
    data(){
        return {

        }
    },
    mounted(){

    },
    methods: {
        retrieveAllCategories(){
            axios.get('/')
        }
    },
}
</script>

<style scoped>

</style>
