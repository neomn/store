<template>
    <div>

        <!-- header component-->
        <Header/>

        <!-- display top 20 favorite products in recent week-->
        <div class="mx-4 mt-4 pb-12" v-if="favoriteProducts.length > 0">
            <h1 class="text-gray-200"> favorite products in recent month</h1>
            <div class="border-2 rounded-md p-3 text-gray-200 inline-flex">
                <table class=" text-gray-200">
                    <thead>
                    <th class="px-8">product number</th>
                    <th class="px-8">name</th>
                    <th class="px-8">available count</th>
                    <th class="px-8">image</th>
                    <th class="px-8"> details</th>
                    </thead>
                    <tbody>
                    <tr v-for="product in favoriteProducts">
                        <td class="mx-10 px-4 text-center">{{ product.number }}</td>
                        <td class="text-center">{{ product.name }}</td>
                        <td class="text-center">{{ product.available_count }}</td>
                        <td><img :src="product.image" alt="image" width="20px" height="20px"></td>
                        <td>
                            <router-link :to="{ name: 'product' , params:{ product_number: product.number}}"> show
                                details
                            </router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
             </div>
        </div>


        <!-- display new products in recent month-->
        <div class="mx-4 mt-4 pb-12" v-if="newProducts.length > 0">
            <h1 class="text-gray-200"> new products</h1>
            <div class="border-2 rounded-md p-3 text-gray-200 inline-flex">
                <table class=" text-gray-200">
                    <thead>
                    <th class="px-8">product number</th>
                    <th class="px-8">name</th>
                    <th class="px-8">available count</th>
                    <th class="px-8">image</th>
                    <th class="px-8"> details</th>
                    </thead>
                    <tbody>
                    <tr v-for="product in newProducts">
                        <td class="text-center">{{ product.number }}</td>
                        <td class="text-center">{{ product.name }}</td>
                        <td class="text-center">{{ product.available_count }}</td>
                        <td><img :src="product.image" alt="image" width="20px" height="20px"></td>
                        <td>
                            <router-link :to="{ name: 'product' , params:{ product_number: product.number}}"> show
                                details
                            </router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- display 20 top sells in recent month-->
        <div class="mx-4 mt-4 pb-12" v-if="topSells.length > 0">
            <h1 class="text-gray-200"> Top Sells</h1>
            <div class="border-2 rounded-md p-3 text-gray-200 inline-flex">
                <table class=" text-gray-200">
                    <thead>
                    <th class="px-8">product number</th>
                    <th class="px-8">name</th>
                    <th class="px-8">available count</th>
                    <th class="px-8">image</th>
                    <th class="px-8"> details</th>
                    </thead>
                    <tbody>
                    <tr  v-for="product in topSells">
                        <td class="text-center">{{ product.number }}</td>
                        <td class="text-center">{{ product.name }}</td>
                        <td class="text-center">{{ product.available_count }}</td>
                        <td><img :src="product.image" alt="image" width="20px" height="20px"></td>
                        <td>
                            <router-link :to="{ name: 'product' , params:{ product_number: product.number}}"> show
                                details
                            </router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <br>
        <br>


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
    data() {
        return {
            categories: [],
            favoriteProducts: [],
            newProducts: [],
            topSells: [],
        }
    },
    mounted() {
        this.loadInitialData();
    },
    methods: {
        loadInitialData: function () {
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
    }
}
</script>

<!------------------------------------------------------------------------------>

<style>
body {
    background-color: #616161;
}

.top-nav-button {
    color: white;
    padding: 0px;
    margin: 5px;
    border: white;
    text-decoration: none;
}
</style>
