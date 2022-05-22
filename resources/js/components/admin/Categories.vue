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
            <div
                class=" flex flex-col justify-center items-center w-11/12 h-full mb-20 rounded-lg text-zinc-800 bg-slate-800">
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
        console.log('Categories.vue mounted > ---------')
        this.retrieveAllCategories()
    },
    methods: {
        retrieveAllCategories() {
            axios.get('/admin-api/categories')
                .then(response => {
                    console.log('retrieveAllCategories >')
                    console.log(response.data.categories)
                    this.castCategoriesToObject(response.data.categories)
                })
                .catch(error => {
                    console.log('error >')
                    console.log(error)
                })
        },
        castCategoriesToObject(categoryArray) {
            console.log('castCategoriesToObject >')

            // while (Object.keys(categoryArray).length > 0 ){
                categoryArray.forEach((category, index) => {
                    if ( this.itIsRootCategory(category)){
                        this.categories[index] = category
                        categoryArray =  this.removeFirstElement(categoryArray)
                    }
                    else if (Object.keys(this.categories).length > 0){

                    }
                })
            // }

            console.log(this.categories)
            console.log(categoryArray)
            // console.log(Object.keys(this.categories).length)
        },
        itIsRootCategory(category){
            return category.parent_id === null
        },
        removeFirstElement(categoryArray){
            delete categoryArray[0]
            categoryArray = categoryArray.filter(element => {
                return element !== undefined
            })
            return categoryArray
        },

    },
}
</script>

<style scoped>

</style>
