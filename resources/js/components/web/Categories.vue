<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">
            {{ category }}
        </aside>

        <div class="min-h-screen grid grid-cols-5  block bg-slate-700 pr-4 ">
            <div v-for="category in categoryContainer"
                 class="bg-slate-800 w-44 h-60 m-8 rounded-lg justify-center relative">
                <router-link :to="{name: 'categories' , params: {category: category.category}}">
                    <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">
                        {{ category.category }}
                    </div>
                </router-link>
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

            // pageReload: false,
            allCategories: {},
            categoryContainer: {},
        }
    },
    props: [
        'category',
    ],
    mounted() {
        this.getAllCategories()
        // this.refreshContainerOnPageRefresh()

        // route parameter watcher ,
        // this will refresh container if new parameter received from vue router , but not from page refresh
        this.$watch(
            () => this.$route.params,
            (newParams, previousParams) => {
                if (newParams.category) {
                    console.log('parameter watcher >> ' + newParams.category)
                    this.refreshCategoryContainer(newParams.category)
                }
            }
        )

        // route query watcher
        // this will refresh container if new parameter queried by vue router , but not from page refresh
        // this.$watch(
        //     () => this.$route.query,
        //     (newParams, previousParams) => {
        //         if (newParams.category) {
        //             console.log('query watcher >>' + newParams.category)
        //             this.refreshCategoryContainer(newParams.category)
        //         }
        //     }
        // )

        //watch if pageReload was true , reload the page once
        // this.$watch(
        //     () => this.pageReload,
        //     (newParams, previousParams) => {
        //         if (newParams === true) {
        //             this.pageReload = false
        //             this.reloadPage()
        //         }
        //     }
        // )
    },
    methods: {

        refreshContainerOnPageRefresh() {
            this.getAllCategories()
            if (this.$route.query.category) {
                this.refreshCategoryContainer(this.$route.query.category)
            } else if (this.$route.path === '/allCategories') {
                // this.reloadPage()
            } else {
                console.log('invalid route')
                this.$router.push({name: '404'})
            }
        },


        getAllCategories() {
            console.log('\n')
            console.log('----------------------------------\n')
            console.log('getAllCategories > \n')
            axios.get('/api/allCategories')
                .then(response => {
                    this.allCategories = response.data
                    console.log(response.data)
                    this.initCategoryContainer()
                    this.refreshCategoryContainer(this.category)
                })
                .catch(function (error) {
                    console.log('error getting categories > ' + error)
                })
        },


        initCategoryContainer() {
            console.log('\n')
            console.log('----------------------------------\n')
            console.log('initCategoryContainer > \n')
            this.allCategories.forEach((item, index, array) => {
                if (item.parent_id === null) {
                    //this is how to update vue js state ,check vue js docs ( reactivity )
                    this.$set(this.categoryContainer, index, item)
                }
            })
            console.log(this.categoryContainer)
        },


        refreshCategoryContainer(queriedCategory) {
            console.log('----------------------------------\n')
            console.log('refreshCategoryContainer > \n')
            if (queriedCategory) {
                console.log('\n')
                console.log('received category to process > ' + queriedCategory + '\n')
                let preserveContainerContent = this.categoryContainer
                let categoryIsNotValid = true
                this.categoryContainer = {}
                if (this.allCategories) {
                    //find queried category id
                    let queriedCategoryId
                    this.allCategories.forEach((item, index) => {
                        if (item.category === queriedCategory) {
                            queriedCategoryId = item.id
                            console.log('category id for ***  ' + queriedCategory + '  *** is ' + queriedCategoryId + ' \n')
                        }
                    })
                    //set container to contain childes of queried category
                    this.allCategories.forEach((item, index) => {
                        if (item.parent_id === queriedCategoryId) {
                            //this is how to update vue js state ,check vue js docs ( reactivity )
                            this.$set(this.categoryContainer, index, item)
                            console.log('category founded :) adding ' + item.category + ' to container')
                            categoryIsNotValid = false
                        }
                    })
                } else {
                    console.log('allCategories not initialized by api \n')
                }
                if (categoryIsNotValid) {
                    console.log('queried category (' + queriedCategory + ') is not a valid category')
                    // this.categoryContainer = preserveContainerContent
                }
            } else {
                console.log('no category queried')
            }
        }
        ,

        getCategoryAssociatedProducts() {

        }
        ,
        reloadPage() {
            window.location.reload();
        }
        ,
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
