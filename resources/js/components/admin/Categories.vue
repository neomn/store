<template>
    <div class=" w-full h-screen bg-slate-900  ">
        <Header class="z-50"/>
        <SideBar class="z-40"/>

        <!-- categories component content-->
        <div class="flex flex-col w-full h-full justify-start items-center bg-slate-900 ">
            <!-- search box-->
            <div class=" w-11/12 h-12 m-4 rounded-lg bg-slate-800">

            </div>

            <!-- display all categories-->
            <div class=" flex flex-col justify-center items-center w-11/12 h-full mb-20 rounded-lg text-zinc-800 bg-slate-800">
<!--                <div v-for="category in categories" class=" w-5/6  bg-amber-400">-->
<!--                    <div>-->
<!--                        {{ category.category }}-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>

    </div>
</template>

<script>
import Header from "./Header";
import SideBar from "./Sidebar";

export default {
    name: "Categories",
    components: {SideBar, Header},
    data() {
        return {
            categories: {}
        }
    },
    mounted() {
        this.retrieveAllCategories()
    },
    methods: {
        retrieveAllCategories() {
            axios.get('/admin-api/categories')
                .then(response => {
                    this.categories = JSON.parse(response.data.categories)
                    console.log(this.categories)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
}
</script>

<style scoped>

</style>
