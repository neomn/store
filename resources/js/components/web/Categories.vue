<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">

        </aside>

        <div class="min-h-screen grid grid-cols-5  block bg-slate-700 pr-4 ">
            <div v-for="category in categoryContainer "
                 class="bg-slate-800 w-44 h-60 m-8 rounded-lg justify-center relative">
                <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">
                    {{ category.category }}
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
            categoryContainer: {},
        }
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('api/categories')
                .then(response => {
                    console.log('received categories from api >>>')
                    console.log(response.data)
                    this.categories = response.data
                    this.initCategoryContainer()
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        initCategoryContainer() {
            for (let key in this.categories) {
                if (this.categories[key] == null) {
                    this.categoryContainer = this.categories[key]
                }
            }
            console.log('category container >>> ')
            console.log(this.categoryContainer)
        },
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
