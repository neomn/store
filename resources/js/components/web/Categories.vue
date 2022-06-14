<template>
    <div>
<!--        <Background/>-->
        <Header/>
        <Sidebar/>
        <Breadcrumb/>
        <CategoriesContainer/>
    </div>
</template>

<!---------------------------------------------------------------------->

<script>
import Header from "./Header";
import Background from "./Background";
import Sidebar from "./SideBar";
import Breadcrumb from "./miniComponenets/Breadcrumb";
import CategoriesContainer from "./miniComponenets/CategoriesContainer";

export default {
    name: "Categories",
    components: {
        Breadcrumb,
        Background,
        Header,
        Sidebar,
        CategoriesContainer
    },
    props: [
        'category',
    ],
    created() {
        console.log('Categories component created > -------------------- \n')

    },
    mounted() {

        //watch route parameters changes
        // this.$watch(
        //     () => this.$route.params, (newParams, previousParams) => {
        //         console.log('this.$route.params watcher > ------ \n')
        //         this.emptyProductsContainer()
        //         console.log('product container is now empty \n')
        //         console.log('new params >> ' + newParams.category + '\n')
        //         console.log('previous params >> ' + previousParams.category + '\n')
        //         if (newParams.category)
        //             this.refreshCategoryContainer(newParams.category)
        //
        //             // reload page if route is /categories
        //         // this is because category container wasn't refreshing in that route when pressing back button
        //         else if (!newParams.category) {
        //             window.location.reload()
        //         }
        //     }
        // )

        // //watch for categories with no sub category
        // this.$watch(
        //     () => this.categoryHasSubCategory(), (newParams, previousParams) => {
        //         console.log('categoryHasSubCategory watcher > -------- \n')
        //         console.log(newParams)
        //         if (newParams === false) {
        //             console.log('requesting for category productContainer')
        //             this.getCategoryAssociatedProducts()
        //         }
        //     }
        // )
    },
    methods: {

    }
}
</script>
