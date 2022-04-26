<template>
    <div class="z-0 min-h-screen  bg-slate-800 ">

        <!-- header component-->
        <Header :loginStatus="loginStatus" class="z-10"/>

        <div class="mt-8">
            <!-- new products  -->
            <div class="py-8 pr-8 text-gray-200">
                <div class=" ml-8 inline-flex text-gray-200 ">
                    <h1> new products in recent month</h1>
                </div>
                <div class=" grid grid-cols-5">
                    <div v-for="product in newProducts"
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

        <!-- top sells  -->
        <div class="mt-8">
            <!-- new products  -->
            <div class="py-8 pr-8 text-gray-200">
                <div class=" ml-8 inline-flex text-gray-200 ">
                    <h1> new products in recent month</h1>
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
                    <h1> new products in recent month</h1>
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

export default {
    name: 'web',
    components: {
        Header,
        Footer,
    },
    props: [
        'isLoggedIn',
    ],
    data() {
        return {
            loginStatus: false,
            categories: [],
            favoriteProducts: [],
            newProducts: [],
            topSells: [],
        }
    },
    mounted() {
        this.initData()
        this.checkIfLoggedIn()
    },
    methods: {
        initData: function () {
            this.loginStatus = false
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
        checkIfLoggedIn() {
            axios.post('/login')
                .then(response => {
                    if (response.data === 'user already logged in') {
                        this.loginStatus = true
                        console.log('login status >>> ')
                        console.log(this.loginStatus)
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
    }
}
</script>

<!------------------------------------------------------------------------------>

<style>


</style>
