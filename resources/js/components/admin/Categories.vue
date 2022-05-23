<template>
    <div class=" w-full h-screen bg-slate-900  ">
        <Header class="z-50"/>
        <SideBar class="z-40"/>

        <!-- objectifiedCategories component content-->
        <div class="flex flex-col w-full h-full justify-start items-center bg-slate-900 ">
            <!-- search box-->
            <div class=" w-11/12 h-12 m-4 rounded-lg bg-slate-800">

            </div>

            <!-- display all objectifiedCategories-->
            <div
                class=" flex flex-col justify-center items-center w-11/12 h-full mb-20 rounded-lg text-zinc-800 bg-slate-800">
                <!--                <div v-for="category in objectifiedCategories" class=" w-5/6  bg-amber-400">-->
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
            objectifiedCategories: []
        }
    },
    mounted() {
        console.log('Categories.vue mounted > ---------')
        this.retrieveAllCategories()
    },
    methods: {
        retrieveAllCategories() {
            axios.get('/admin-api/categories')
                .then(response => {
                    console.log('retrieveAllCategories >')
                    console.log(response.data.categories)
                    this.objectifyCategoryArray(response.data.categories)
                })
                .catch(error => {
                    console.log('error >')
                    console.log(error)
                })
        },
        objectifyCategoryArray(categoryArray) {
            console.log('castCategoriesToObject >')
            categoryArray.forEach((category, index) => {
                if (this.itIsRootCategory(category)) {
                    this.objectifiedCategories[index] = category
                    categoryArray = this.removeElementFromArray(index , categoryArray)
                }
            })
            console.log(this.objectifiedCategories)
            console.log(categoryArray)
        },
        itIsRootCategory(category) {
            return category.parent_id === null
        },
        removeElementFromArray(index , categoryArray ) {
            delete categoryArray[index]
            return categoryArray.filter(element => {
                return element !== undefined
            })
        },
        putCategoryIntoCategoryObject() {

        },
    },
}
</script>

<style scoped>

</style>
