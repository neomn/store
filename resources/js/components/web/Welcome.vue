<template>
    <div>
        <Header/>

        <!-- display all products-->
        <div v-for="product in favoriteProducts" class=" ml-4 p-2 text-gray-200" >
            <label class="mx-4">132</label>
            <label class="mx-4">{{product.name}}</label>
            <label class="mx-4">{{product.number}}</label>
            <label  class="mx-4">{{product.available_count}}</label>
            <br>
        </div>

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
                    console.log( this.favoriteProducts);
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
