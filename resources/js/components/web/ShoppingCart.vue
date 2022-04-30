<template>
    <div class=" min-h-screen bg-slate-800">

    </div>
</template>

<script>
import {isEmpty} from "lodash";

export default {
    name: "ShoppingCart",
    data(){
        return {
            products: [],
        }
    },
    mounted() {
        this.checkForProducts()
    },
    methods: {
        checkForProducts(){
            console.log('\n')
            console.log('----------------------------')
            console.log('checking for products > \n')
            if (this.checkIfLoggedIn()){
                console.log('checking for shopping cart products in database')
            }
            else {
                console.log('checking for products in local storage')
                let products = []
                for (let i = 0; i < localStorage.length; i++){
                    if (localStorage.key(i).substring(0,3) == 'products.name') {
                        arr.push(localStorage.key(i));
                    }
                }

            }
        },

        checkIfLoggedIn() {
            console.log('\n')
            console.log('-------------------------------')
            console.log('checkIfLoggedIn > \n')
            console.log(!isEmpty(localStorage.getItem('user.firstName')))
            return !isEmpty(localStorage.getItem('user.firstName'))
        },
    },
}
</script>

<style scoped>

</style>
