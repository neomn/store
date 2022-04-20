<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">

        </aside>

        <div class="min-h-screen grid grid-cols-5  block bg-slate-700 pr-4 ">
            <div v-for="category in categoryContainer"
                 class="bg-slate-800 w-44 h-60 m-8 rounded-lg justify-center relative">
                <router-link :to="{name: 'categories' , query: {category: category.category}}">
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
            categories: {},
            categoryContainer: {},
        }
    },
    mounted() {
        this.checkForValidCategory()

        // route parameter watcher
        this.$watch(
            () => this.$route.params,
            (newParams, previousParams) => {
                console.log('parameter watcher >> ' + newParams.category)
                // this.refreshCategoryContainer()
            }
        )

        // route query watcher
        this.$watch(
            () => this.$route.query,
            (newParams, previousParams) => {
                console.log('query watcher >>' + newParams.category)
                // this.refreshCategoryContainer()
            }
        )
    },
    methods: {

        checkForValidCategory(){
            if (this.intendedCategoryInUrl(this.$route.params.category)){

            }
            else if (this.queriedCategoryInUrl(this.$route.query.category)){

            }
            else if (this.$route.path === '/categories'){
                this.getAllCategories()
            }
            else {
                console.log('invalid route')
                this.$router.push({name:'404'})
            }
        },

        intendedCategoryInUrl(category){
            if (category) {
                console.log('\n\n -------------------------------------------------------')
                console.log('intendedCategoryInUrl >>> ' + category)
                return true
            }
            else {
                console.log('no category intended')
                return false
            }
        },

        queriedCategoryInUrl(category){
            if (category) {
                console.log('\n\n -------------------------------------------------------')
                console.log('queriedCategoryInUrl >>> ' + category)
                return true
            }
            else {
                console.log('no category queried')
                return false
            }
        },

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
            console.log(' initCategoryContainer > Category container initialized with root categories >>> ')
            console.log(this.categoryContainer)
        },

        refreshCategoryContainer( queriedCategory) {
            console.log('refreshCategoryContainer >')
            let preserveContainerState = this.categoryContainer
            let categoryIsNotValid = true
            this.categoryContainer = {}

            //find queried category id
            let queriedCategoryId
            this.categories.forEach((item, index) => {
                if (item[index].category === queriedCategory) {
                    queriedCategoryId = item[index].id
                }
            })

            //set container to contain childes of queried category
            this.categories.forEach((item, index) => {
                if (item.parent_id === queriedCategoryId) {
                    //this is how to update vue js state ,check vue js docs ( reactivity )
                    this.$set(this.categoryContainer, index, item)
                    console.log('category founded :) adding ' + item.category + ' to container')
                    categoryIsNotValid = false
                }
            })

            if (categoryIsNotValid) {
                console.log('queried category (' + this.queriedCategory + ') is not a valid category')
                this.categoryContainer = preserveContainerState
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
