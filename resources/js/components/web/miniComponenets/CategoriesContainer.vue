<template>
    <div class=" z-20 absolute top-20 w-full h-full text-zinc-200 overflow-y-scroll">
        <div class="grid grid-cols-1 gap-4 place-items-center">
            <div v-for="category in categoryContainer" class="w-11/12 h-40 border rounded ">
                <div class="flex w-full h-full justify-center">
                    <div class="w-3/5 h-full ">
                        <router-link :to="{name: 'categories' , params:{ category: category.category}}">
                            <div class="relative w-full h-full flex justify-center items-center  ">
                                <img :src="category.imageUrl" alt="category image"
                                     class=" w-full h-full object-fill filter blur-sm">
                                <div class="absolute flex items-center text-2xl font-bold  ">
                                    <button>{{ category.category }}</button>
                                </div>
                            </div>
                        </router-link>
                    </div>
<!--                    <div class="w-2/5 h-full flex flex-col justify-start">-->
<!--                        <div v-for="sub in category.sub" class="w-full h-auto overflow-y-scroll p-2 border-b">-->
<!--                            <router-link :to="{name:'categories' , params: {category: sub.category}}">-->
<!--                                <button>{{ sub.category }}</button>-->
<!--                            </router-link>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {isEmpty} from "lodash/lang";

export default {
    name: "Categories",
    data() {
        return {
            allCategories: {},
            categoryContainer: {},
            productContainer: {},
            objectifiedCategories: []
        }
    },
    mounted() {
        this.getAllCategories(this.objectifiedCategories)
        this.refreshCategoryContainer(this.$route.params.category)

        this.$watch(() => this.$route.params.category, (newValue, oldValue) => {
            // console.log('route parameter watcher > ')
            this.refreshCategoryContainer(newValue, this.objectifiedCategories)
        })
    },
    methods: {
        getAllCategories(objectifiedCategories) {
            axios.get('/api/categories')
                .then(response => {
                    console.log('getAllCategories >-------- \n')
                    this.allCategories = response.data.data
                    console.log(response.data.data)
                    // this.initCategoryContainer()
                    // this.refreshCategoryContainer(this.category)
                    if (isEmpty(this.categoryContainer)) {
                        // this.getCategoryAssociatedProducts()
                    }
                    this.objectifyCategoryArray(response.data.data)
                    this.$root.$emit('bredCrumb', objectifiedCategories)
                    this.initCategoryContainer()
                })
                .catch(function (error) {
                    console.log('error getting categories > ' + error)
                })
        },
        initCategoryContainer() {
            // console.log('initCategoryContainer > ------ \n')
            // this.allCategories.forEach((item, index, array) => {
            //     if (item.parent_id === null) {
            //         //this is how to update vue js state ,check vue js docs ( reactivity )
            //         this.$set(this.categoryContainer, index, item)
            //     }
            // })
            // console.log(this.categoryContainer)
            this.categoryContainer = this.objectifiedCategories
        },
        refreshCategoryContainer(category, allCategories) {
            console.log( 'category >' + category)
            if (allCategories === undefined || category === undefined)
                return

            allCategories.forEach((item, index) => {

                console.log('comparing' + category + 'with ' + item.category )

                if (item.category === category){
                    this.categoryContainer = item
                    console.log('send to category container >')
                    console.log(this.categoryContainer)
                    return
                }
                else if (item.sub !== undefined)
                    this.refreshCategoryContainer(category , item.sub)
            })

            //     console.log('refreshCategoryContainer > ------')
            //     if (queriedCategory) {
            //         console.log('received category to process > ' + queriedCategory + '\n')
            //         let preserveContainerContent = this.categoryContainer
            //         let categoryIsNotValid = true
            //         this.categoryContainer = {}
            //         if (this.allCategories) {
            //             //find queried category id
            //             let queriedCategoryId
            //             this.allCategories.forEach((item, index) => {
            //                 if (item.category === queriedCategory) {
            //                     queriedCategoryId = item.id
            //                     console.log('category id for ***  ' + queriedCategory + '  *** is ' + queriedCategoryId + ' \n')
            //                 }
            //             })
            //             //set container to contain childes of queried category
            //             this.allCategories.forEach((item, index) => {
            //                 if (item.parent_id === queriedCategoryId) {
            //                     //this is how to update vue js state ,check vue js docs ( reactivity )
            //                     this.$set(this.categoryContainer, index, item)
            //                     console.log('category founded :) adding ' + item.category + ' to container')
            //                     categoryIsNotValid = false
            //                 }
            //             })
            //         } else {
            //             console.log('allCategories not initialized by api \n')
            //         }
            //         if (categoryIsNotValid) {
            //             console.log('queried category (' + queriedCategory + ') is not a valid category')
            //             // this.categoryContainer = preserveContainerContent
            //         }
            //     } else {
            //         console.log('no category queried')
            //     }
        },
        // categoryHasSubCategory() {
        //     console.log('categoryHasSubCategory > ------ \n')
        //     console.log(!isEmpty(this.categoryContainer))
        //     return !isEmpty(this.categoryContainer)
        // },
        // getCategoryAssociatedProducts() {
        //     console.log('getCategoryAssociatedProducts > ------ \n')
        //     console.log(this.$route.params.category + '\n')
        //     let category = this.$route.params.category
        //
        //     //get category categoryId
        //     let categoryId;
        //     this.allCategories.forEach((item, index) => {
        //         if (item.category === category)
        //             categoryId = item.id
        //     })
        //     console.log('category categoryId >>> ' + categoryId + '\n')
        //
        //     //request for productContainer
        //     axios.get('/api/productContainer/' + categoryId)
        //         .then(response => {
        //             let products = response.data.data
        //             console.log('retrieved productContainer  >>> \n')
        //             console.log(response.data.product)
        //             this.productContainer = response.data.product
        //         })
        //         .catch(function (error) {
        //             console.log(error)
        //         })
        // },
        // emptyProductsContainer() {
        //     this.productContainer = {}
        // },


        objectifyCategoryArray(categoryArray) {
            console.log('objectifyCategoryArray >')
            //assign an empty subCategory array to all elements
            categoryArray.forEach((item, index) => {
                item.sub = []
            })
            //objectify root elements
            categoryArray.forEach((category, index) => {
                if (this.itIsRootCategory(category)) {
                    this.objectifiedCategories.push(category)
                    categoryArray = this.removeElementFromArray(category, categoryArray)
                }
            })
            console.log('root categories objectified')
            console.log(this.objectifiedCategories)
            console.log(categoryArray)
            //objectify remaining elements
            while (categoryArray.length > 0) {
                console.log('categoryArrayLength > ' + categoryArray.length)
                console.log(categoryArray)
                categoryArray.forEach((category, index) => {
                    this.putCategoryIntoCategoryObject(category, this.objectifiedCategories)
                    categoryArray = this.removeElementFromArray(category, categoryArray)
                })
            }
            console.log('all categories objectified')
            console.log(this.objectifiedCategories)
            console.log(categoryArray)
            console.log('------------------------------')
        },
        itIsRootCategory(category) {
            return category.parent_id === null
        },
        removeElementFromArray(category, categoryArray) {
            console.log('removing ' + category.category)
            return categoryArray.filter(element => {
                return element !== category
            })
        },
        putCategoryIntoCategoryObject(category, categoryObject) {
            console.log('putting ' + category.category + ' into categoryObject')
            console.log(categoryObject)
            let objectified = false
            categoryObject.forEach((item, index) => {
                if (category.parent_id === item.id) {
                    console.log('parent founded')
                    console.log(item.category + ' < ' + category.category)
                    item.sub.push(category)
                    objectified = true
                }
            })
            if (!objectified) {
                console.log('parent not found ')
                categoryObject.forEach((item, index) => {
                    this.putCategoryIntoCategoryObject(category, item.sub)
                })
            }
        },
    }
}
</script>

<style scoped>

</style>
