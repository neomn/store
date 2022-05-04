<template>
    <div class="z-0 min-h-screen  bg-slate-800">

        <!-- header component-->
        <Header class="z-50"/>

        <div>

            <!-- new products  -->
            <div class="relative w-auto  mt-20 m-8  flex flex-col rounded-lg bg-gradient-to-b from-violet-900"
                 v-bind:class="(this.displayAllNew)?'h-auto':'h-1/2'">
                <div class="inline-flex ml-4 ">
                    <h1 class="  mt-2 mb-4 rounded-lg text-gray-200 ">
                        New Products
                    </h1>
                </div>
                <div class=" flex flex-col text-gray-200 overflow-x-hidden overflow-y-hidden">
                    <div class="flex justify-center ">
                        <div class=" m-2 grid grid-cols-7 gap-x-8 gap-y-16  ">
                            <div v-for="product in newProducts"
                                 class="  w-36 h-52  rounded-lg justify-center relative top-0 text-center bg-transparent border">

                                <!--card image-->
                                <img :src="product.image" alt="product image"
                                     class=" h-24 w-full rounded-tl-lg rounded-tr-lg">

                                <!--card body-->
                                <div class="pt-1 pl-1 ">
                                    <!--                                    {{ product.number }} <br>-->
                                    {{ product.name }} <br>
                                    {{ product.price }} <br>
                                </div>

                                <!--card buttons-->
                                <div class="w-full rounded text-center absolute bottom-0 ">
                                    <div>
                                        <button @click="addProductTOShoppingCart(product)"
                                                class=" w-full h-8 rounded-bl-lg rounded-br-lg text-zinc-800 bg-green-300 ">
                                            add to cart
                                        </button>
                                    </div>
                                    <!--                                    <div>-->
                                    <!--                                        <router-link :to="{name: 'product' , params: {product_number: product.number}}">-->
                                    <!--                                            <button class=" w-full  rounded-lg bg-yellow-300 text-zinc-800"> show-->
                                    <!--                                                details-->
                                    <!--                                            </button>-->
                                    <!--                                        </router-link>-->
                                    <!--                                    </div>-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class=" bottom-0 left-1/2  text-gray-200 text-center">
                    <button @click="toggleDisplayAllNewProducts" class="">
                        Display All
                    </button>
                </div>
            </div>

            <!-- top sells  -->
            <div class="relative w-auto m-8 mt-16 flex flex-col rounded-lg bg-gradient-to-b from-yellow-700"
                 v-bind:class="(this.displayAllTopSells)?'h-auto':'h-1/2'">
                <div class="inline-flex ml-4 ">
                    <h1 class="  mt-2 mb-4 rounded-lg text-gray-200 ">
                        Top Sells
                    </h1>
                </div>
                <div class=" flex flex-col text-gray-200 overflow-x-hidden overflow-y-hidden">
                    <div class="flex justify-center ">
                        <div class=" m-2 grid grid-cols-7 gap-x-8 gap-y-16 ">
                            <div v-for="product in topSells"
                                 class=" w-36 h-52  rounded-lg justify-center relative top-0 text-center bg-transparent border ">

                                <!--card image-->
                                <img :src="product.image" alt="product image"
                                     class=" h-24 w-full rounded-tl-lg rounded-tr-lg">

                                <!--card body-->
                                <div class="pt-1 pl-1">
                                    <!--                                    {{ product.number }} <br>-->
                                    {{ product.name }} <br>
                                    {{ product.price }} <br>
                                </div>

                                <!--card buttons-->
                                <div class="w-full rounded text-center absolute bottom-0 ">
                                    <div>
                                        <button @click="addProductTOShoppingCart(product)"
                                                class=" w-full rounded-bl-lg rounded-br-lg bg-lime-500 text-zinc-800">
                                            add to cart
                                        </button>
                                    </div>
                                    <!--                                    <div>-->
                                    <!--                                        <router-link :to="{name: 'product' , params: {product_number: product.number}}">-->
                                    <!--                                            <button class=" w-full  rounded-lg bg-yellow-300 text-zinc-800"> show-->
                                    <!--                                                details-->
                                    <!--                                            </button>-->
                                    <!--                                        </router-link>-->
                                    <!--                                    </div>-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class=" bottom-0 left-1/2  text-gray-200 text-center">
                    <button @click="toggleDisplayTopSells" class="">
                        Display All
                    </button>
                </div>
            </div>

            <!-- favorite products  -->
            <div class="relative w-auto  mt-16 m-8 mb-36 flex flex-col rounded-lg bg-gradient-to-b from-blue-900"
                 v-bind:class="(this.displayAllFavorite)?'h-auto':'h-1/2'">
                <div class="inline-flex ml-4 ">
                    <h1 class="  mt-2 mb-4 rounded-lg text-gray-200 ">
                        Favorite Products
                    </h1>
                </div>
                <div class=" flex flex-col text-gray-200 overflow-x-hidden overflow-y-hidden">
                    <div class="flex justify-center ">
                        <div class=" m-2 grid grid-cols-7 gap-x-8 gap-y-16 ">
                            <div v-for="product in favoriteProducts"
                                 class="  w-36 h-52  rounded-lg justify-center relative top-0 text-center bg-transparent border">

                                <!--card image-->
                                <img :src="product.image" alt="product image"
                                     class=" h-24 w-full rounded-tl-lg rounded-tr-lg">

                                <!--card body-->
                                <div class="pt-1 pl-1">
                                    <!--                                    {{ product.number }} <br>-->
                                    {{ product.name }} <br>
                                    {{ product.price }} <br>
                                </div>

                                <!--card buttons-->
                                <div class="w-full rounded text-center absolute bottom-0 ">
                                    <div>
                                        <button @click="addProductTOShoppingCart(product)"
                                                class=" w-full rounded-bl-lg rounded-br-lg bg-lime-500 text-zinc-800">
                                            add to cart
                                        </button>
                                    </div>
                                    <!--                                    <div>-->
                                    <!--                                        <router-link :to="{name: 'product' , params: {product_number: product.number}}">-->
                                    <!--                                            <button class=" w-full  rounded-lg bg-yellow-300 text-zinc-800"> show-->
                                    <!--                                                details-->
                                    <!--                                            </button>-->
                                    <!--                                        </router-link>-->
                                    <!--                                    </div>-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class=" bottom-0 left-1/2  text-gray-200 text-center">
                    <button @click="toggleDisplayAllFavoriteProducts" class="">
                        Display All
                    </button>
                </div>
            </div>

        </div>

        <!-- footer component-->
        <Footer/>

    </div>
</template>

<!----------------------------------------------------------------------------->

<script>
import Header from './Header.vue';
import Footer from './Footer';
import {isEmpty} from "lodash";

export default {
    name: 'web',
    components: {
        Header,
        Footer,
    },
    props: [],
    data() {
        return {
            categories: [],
            favoriteProducts: [],
            newProducts: [],
            topSells: [],
            displayAllNew: false,
            displayAllTopSells: false,
            displayAllFavorite: false,
        }
    },
    mounted() {
        this.initData()
    },
    methods: {
        initData: function () {
            axios.get('api/welcome')
                .then((response) => {
                    this.favoriteProducts = response.data.favoriteProducts;
                    this.newProducts = response.data.newProducts;
                    this.topSells = response.data.topSells;
                    console.log('favorite >>> ');
                    console.log(this.favoriteProducts);
                    console.log('new products >>>');
                    console.log(this.newProducts);
                    console.log('top Sells >>> ');
                    console.log(this.topSells);
                })
                .catch(function (error) {
                    console.log('error while catching data >>> ' + error);
                });
        },
        addProductTOShoppingCart(product) {
            console.log('\n')
            console.log('------------------------------ \n')
            console.log('adding product to shopping cart \n')
            if (this.checkIfLoggedIn()) {

            } else if (this.productAlreadyExistInShoppingCart(product)) {
                this.incrementProductCount(product)
            } else {
                product.count = 1
                console.log('saving product in local storage')
                let suffix = localStorage.length + 1
                localStorage.setItem('product.' + suffix, JSON.stringify(product))
            }

        },
        productAlreadyExistInShoppingCart(product) {
            if (localStorage.length > 0)
                for (let i = 0; i < localStorage.length; i++)
                    if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                        console.log('product already exist in local storage \n')
                        return true
                    }
            console.log('product doesnt exist in local storage \n ')
            return false
        },
        incrementProductCount(product) {
            for (let i = 0; i < localStorage.length; i++)
                if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                    console.log('incrementing product count by one  \n')
                    product = JSON.parse(localStorage.getItem(localStorage.key(i)))
                    product.count++
                    localStorage.setItem(localStorage.key(i), JSON.stringify(product))
                }
        },
        checkIfLoggedIn() {
            console.log('\n')
            console.log('-------------------------------')
            console.log('checkIfLoggedIn > \n')
            console.log(!isEmpty(localStorage.getItem('user.firstName')))
            return !isEmpty(localStorage.getItem('user.firstName'))
        },
        toggleDisplayAllNewProducts() {
            this.displayAllNew = !this.displayAllNew
            this.displayAllTopSells = false
            this.displayAllFavorite = false
        },
        toggleDisplayTopSells() {
            this.displayAllTopSells = !this.displayAllTopSells
            this.displayAllNew = false
            this.displayAllFavorite = false
        },
        toggleDisplayAllFavoriteProducts() {
            this.displayAllFavorite = !this.displayAllFavorite
            this.displayAllNew = false
            this.displayAllTopSells = false
        },
    }

}
</script>

<!------------------------------------------------------------------------------>

<style>


</style>
