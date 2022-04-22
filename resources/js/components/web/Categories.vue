<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">
            {{ category }}
        </aside>

        <!--display category container contents-->
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

        <!-- display category products  -->
        <div>

        </div>

    </div>
</template>

<!---------------------------------------------------------------------->


<script>
import {isEmpty} from "lodash/lang";
import Header from "./Header";

export default {
    name: "Categories",
    components: {
        Header
    },
    data() {
        return {
            allCategories: {},
            categoryContainer: {},
        }
    },
    props: [
        'category',
    ],
    mounted() {
        this.getAllCategories()

        //watch route parameters changes
        this.$watch(
            () => this.$route.params, (newParams, previousParams) => {
                console.log('\n')
                console.log('-------------------------------\n')
                console.log('this.$route.params watcher > \n')
                console.log('new params >> ' + newParams.category + '\n')
                console.log('previous params >> ' + previousParams.category + '\n')
                if (newParams.category) {
                    this.refreshCategoryContainer(newParams.category)
                    // this.getAllCategories()
                }
                // reload page if route is /categories
                // this is because category container wasn't refreshing in that route when pressing back button
                else if (!newParams.category) {
                    window.location.reload()
                }
            }
        )

        //watch for categories with no sub category
        this.$watch(
            ()=>this.categoryHasSubCategory() , (newParams , previousParams) =>{
                console.log('\n')
                console.log('-------------------------------\n')
                console.log('categoryHasSubCategory watcher > \n')
                console.log(newParams)
                if (newParams === false) {
                    console.log('request for category products for > ' + this.category)
                }
            }
        )

    }

    ,
    methods: {

        getAllCategories() {
            console.log('\n')
            console.log('-----------------------------\n')
            console.log('getAllCategories > \n')
            axios.get('/api/categories')
                .then(response => {
                    this.allCategories = response.data.data
                    console.log(response.data.data)
                    this.initCategoryContainer()
                    this.refreshCategoryContainer(this.category)
                })
                .catch(function (error) {
                    console.log('error getting categories > ' + error)
                })
        },


        initCategoryContainer() {
            console.log('\n')
            console.log('-------------------------------\n')
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
            console.log('\n')
            console.log('-------------------------------\n')
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
        },

        categoryHasSubCategory() {
            console.log('\n')
            console.log('-------------------------------\n')
            console.log('categoryHasSubCategory > \n')
            console.log(!isEmpty(this.categoryContainer))
            return !isEmpty(this.categoryContainer)
        },


        getCategoryAssociatedProducts() {

        },
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
