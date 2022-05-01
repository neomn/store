<template>
    <div>

        <Header/>

        <!-- display shopping cart products -->
        <div class=" relative m-4 mt-20  flex-col justify-center  rounded-lg ">
            <div class=" m-4 p-4 flex flex-col justify-center rounded-lg bg-slate-700 ">
                <table class="text-gray-400 text-center">
                    <thead>
                    <tr>
                        <th scope="col" class="px-8 pb-4 border-yellow-1 border-b"> Product Number</th>
                        <th scope="col" class="px-8 pb-4 border-yellow-1 border-b"> Name</th>
                        <th scope="col" class="px-8 pb-4 border-yellow-1 border-b"> Unit Price</th>
                        <th scope="col" class="px-8 pb-4 border-yellow-1 border-b"> Count</th>
                        <th scope="col" class="px-8 pb-4 border-yellow-1 border-b"> Sum</th>
                        <th scope="col" class="px-8 pb-4 border-yellow-1 border-b"> Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="product in products">
                        <td class="py-2">{{ product.number }}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.count }}</td>
                        <td>{{ product.count * product.price }}</td>
                        <td>
                            <div class="inline-flex">
                                <div class="m-2 px-2 py-1 rounded-lg border border-yellow-500"
                                    @click="decrementProductCount(product)">
                                    <font-awesome-icon :icon="['fas', 'minus-circle']"/>
                                </div>
                                <div class="m-2 px-2 py-1 rounded-lg border border-lime-500"
                                    @click="incrementProductCount(product)">
                                    <font-awesome-icon :icon="['fas', 'plus-circle']"/>
                                </div>
                                <div class="m-2 px-2 py-1 rounded-lg border border-red-500"
                                     @click="removeProduct(product)">
                                    <font-awesome-icon :icon="['fas', 'trash']"/>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
import {isEmpty} from "lodash";
import Header from "../web/Header";

export default {
    name: "ShoppingCart",
    components: {Header},
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
                        if (localStorage.key(i - 1).substring(0, 8) === 'product.') {
                            console.log('product found in local storage > \n')
                            this.products.push(JSON.parse(localStorage.getItem(localStorage.key(i - 1))));
                            console.log(this.products[i - 1])
                        } else {
                            console.log('no product found \n')
                        }
                    }
                } else console.log('local storage is empty')
            }
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
        decrementProductCount(product) {
            for (let i = 0; i < localStorage.length; i++)
                if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                    console.log('incrementing product count by one  \n')
                    product = JSON.parse(localStorage.getItem(localStorage.key(i)))
                    product.count--
                    localStorage.setItem(localStorage.key(i), JSON.stringify(product))
                }
        },
        removeProduct(product) {
            for (let i = 0; i < localStorage.length; i++)
                if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                    localStorage.removeItem(localStorage.key(i))
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
