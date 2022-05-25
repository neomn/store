<template>
    <div class="z-0 min-h-screen bg-zinc-900">

        <!-- header component-->
        <Header class="z-50"/>

        <!--  top image slider -->
        <div class=" w-full ">
            <img src="/resources/img/Welcome.jpg" alt="image slider" class=" w-full h-44 object-fill">
        </div>

        <br>
        <ProductContainer :products="newProducts" title="New Products" color="yellow-400"/>
        <ProductContainer :products="topSells" title="Top Sells" color="red-600"/>
        <ProductContainer :products="favoriteProducts" title="Favorite Products" color="lime-400"/>
        <br>
        <br>
        <br>
        <br>

        <!-- footer component-->
        <Footer class="hidden"/>

    </div>
</template>

<!----------------------------------------------------------------------------->

<script>
import Header from './Header.vue';
import Footer from './Footer';
import ProductContainer from "./miniComponenets/ProductContainer";

export default {
    name: 'web',
    components: {
        Header,
        Footer,
        ProductContainer,
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
            topImageSlider: {},
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
