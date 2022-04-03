<template>
    <div>

        <!-- header component-->
        <Header/>

        <!-- display favorite products in recent month-->
        <div class="mx-4 mt-4" v-if="favoriteProducts.length > 0">
            <h1 class="text-gray-200"> favorite products in recent month</h1>
            <table class="border rounded-md text-gray-200">
                <thead>
                <th>product number</th>
                <th>name</th>
                <th>available count</th>
                <th> details </th>
                </thead>
                <tbody>
                <tr v-for="product in favoriteProducts">
                    <td class="mx-10 px-4 text-center">{{ product.number }}</td>
                    <td class="text-center">{{ product.name }}</td>
                    <td class="text-center">{{ product.available_count }}</td>
                    <td> <router-link :to="{ name: 'product' , params:{ product_number: product.number}}"> show details </router-link> </td>
                </tr>
                </tbody>
            </table>
        </div>


        <!-- display new products-->
        <div class="mx-4 mt-4" v-if="newProducts.length > 0">
            <h1 class="text-gray-200"> new products</h1>
            <table class="border rounded-md text-gray-200">
                <thead>
                <th>product number</th>
                <th>name</th>
                <th>available count</th>
                <th> details </th>
                </thead>
                <tbody>
                <tr v-for="product in newProducts">
                    <td class="text-center">{{ product.number }}</td>
                    <td class="text-center">{{ product.name }}</td>
                    <td class="text-center">{{ product.available_count }}</td>
                    <td> <router-link :to="{ name: 'product' , params:{ product_number: product.number}}"> show details </router-link> </td>

                </tr>
                </tbody>
            </table>
        </div>


        <!-- display top sells in recent month-->
        <div class="mx-4 mt-4" v-if="topSells.length > 0">
            <h1 class="text-gray-200"> Top Sells</h1>
            <table class="border rounded-md text-gray-200">
                <thead>
                <th>product number</th>
                <th>name</th>
                <th>available count</th>
                <th> details </th>
                </thead>
                <tbody>
                <tr v-for="product in topSells">
                    <td class="text-center">{{ product.number }}</td>
                    <td class="text-center">{{ product.name }}</td>
                    <td class="text-center">{{ product.available_count }}</td>
                    <td> <router-link :to="{ name: 'product' , params:{ product_number: product.number}}"> show details </router-link> </td>
                </tr>
                </tbody>
            </table>
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
                    console.log('favorite >>> ' + this.favoriteProducts);
                    console.log(this.favoriteProducts);
                    console.log('new >>> ' + this.newProducts);
                    console.log('top  >>> ' + this.topSells);
                })
                .catch(function (error) {
                    console.log('error while catching data >>> ' + error);
                });
        },
    }
}
</script>




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
