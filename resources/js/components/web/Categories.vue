<template>
    <div>
        <Background/>
        <Header/>
        <Sidebar/>
        <Breadcrumb/>
        <CategoriesContainer/>
    </div>
    <!--    <div class="z-0 mt-8 bg-slate-800 min-h-screen text-gray-200">-->

    <!--        <Header class="z-10"/>-->

    <!--        <aside class="bg-gray-800 border-r border-gray-200 float-left w-52 min-h-screen ">-->
    <!--            {{ category }}-->
    <!--        </aside>-->


    <!--        <div class="min-h-screen grid grid-cols-5  block bg-slate-700 pr-4 ">-->

    <!--            &lt;!&ndash;display category container contents&ndash;&gt;-->
    <!--            <div v-for="category in categoryContainer"-->
    <!--                 class="bg-slate-800 w-44 h-60 m-8 rounded-lg justify-center relative">-->
    <!--                <router-link :to="{name: 'categories' , params: {category: category.category}}">-->
    <!--                    <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">-->
    <!--                        {{ category.category }}-->
    <!--                    </div>-->
    <!--                </router-link>-->
    <!--            </div>-->


    <!--            &lt;!&ndash; display product container contents  &ndash;&gt;-->
    <!--            <div v-for="product in productContainer"-->
    <!--                 class="bg-slate-800 w-44 h-72 m-8 rounded-lg justify-center relative top-0">-->
    <!--                <img :src="product.image" alt="product image" class="rounded-lg">-->
    <!--                <div class="pt-4 pl-4">-->
    <!--                    {{ product.number }} <br>-->
    <!--                    {{ product.name }} <br>-->
    <!--                    {{ product.price }} <br>-->
    <!--                </div>-->
    <!--                <router-link :to="{name: 'product' , params: {product_number: product.number}}">-->
    <!--                    <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">-->
    <!--                        <button> show details</button>-->
    <!--                    </div>-->
    <!--                </router-link>-->
    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->
</template>

<!---------------------------------------------------------------------->


<script>
import {isEmpty} from "lodash/lang";
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


<!---------------------------------------------------------------------->

<style scoped>

</style>
