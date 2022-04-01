<template>
    <div>
        <Header/>

        <!-- display all products-->
        <table class="border rounded-md text-gray-200" >
            <thead>
            <th>product number</th>
            <th>name</th>
            <th>available count</th>
            </thead>
            <tbody>
                <tr v-for="product in favoriteProducts">
                    <td>{{ product.number }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.available_count }}</td>
                </tr>
            </tbody>
        </table>

        <Footer/>
    </div>
</template>


<script>
import Header from './Header.vue';
import Footer from './Footer';

export default {
    name: 'app',
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
