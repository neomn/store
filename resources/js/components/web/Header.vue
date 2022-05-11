<template>
    <div class="fixed top-0 w-full h-12 border-b border-lime-300 bg-slate-900">
        <div class="HeaderImage">
            <!--            <img v-bind:src="HeaderImage" width="1260px" alt="welcomeBanner">-->
        </div>
        <div class="px-1 pt-2 py-2  bg-slate-900  rounded text-zinc-300 ">
            <ul>
                <a href="/" class="mx-2 px-2"
                   v-bind:class="(this.$route.path === '/')? ' border-t border-lime-500 rounded-lg': ''"> Home
                </a>
                <a href="/categories" class="mx-2 px-2 "
                   v-bind:class="(this.$route.path === '/categories')? 'border-t border-lime-500 rounded-lg': ''">
                    Categories
                </a>
                <router-link :to="{name:'aboutUs'}" class="mx-2 px-2"
                             v-bind:class="(this.$route.path === '/about-us')? 'border-t border-lime-500 rounded-lg': ''">
                    About Us
                </router-link>
                <!--register-->
                <div v-if="!loggedInUser"
                     class="px-4 pt-1 inline-block float-right"
                     v-bind:class="(this.$route.path === '/register')? 'border-t border-lime-500 rounded-lg': ''">
                    <div>
                        <router-link :to="{name:'register'}" class="float-right ">
                            <font-awesome-icon :icon="['fas' , 'user-plus']"/>
                        </router-link>
                    </div>
                </div>
                <!--login-->
                <div class=" px-4 inline-block float-right"
                     v-bind:class="(this.$route.path === '/login')? 'border-t border-lime-500 rounded-lg': ''">
                    <div class="pt-1">
                        <router-link v-if="!loggedInUser" :to="{name:'login'}" class="float-right " href="/api/user">
                            <font-awesome-icon :icon="['fas', 'door-open']"/>
                        </router-link>
                    </div>
                </div>
                <!--  user dashboard-->
                <div v-if="loggedInUser" class=" w-auto ml-3 px-2 inline-block float-right"
                     v-bind:class="(this.$route.path === '/dashboard')? 'border-t border-lime-500 rounded-lg': ''">
                    <router-link :to="{name:'dashboard'}" href="/api/user">
                        <font-awesome-icon :icon="['fas', 'chart-line']"/>
                        <h3 class="inline-block pl-1">{{ loggedInUser.firstName }}</h3>
                    </router-link>
                </div>
                <!--  shopping cart-->
                <div class=" px-4 inline-block float-right "
                     v-bind:class="(this.$route.path === '/shopping-cart')? 'border-t border-lime-500 rounded-lg': ''">
                    <div class="pt-1">
                        <router-link :to="{name:'shoppingCart'}">
                            <font-awesome-icon :icon="['fas', 'shopping-cart']"/>
                        </router-link>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</template>

<!---------------------------------------------------------------------->

<script>
import {isEmpty} from "lodash";

export default {
    data() {
        return {
            HeaderImage: '../resources/img/WelcomeController.jpg',
            loggedInUser: {},
        }
    },
    created() {
        console.log('Header Created > ------------------------ \n')
        this.retrieveLoggedInUserFromLocalStorage()
    },
    mounted() {

        // this.retrieveLoggedInUserFromLocalStorage()
    },
    methods: {
        checkIfLoggedIn() {
            console.log('checkIfLoggedIn > ')
            console.log(localStorage.getItem('loggedInUser') !== null)
            return localStorage.getItem('loggedInUser') !== null
        },
        retrieveLoggedInUserFromLocalStorage() {
            console.log('retrieveLoggedInUserFromLocalStorage > ')
            if (this.checkIfLoggedIn()) {
                this.loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'))
            } else this.loggedInUser = null
            console.log('loggInUser > null ')
        },
        refreshHeader(){

        },
    }
}
</script>

<!------------------------------------------------------------------------------>

<style scoped>

</style>
