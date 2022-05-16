<template>
    <div class="fixed bottom-0 w-full h-16 rounded-tr-2xl rounded-tl-2xl bg-slate-800">
        <div class="HeaderImage">
            <!--            <img v-bind:src="HeaderImage" width="1260px" alt="welcomeBanner">-->
        </div>
        <div class=" relative flex h-12 px-1 pt-2 py-2  rounded text-zinc-300 ">
            <!-- left side buttons-->
            <div class=" absolute left-0 flex self-center">
                <!--home -->
                <div class="flex contents-center">
                    <a href="/" class="flex px-2 text-2xl"
                       v-bind:class="(this.$route.path === '/')? ' border-t bg-orange-600 rounded-lg': ''">
                        <font-awesome-icon :icon="['fas' , 'home']"/>
                        <div v-if="this.$route.path === '/'" class="flex">
                            Home
                        </div>
                    </a>
                </div>
                <a href="/categories" class="px-2 "
                   v-bind:class="(this.$route.path === '/categories')? 'border-t border-lime-500 rounded-lg': ''">
                    <font-awesome-icon :icon="['fab' , 'buffer']"/>
                </a>
                <router-link :to="{name:'aboutUs'}" class="px-2"
                             v-bind:class="(this.$route.path === '/about-us')? 'border-t border-lime-500 rounded-lg': ''">
                    <font-awesome-icon :icon="['fas' , 'info']"/>
                </router-link>
            </div>
            <!-- right side buttons-->
            <div class="absolute right-0 flex self-center ">
                <!--register-->
                <div v-if="!loggedInUser"
                     class="px-2 py-1"
                     v-bind:class="(this.$route.path === '/register')? 'border-t border-lime-500 rounded-lg': ''">
                    <div>
                        <router-link :to="{name:'register'}" class="float-right ">
                            <font-awesome-icon :icon="['fas' , 'user-plus']"/>
                        </router-link>
                    </div>
                </div>
                <!--login-->
                <div class=" px-2 py-1"
                     v-bind:class="(this.$route.path === '/login')? 'border-t border-lime-500 rounded-lg': ''">
                    <div class="">
                        <router-link v-if="!loggedInUser" :to="{name:'login'}" class="float-right " href="/api/user">
                            <font-awesome-icon :icon="['fas', 'door-open']"/>
                        </router-link>
                    </div>
                </div>
                <!--  user dashboard-->
                <div v-if="loggedInUser" class=" px-2 py-1 "
                     v-bind:class="(this.$route.path === '/dashboard')? 'border-t border-lime-500 rounded-lg': ''">
                    <router-link :to="{name:'dashboard'}" href="/api/user">
                        <font-awesome-icon :icon="['fas', 'chart-line']"/>
                        <h3 class="inline-block pl-1">{{ loggedInUser.firstName }}</h3>
                    </router-link>
                </div>
                <!--  shopping cart-->
                <div class=" px-2 py-1"
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
