<template>
    <div>

        <Header/>

        <!-- display shopping cart productContainer -->
        <div class=" relative m-4 mt-20  flex-col justify-center  rounded-lg ">
            <div class=" m-4 p-4 flex flex-col justify-center rounded-lg bg-slate-700 ">
                <table ref="table" class="text-gray-400 text-center">
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
                    <tr v-for="product in productContainer">
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
            productContainer: [],
        }
    },
    mounted() {
        this.retrieveLocalStorageProducts()
    },
    methods: {
        retrieveLocalStorageProducts() {
            console.log('\n')
            console.log('retrieve LocalStorage Products > ------------ \n')
            if (this.checkIfLoggedIn()) {
                console.log('checking for shopping cart productContainer in database')
            } else {
                console.log('checking for productContainer in local storage')
                if (localStorage.length > 0) {
                    for (let i = 0; i < localStorage.length; i++)
                        if (localStorage.key(i).substring(0, 8) === 'product.') {
                            console.log('product found in local storage > adding it to this.productContainer \n')
                            this.productContainer.push(JSON.parse(localStorage.getItem(localStorage.key(i))));
                        } else {
                            console.log('no product found \n')
                        }
                } else console.log('local storage is empty')
                this.sortProducts(this.productContainer)
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
            window.location.reload()
        },
        decrementProductCount(product) {
            for (let i = 0; i < localStorage.length; i++)
                if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                    console.log('incrementing product count by one  \n')
                    product = JSON.parse(localStorage.getItem(localStorage.key(i)))
                    product.count--
                    localStorage.setItem(localStorage.key(i), JSON.stringify(product))
                }
            window.location.reload()
        },
        removeProduct(product) {
            console.log('remove Product > ------------------- \n')
            for (let i = 0; i < localStorage.length; i++)
                if (product.number === JSON.parse(localStorage.getItem(localStorage.key(i))).number) {
                    console.log('removing ' + localStorage.key(i) + '\n')
                    localStorage.removeItem(localStorage.key(i))
                }
            this.fixLocalStorageProductsSuffix()
            window.location.reload()
        },
        checkIfLoggedIn() {
            console.log('\n')
            console.log('checkIfLoggedIn > ---------------- \n')
            console.log(!isEmpty(localStorage.getItem('user.firstName')))
            return !isEmpty(localStorage.getItem('user.firstName'))
        },
        fixLocalStorageProductsSuffix() {
            console.log('fixLocalStorageProductsSuffix > ------------ \n')
            console.log('local storage length > ' + localStorage.length + '\n')
            let productBuffer = []
            this.saveLocalStorageProductsInBuffer(productBuffer)
            this.removeAllProductsInLocalStorage()
            this.saveProductsWithSortedSuffix(productBuffer)
        },
        saveLocalStorageProductsInBuffer(buffer) {
            for (let i = 0; i < localStorage.length; i++)
                if (localStorage.key(i).substring(0, 8) === 'product.') {
                    buffer.push(JSON.parse(localStorage.getItem(localStorage.key(i))))
                }
            console.log('product buffer > \n')
            console.log(buffer)
        },
        removeAllProductsInLocalStorage() {
            console.log('removeAllProductsInLocalStorage > ------------ \n')
            const length = localStorage.length
            console.log('local storage length > ' + length + '\n')
            for (let i = length - 1; i >= 0; i--)
                if (localStorage.key(i).substring(0, 8) === 'product.') {
                    console.log('loop index (i) > ' + i + '\n')
                    console.log('removing > ' + localStorage.key(i) + '\n')
                    localStorage.removeItem(localStorage.key(i))
                }
        },
        saveProductsWithSortedSuffix(buffer) {
            console.log('saveProductsWithSortedSuffix > ------------ \n')
            for (let i = 0; i < buffer.length; i++) {
                let suffix = i + 1
                console.log('saving > product.' + suffix + '\n')
                console.log(buffer[i])
                console.log('\n')
                localStorage.setItem('product.' + suffix, JSON.stringify(buffer[i]))
            }
        },
        localStorageProductCounter() {
            //returns the count of stored productContainer in local storage
            let counter = 0
            for (let i = 0; i < localStorage.length; i++)
                if (localStorage.key(i).substring(0, 8) === 'product.')
                    counter++
            return counter
        },
        sortProducts(products) {
            console.log('\n')
            console.log('sortProducts > ------------ \n')
            console.log('product length  > ' + products.length + '\n')
            for (let i = 0; i < products.length; i++) {
                console.log('product index  > ' + i + '\n')
                console.log('product sort > ' + products[i].sort + '\n')
                let sort = products[i].sort
                let index = i
                let temp
                if (sort !== index) {
                    temp = products[sort]
                    products[sort] = products[index]
                    products[index] = temp
                }
            }
            console.log('sorted products > \n' )
            console.log(products)
        },
    }
}
</script>

<style scoped>

</style>
