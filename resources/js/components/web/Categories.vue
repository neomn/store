<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">

        </aside>

        <div class="min-h-screen grid grid-cols-5  block bg-slate-700 pr-4 ">
            <div v-for="category in categoryContainer"
                 class="bg-slate-800 w-44 h-60 m-8 rounded-lg justify-center relative">
                <div @click="refreshCategoryContainer (category.id)"
                     class="rounded text-center  absolute bottom-0 border-t w-full h-12">
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
            // product_number: this.$route.params.product_number,
            category: this.$route.params.category,
            categories: {},
            categoryContainer: {},
        }
    },
    mounted() {
        this.getAllCategories();
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
                if (item.parent_id == null) {

                    //this is how to update vue js state ,check vue js docs ( reactivity )
                    this.$set(this.categoryContainer, index, item)
                }
            })
            console.log('category container >>> ')
            console.log(this.categoryContainer)
        },


        refreshCategoryContainer(clickedCategoryId) {
            this.categoryContainer = {}

            this.categories.forEach((item, index) => {
                if (item.parent_id === clickedCategoryId) {

                    //this is how to update vue js state ,check vue js docs ( reactivity )
                    this.$set(this.categoryContainer, index, item)
                }
            })
        },


        getCategoryAssociatedProducts(){

        },
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
