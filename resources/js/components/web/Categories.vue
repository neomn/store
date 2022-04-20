<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">

        </aside>

        <div class="min-h-screen grid grid-cols-5  block bg-slate-700 pr-4 ">
            <div v-for="category in categoryContainer"
                 class="bg-slate-800 w-44 h-60 m-8 rounded-lg justify-center relative">
                <router-link :to="{name: 'categories' , query: {queriedCategory: category.category}}" >
                    <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">
                        {{ category.category }}
                    </div>
                </router-link>
            </div>
        </div>


        <!--        <div class="min-h-screen grid grid-cols-5  block bg-slate-700 pr-4 ">-->
        <!--            <div v-for="category in categoryContainer"-->
        <!--                 class="bg-slate-800 w-44 h-60 m-8 rounded-lg justify-center relative"-->
        <!--                @click="refreshRoute(category.category)" >-->
        <!--                <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">-->
        <!--                    {{ category.category }}-->
        <!--                </div>-->
        <!--            </div>-->
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
            queriedCategory: this.$route.query.category,
            categories: {},
            categoryContainer: {},
        }
    },
    mounted() {
        this.getAllCategories()

        this.$watch(
            () => this.$route.query,
            (newParams, previousParams) => {
                console.log('query watcher >> queried category >>>' + newParams.queriedCategory )
            }
        )
    },
    methods: {
        getAllCategories() {
            axios.get('api/categories')
                .then(response => {
                    console.log('get all categories >>>')
                    console.log(response.data)
                    this.categories = response.data
                    this.initCategoryContainer()
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        initCategoryContainer() {
            this.categories.forEach((item, index, array) => {
                if (item.parent_id === null) {

                    //this is how to update vue js state ,check vue js docs ( reactivity )
                    this.$set(this.categoryContainer, index, item)
                }
            })
            console.log('queriedCategory container >>> ')
            console.log(this.categoryContainer)
        },

        // refreshRoute(category) {
        //     this.$router.push({name: 'categories' , query: {category: category}})
        // },

        refreshCategoryContainer() {

            let categoryIsNotValid = true
            if (this.queriedCategory) {
                this.categoryContainer = {}
                this.categories.forEach((item, index) => {
                    if (item.category === this.queriedCategory) {
                        //this is how to update vue js state ,check vue js docs ( reactivity )
                        this.$set(this.categoryContainer, index, item)
                        categoryIsNotValid = false
                        console.log('category founded :)')
                        console.log('setting category container to >>>')
                        console.log(item.category)
                    }
                })
                if (categoryIsNotValid)
                    console.log('queried category (' + this.queriedCategory + ') is not a valid category')
            }
        },

        getCategoryAssociatedProducts() {

        },
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
