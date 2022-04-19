<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <div class="grid grid-cols-5 block bg-slate-700 ">
            <div v-for="category in categories" class="bg-slate-800 w-40 h-60 m-8 rounded-lg justify-center">
                <div class="text-center">
                    <router-link to="#" >{{ category.category }}</router-link>
                </div>
            </div>
        </div>


        <!--        <div class="grid-cols-4 gap-4 h-44 m-4 bg-slate-600 flex">-->
        <!--            <div class="bg-slate-900 w-10 m-4">div1</div>-->
        <!--            <div class="bg-slate-900 w-10 m-4">div2</div>-->
        <!--        </div>-->

    </div>
</template>

<!---------------------------------------------------------------------->


<script>
import Header from "./Header";

export default {
    name: "Categories",
    components: {
        Header
    },
    data() {
        return {
            categories: {},
        }
    },
    mounted() {
        this.getCategories()
    },
    methods: {
        getCategories() {
            axios.get('api/categories')
                .then(response => {
                    console.log(response.data)
                    this.categories = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
