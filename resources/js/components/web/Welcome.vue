<template>
    <div class="bg-slate-900">
        <!-- header component-->
        <Header :loginStatus="loginStatus"/>

        <!-- new products  -->
        <div class="py-8 pr-8 text-gray-200">
            <div class=" ml-8 inline-flex text-gray-200 ">
                <h1> new products in recent month</h1>
            </div>
            <div class="grid grid-cols-6">
                <div v-for="product in newProducts"
                     class="bg-slate-800 w-44 h-72 m-8 rounded-lg justify-center relative top-0">
                    <img :src="product.image" alt="product image" class="rounded-lg">
                    <div class="pt-4 pl-4">
                        {{ product.number }} <br>
                        {{ product.name }} <br>
                        {{ product.price }} <br>
                    </div>
                    <router-link :to="{name: 'product' , params: {product_number: product.number}}">
                        <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">
                            <button> show details</button>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>

        <!-- top sells  -->
        <div class="py-8 pr-8 text-gray-200">
            <div class=" ml-8 inline-flex text-gray-200 ">
                <h1> top sells in recent month</h1>
            </div>
            <div class="grid grid-cols-6">
                <div v-for="product in topSells"
                     class="bg-slate-800 w-44 h-72 m-8 rounded-lg justify-center relative top-0">
                    <img :src="product.image" alt="product image" class="rounded-lg">
                    <div class="pt-4 pl-4">
                        {{ product.number }} <br>
                        {{ product.name }} <br>
                        {{ product.price }} <br>
                    </div>
                    <router-link :to="{name: 'product' , params: {product_number: product.number}}">
                        <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">
                            <button> show details</button>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>

        <!-- favorite products  -->
        <div class="py-8 pr-8 text-gray-200">
            <div class=" ml-8 inline-flex text-gray-200 ">
                <h1> favorite in recent month</h1>
            </div>
            <div class="grid grid-cols-6">
                <div v-for="product in favoriteProducts"
                     class="bg-slate-800 w-44 h-72 m-8 rounded-lg justify-center relative top-0">
                    <img :src="product.image" alt="product image" class="rounded-lg">
                    <div class="pt-4 pl-4">
                        {{ product.number }} <br>
                        {{ product.name }} <br>
                        {{ product.price }} <br>
                    </div>
                    <router-link :to="{name: 'product' , params: {product_number: product.number}}">
                        <div class="rounded text-center  absolute bottom-0 border-t w-full h-12">
                            <button> show details</button>
                        </div>
                    </router-link>
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
