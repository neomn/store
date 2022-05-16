<template>
    <div class="fixed bottom-0 flex w-full h-14 px-2 bg-gradient-to-b from-slate-700 to-slate-900">
        <div class="flex grow justify-around items-center rounded text-zinc-300 text-2xl">
            <!-- left side buttons-->
            <div class=" flex grow items-center ">
                <!--home -->
                <div class=" flex grow h-10 ">
                    <a href="/" class="flex grow place-content-center pr-2"
                       v-bind:class="(this.$route.path === '/')? ' bg-emerald-600 rounded-lg': ''">
                        <div class="mt-1 px-1">
                            <font-awesome-icon :icon="['fas' , 'home']"/>
                        </div>
                        <div v-if="this.$route.path === '/'" class="flex ">
                            Home
                        </div>
                    </a>
                </div>
                <!--categories -->
                <div class=" flex grow">
                    <a href="/categories" class="flex grow place-content-center pr-2"
                       v-bind:class="(this.$route.path === '/categories')? ' bg-emerald-600 rounded-lg': ''">
                        <div class="mt-1 px-1">
                            <font-awesome-icon :icon="['fab' , 'buffer']"/>
                        </div>
                        <div v-if="this.$route.path === '/categories'" class="flex ">
                            Categories
                        </div>
                    </a>
                </div>
                <!-- about us -->
                <div class=" grow">
                    <router-link :to="{name:'aboutUs'}" class="px-2"
                                 v-bind:class="(this.$route.path === '/about-us')? 'border-t border-lime-500 rounded-lg': ''">
                        <font-awesome-icon :icon="['fas' , 'info']"/>
                    </router-link>
                </div>
            </div>
            <!-- right side buttons-->
            <div class="flex grow ">
                <!--register-->
                <div v-if="!loggedInUser" class=" grow px-2 py-1"
                     v-bind:class="(this.$route.path === '/register')? 'border-t border-lime-500 rounded-lg': ''">
                    <div>
                        <router-link :to="{name:'register'}" class="float-right ">
                            <font-awesome-icon :icon="['fas' , 'user-plus']"/>
                        </router-link>
                    </div>
                </div>
                <!--login-->
                <div class=" grow px-2 py-1"
                     v-bind:class="(this.$route.path === '/login')? 'border-t border-lime-500 rounded-lg': ''">
                    <div class="">
                        <router-link v-if="!loggedInUser" :to="{name:'login'}" class="float-right " href="/api/user">
                            <font-awesome-icon :icon="['fas', 'door-open']"/>
                        </router-link>
                    </div>
                </div>
                <!--  user dashboard-->
                <div v-if="loggedInUser" class=" grow px-2 py-1 "
                     v-bind:class="(this.$route.path === '/dashboard')? 'border-t border-lime-500 rounded-lg': ''">
                    <router-link :to="{name:'dashboard'}" href="/api/user">
                        <font-awesome-icon :icon="['fas', 'chart-line']"/>
                        <h3 class="inline-block pl-1">{{ loggedInUser.firstName }}</h3>
                    </router-link>
                </div>
                <!--  shopping cart-->
                <div class=" grow px-2 py-1"
                     v-bind:class="(this.$route.path === '/shopping-cart')? 'border-t border-lime-500 rounded-lg': ''">
                    <div class="">
                        <router-link :to="{name:'shoppingCart'}">
                            <font-awesome-icon :icon="['fas', 'shopping-cart']"/>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<!---------------------------------------------------------------------->

<script>
import {isEmpty} from "lodash";

export default {
    name: "Header",
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
            console.log('loggedInUser >')
            console.log(this.loggedInUser)
        },
    }
}
</script>

<!------------------------------------------------------------------------------>

<style scoped>

</style>
