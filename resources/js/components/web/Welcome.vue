<template>
    <div class="z-0 min-h-screen  bg-slate-800 ">

        <!-- header component-->
        <Header class="z-50"/>

        <div class="mt-16 m-8 flex flex-col border-2 border-yellow-500 ">
            <!-- new products  -->
            <div class="mt-4 inline-flex flex justify-center">
                <h1 class="text-gray-200 bg-red-500">
                    New Products
                </h1>
            </div>
            <div class="  mt-4 flex flex-col text-gray-200 ">
                <div class="  flex justify-center ">
                    <div class=" m-2 grid grid-cols-7 gap-x-8 gap-y-8 border">
                        <div v-for="product in newProducts"
                             class=" bg-slate-700 w-36 h-64  rounded-lg justify-center relative top-0">

                            <!--card image-->
                            <img :src="product.image" alt="product image" class=" h-20  rounded-lg">

                            <!--card body-->
                            <div class="pt-1 pl-1">
                                {{ product.number }} <br>
                                {{ product.name }} <br>
                                {{ product.price }} <br>
                            </div>

                            <!--card buttons-->
                            <div class="rounded text-center  absolute bottom-0 border-t w-full h-16">
                                <div>
                                    <button @click="addProductTOShoppingCart(product)"
                                            class="m-1 px-1 rounded-lg bg-lime-300 text-zinc-800"> add to shopping cart
                                    </button>
                                </div>
                                <div>
                                    <router-link :to="{name: 'product' , params: {product_number: product.number}}">
                                        <button class=" m-1 px-1 rounded-lg bg-yellow-300 text-zinc-800"> show details
                                        </button>
                                    </router-link>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- top sells  -->
        <div class="mt-8">
            <!-- new products  -->
            <div class="py-8 pr-8 text-gray-200">
                <div class=" ml-8 inline-flex text-gray-200 ">
                    <h1> Top Sells in recent month</h1>
                </div>
                <div class=" grid grid-cols-5">
                    <div v-for="product in topSells"
                         class=" bg-slate-700 w-44 h-72 m-8 rounded-lg justify-center relative top-0">

                        <!--card image-->
                        <img :src="product.image" alt="product image" class="rounded-lg">

                        <!--card body-->
                        <div class="pt-1 pl-1">
                            {{ product.number }} <br>
                            {{ product.name }} <br>
                            {{ product.price }} <br>
                        </div>

                        <!--card buttons-->
                        <div class="rounded text-center  absolute bottom-0 border-t w-full h-16">
                            <div>
                                <button class="m-1 px-1 rounded-lg bg-lime-300 text-zinc-800"> add to shopping cart
                                </button>
                            </div>
                            <div>
                                <router-link :to="{name: 'product' , params: {product_number: product.number}}">
                                    <button class=" m-1 px-1 rounded-lg bg-yellow-300 text-zinc-800"> show details
                                    </button>
                                </router-link>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- favorite products  -->
        <div class="mt-8">
            <!-- new products  -->
            <div class="py-8 pr-8 text-gray-200">
                <div class=" ml-8 inline-flex text-gray-200 ">
                    <h1> favorite products in recent month</h1>
                </div>
                <div class=" grid grid-cols-5">
                    <div v-for="product in favoriteProducts"
                         class=" bg-slate-700 w-44 h-72 m-8 rounded-lg justify-center relative top-0">

                        <!--card image-->
                        <img :src="product.image" alt="product image" class="rounded-lg">

                        <!--card body-->
                        <div class="pt-1 pl-1">
                            {{ product.number }} <br>
                            {{ product.name }} <br>
                            {{ product.price }} <br>
                        </div>

                        <!--card buttons-->
                        <div class="rounded text-center  absolute bottom-0 border-t w-full h-16">
                            <div>
                                <button class="m-1 px-1 rounded-lg bg-lime-300 text-zinc-800"> add to shopping cart
                                </button>
                            </div>
                            <div>
                                <router-link :to="{name: 'product' , params: {product_number: product.number}}">
                                    <button class=" m-1 px-1 rounded-lg bg-yellow-300 text-zinc-800"> show details
                                    </button>
                                </router-link>
                            </div>
                        </div>

                    </div>
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
            // userLoggedIn: true,
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
    }

}
</script>

<!------------------------------------------------------------------------------>

<style>


</style>
