<template>
    <div class="z-0 min-h-screen bg-zinc-900">

        <!-- header component-->
        <Header class="z-50"/>

        <div class="overflow-hidden hidden">
            <!-- new products Container  -->
            <div class=" my-8 mx-4  p-1 rounded-lg bg-amber-400">
                <div class=" relative flex flex-col  rounded-lg bg-slate-900 "
                     v-bind:class="(this.displayAllNew)?'h-auto':'h-2/5'">
                    <div class="inline-flex ml-4 ">
                        <h1 class="  mt-2 mb-2 rounded-lg text-zinc-100 ">
                            New Products
                        </h1>
                    </div>
                    <div class=" flex flex-col text-gray-200 overflow-x-scroll overflow-y-scroll">
                        <div class="flex justify-center ">
                            <div
                                class=" m-2 grid grid-cols-2 gap-x-2 gap-y-4
                            sm:grid-cols-4
                            md:grid-cols-5
                            lg:grid-cols-6
                            xl:grid-cols-7
                            2xl:grid-cols-8 ">
                                <div v-for="product in newProducts"
                                     class="  w-36 h-52  rounded-lg justify-center relative top-0 text-center bg-slate-700">
                                    <router-link :to="{name: 'product' , params:{product_number: product.number}}">
                                        <!--card image-->
                                        <img :src="product.image" alt="product image"
                                             class=" h-24 w-full rounded-tl-lg rounded-tr-lg">
                                        <!--card body-->
                                        <div class="pt-1 pl-1 ">
                                            {{ product.name }} <br>
                                            {{ product.price }}  <br>
                                        </div>
                                    </router-link>
                                    <!--card buttons-->
                                    <div class="w-full rounded text-center absolute bottom-0 ">
                                        <div>
                                            <button @click="addProductTOShoppingCart(product)"
                                                    class=" w-full h-8 rounded-bl-lg rounded-br-lg text-zinc-300 border-t">
                                                add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" bottom-0 left-1/2  text-zinc-100 text-center">
                        <button @click="toggleDisplayAllNewProducts" class="">
                            Display All
                        </button>
                    </div>
                </div>
            </div>

            <!-- top sells  -->
            <div class=" my-8 mx-4 p-1 rounded-lg bg-red-600">
                <div class=" relative flex flex-col  rounded-lg bg-slate-900 "
                     v-bind:class="(this.displayAllTopSells)?'h-auto':'h-2/5'">
                    <div class="inline-flex ml-4 ">
                        <h1 class="  mt-2 mb-2 rounded-lg text-zinc-100 ">
                            Top Sells
                        </h1>
                    </div>
                    <div class=" flex flex-col text-gray-200 overflow-x-hidden overflow-y-scroll">
                        <div class="flex justify-center ">
                            <div
                                class=" m-2 grid grid-cols-2 gap-x-2 gap-y-4
                            sm:grid-cols-4
                            md:grid-cols-5
                            lg:grid-cols-6
                            xl:grid-cols-7
                            2xl:grid-cols-8 ">
                                <div v-for="product in topSells"
                                     class="  w-36 h-52  rounded-lg justify-center relative top-0 text-center bg-slate-700">
                                    <router-link :to="{name: 'product' , params:{product_number: product.number}}">
                                        <!--card image-->
                                        <img :src="product.image" alt="product image"
                                             class=" h-24 w-full rounded-tl-lg rounded-tr-lg">
                                        <!--card body-->
                                        <div class="pt-1 pl-1 ">
                                            {{ product.name }} <br>
                                            {{ product.price }} <br>
                                        </div>
                                    </router-link>
                                    <!--card buttons-->
                                    <div class="w-full rounded text-center absolute bottom-0 ">
                                        <div>
                                            <button @click="addProductTOShoppingCart(product)"
                                                    class=" w-full h-8 rounded-bl-lg rounded-br-lg text-zinc-300 border-t">
                                                add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" bottom-0 left-1/2  text-zinc-100 text-center">
                        <button @click="toggleDisplayTopSells" class="">
                            Display All
                        </button>
                    </div>
                </div>
            </div>

            <!-- favorite productContainer  -->
            <div class=" my-8 mb-16  mx-4 p-1  rounded-lg bg-lime-300">
                <div class=" relative flex flex-col  rounded-lg bg-slate-900 "
                     v-bind:class="(this.displayAllFavorite)?'h-auto':'h-2/5'">
                    <div class="inline-flex ml-4 ">
                        <h1 class="  mt-2 mb-2 rounded-lg text-zinc-100 ">
                            Favorite Products
                        </h1>
                    </div>
                    <div class=" flex flex-col text-gray-200 overflow-x-hidden overflow-y-scroll">
                        <div class="flex justify-center ">
                            <div
                                class=" m-2 grid grid-cols-2 gap-x-2 gap-y-4
                            sm:grid-cols-4
                            md:grid-cols-5
                            lg:grid-cols-6
                            xl:grid-cols-7
                            2xl:grid-cols-8 ">
                                <div v-for="product in favoriteProducts"
                                     class="  w-36 h-52  rounded-lg justify-center relative top-0 text-center bg-slate-700">
                                    <router-link :to="{name: 'product' , params:{product_number: product.number}}">
                                        <!--card image-->
                                        <img :src="product.image" alt="product image"
                                             class=" h-24 w-full rounded-tl-lg rounded-tr-lg">
                                        <!--card body-->
                                        <div class="pt-1 pl-1 ">
                                            {{ product.name }} <br>
                                            {{ product.price }} <br>
                                        </div>
                                    </router-link>
                                    <!--card buttons-->
                                    <div class="w-full rounded text-center absolute bottom-0 ">
                                        <div>
                                            <button @click="addProductTOShoppingCart(product)"
                                                    class=" w-full h-8 rounded-bl-lg rounded-br-lg text-zinc-300 border-t">
                                                add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" bottom-0 left-1/2  text-zinc-100 text-center">
                        <button @click="toggleDisplayAllFavoriteProducts" class="">
                            Display All
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- footer component-->
        <Footer class="hidden"/>

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
    created() {

    },
    mounted() {
        console.log('\nWelcome mounted > ------------------------ \n')
        this.initData()
    },
    methods: {
        initData: function () {
            axios.get('api/welcome')
                .then((response) => {
                    this.favoriteProducts = response.data.favoriteProducts;
                    this.newProducts = response.data.newProducts;
                    this.topSells = response.data.topSells;
                    // console.log('favorite >>> ');
                    // console.log(this.favoriteProducts);
                    // console.log('new productContainer >>>');
                    // console.log(this.newProducts);
                    // console.log('top Sells >>> ');
                    // console.log(this.topSells);
                })
                .catch(function (error) {
                    console.log('error while catching data >>> ' + error);
                });
        },
        addProductTOShoppingCart(product) {
            console.log('\n')
            console.log('addProductTOShoppingCart > ------------------------- \n')
            if (this.checkIfLoggedIn()) {

            } else if (this.productAlreadyExistInShoppingCart(product)) {
                this.incrementProductCount(product)
            } else {
                let productCountInLocalStorage = this.localStorageProductCounter()
                product.count = 1
                console.log('saving product in local storage > ')
                let suffix = this.localStorageBiggestProductSuffix(this.retrieveLocalStorageProductKeys()) + 1
                product.sort = suffix
                console.log(product)
                console.log('suffix > ' + suffix)
                localStorage.setItem('product.' + suffix, JSON.stringify(product))
            }

        },
        productAlreadyExistInShoppingCart(product) {
            console.log('productAlreadyExistInShoppingCart > ')
            if (localStorage.length > 0)
                for (let i = 0; i < localStorage.length; i++)
                    if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                        console.log(true)
                        return true
                    }
            console.log(false)
            return false
        },
        incrementProductCount(product) {
            for (let i = 0; i < localStorage.length; i++)
                if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                    console.log(' product count incremented by one \n')
                    product = JSON.parse(localStorage.getItem(localStorage.key(i)))
                    product.count++
                    localStorage.setItem(localStorage.key(i), JSON.stringify(product))
                }
        },
        checkIfLoggedIn() {
            console.log('isAuthenticated > ')
            console.log(localStorage.getItem('loggedInUser') !== null)
            return localStorage.getItem('loggedInUser') !== null
        },
        localStorageProductCounter() {
            //returns the count of stored productContainer in local storage
            console.log('localStorageProductCounter > ')
            let counter = 0
            for (let i = 0; i < localStorage.length; i++)
                if (localStorage.key(i).substring(0, 8) === 'product.')
                    counter++
            console.log(counter)
            return counter
        },
        localStorageBiggestProductSuffix(suffixArrayIndexes) {
            console.log('localStorageBiggestProductSuffix > ')
            suffixArrayIndexes.sort((a, b) => {
                return (a - b)
            })
            let biggest = suffixArrayIndexes[suffixArrayIndexes.length - 1]
            console.log(biggest)
            return biggest
        },
        retrieveLocalStorageProductKeys() {
            console.log('retrieve LocalStorage Product Keys > ')
            let suffixArrayIndexes = [0]
            if (localStorage.length > 0) {
                for (let i = 0; i < localStorage.length; i++)
                    if (localStorage.key(i).substring(0, 8) === 'product.')
                        suffixArrayIndexes.push(Number(localStorage.key(i).replace(/[^0-9]/g, '')))
            } else {
                console.log(suffixArrayIndexes)
                return suffixArrayIndexes
            }
            console.log(suffixArrayIndexes)
            return suffixArrayIndexes
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
        // retrieveLocalStorageProduct() {
        //     console.log('\n')
        //     console.log('retrieve LocalStorage Products > \n')
        //     let products = []
        //     if (localStorage.length > 0) {
        //         for (let i = 0; i < localStorage.length; i++) {
        //             if (localStorage.key(i).substring(0, 8) === 'product.') {
        //                 console.log('product found in local storage > \n')
        //                 products.push(JSON.parse(localStorage.getItem(localStorage.key(i))));
        //             } else {
        //                 console.log('no product found ')
        //             }
        //         }
        //         console.log(products)
        //         return products
        //     } else console.log('local storage is empty ')
        //
        // },
    }
}
</script>

<!------------------------------------------------------------------------------>

<style>


</style>
