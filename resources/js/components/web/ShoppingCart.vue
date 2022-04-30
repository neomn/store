<template>
    <div class=" min-h-screen bg-slate-800">
        <!-- display shopping cart products -->
        <div v-for="product in products" class=" bg-slate-700 text-gray-200">
            {{product.name}}
        </div>

    </div>
</template>

<script>
import {isEmpty} from "lodash";

export default {
    name: "ShoppingCart",
    data() {
        return {
            products: [],
        }
    },
    mounted() {
        this.retrieveLocalStorageProducts()
    },
    methods: {
        retrieveLocalStorageProducts() {
            console.log('\n')
            console.log('----------------------------')
            console.log('retrieve LocalStorage Products > \n')
            if (this.checkIfLoggedIn()) {
                console.log('checking for shopping cart products in database')
            } else {
                console.log('checking for products in local storage')
                if (localStorage.length > 0) {
                    for (let i = 1; i <= localStorage.length; i++) {
                        if (localStorage.key(i-1).substring(0, 8) === 'product.') {
                            console.log('product found in local storage > \n')
                            this.products.push(JSON.parse(localStorage.getItem(localStorage.key(i-1))));
                            console.log(this.products[i-1])
                        } else {
                            console.log('no product found \n')
                        }
                    }
                } else console.log('local storage is empty')
            }
        },

        checkIfLoggedIn() {
            console.log('\n')
            console.log('-----------------')
            console.log('checkIfLoggedIn > \n')
            console.log(!isEmpty(localStorage.getItem('user.firstName')))
            console.log('----------------\n\n')
            return !isEmpty(localStorage.getItem('user.firstName'))
        },
    },
}
</script>

<style scoped>

</style>
