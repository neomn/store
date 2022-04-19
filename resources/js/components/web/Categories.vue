<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">

        </aside>

            <div class="grid grid-cols-5  block bg-slate-700 pr-4 ">
                <div v-for="category in categories"
                     class="bg-slate-800 w-40 h-60 m-8 rounded-lg justify-center relative">
                    <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">
                        <router-link to="#">{{ category.category }}</router-link>
                    </div>
                </div>
            </div>

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
