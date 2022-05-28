<template>
    <div class="flex flex-col fixed bottom-0 w-full border-t">
        <!-- header -->
        <div class="flex w-full h-14 px-2 bg-gray-900">
            <div class="flex grow justify-around items-center rounded text-zinc-300 text-2xl">
                <!-- left side buttons-->
                <div class=" flex grow items-center">
                    <!-- menu -->
                    <div v-if="!displayMenu" @click="toggleMenu" class="pr-2">
                        <font-awesome-icon :icon="['fas' , 'bars']"/>
                    </div>
                    <!-- close menu  -->
                    <div v-if="displayMenu" @click="toggleMenu" class="pr-2 ">
                        <font-awesome-icon :icon="['fas' , 'times']"/>
                    </div>
                    <!--home -->
                    <div class=" flex grow h-10 ">
                        <a href="/" class="flex justify-center items-center grow pr-2"
                           v-bind:class="(this.$route.path === '/')? ' border rounded-lg': ''">
                            <div class="px-1 text-md">
                                <font-awesome-icon :icon="['fas' , 'home']"/>
                            </div>
                            <div v-if="this.$route.path === '/'" class="flex text-sm ">
                                Home
                            </div>
                        </a>
                    </div>
                    <!--categories -->
                    <div class=" flex grow h-10 ">
                        <a href="/categories" class="flex justify-center items-center grow pr-2"
                           v-bind:class="(this.$route.path === '/categories')? ' border rounded-lg': ''">
                            <div class="px-1 text-md">
                                <font-awesome-icon :icon="['fab' , 'buffer']"/>
                            </div>
                            <div v-if="this.$route.path === '/categories'" class="flex text-sm ">
                                Categories
                            </div>
                        </a>
                    </div>
                    <!-- about us -->
                    <div class=" flex grow h-10 ">
                        <routerLink :to="{name:'aboutUs'}" class="flex justify-center items-center grow pr-2"
                                    v-bind:class="(this.$route.path === '/about-us')? ' border rounded-lg': ''">
                            <div class="px-2 text-md">
                                <font-awesome-icon :icon="['fas' , 'info']"/>
                            </div>
                            <div v-if="this.$route.path === '/about-us'" class="flex text-sm ">
                                About Us
                            </div>
                        </routerLink>
                    </div>
                </div>
                <!-- right side buttons-->
                <div class="flex grow ">
                    <!--                &lt;!&ndash;register&ndash;&gt;-->
                    <!--                <div v-if="!loggedInUser" class=" grow px-2 py-1"-->
                    <!--                     v-bind:class="(this.$route.path === '/register')? 'border-t border-lime-500 rounded-lg': ''">-->
                    <!--                    <div>-->
                    <!--                        <router-link :to="{name:'register'}" class="float-right ">-->
                    <!--                            <font-awesome-icon :icon="['fas' , 'user-plus']"/>-->
                    <!--                        </router-link>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--  shopping cart-->
                    <div class=" flex grow h-10  ">
                        <routerLink :to="{name:'shoppingCart'}" class="flex justify-center items-center grow pr-2"
                                    v-bind:class="(this.$route.path === '/shopping-cart')? ' border rounded-lg': ''">
                            <div class="px-2 text-md">
                                <font-awesome-icon :icon="['fas', 'shopping-cart']"/>
                            </div>
                            <div v-if="this.$route.path === '/shopping-cart'" class="flex text-sm ">
                                Cart
                            </div>
                        </routerLink>
                    </div>
                    <!--login-->
                    <div class=" flex grow h-10  ">
                        <routerLink :to="{name:'login'}" class="flex justify-center items-center grow "
                                    v-bind:class="(this.$route.path === '/login')? ' border rounded-lg': ''">
                            <div class="px-2 text-md">
                                <font-awesome-icon :icon="['fas', 'door-open']"/>
                            </div>
                            <div v-if="this.$route.path === '/login'" class="flex text-sm ">
                                Login
                            </div>
                        </routerLink>
                    </div>
                    <!--  user dashboard-->
                    <div v-if="loggedInUser" class=" grow px-2 py-1 "
                         v-bind:class="(this.$route.path === '/dashboard')? 'border-t border-lime-500 rounded-lg': ''">
                        <router-link :to="{name:'dashboard'}" href="/api/user">
                            <div class="text-md">
                                <font-awesome-icon :icon="['fas', 'chart-line']"/>
                            </div>
                            <h3 class="inline-block pl-1">{{ loggedInUser.firstName }}</h3>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <!-- header hidden area -->
        <div v-if="displayMenu" class=" w-full h-32  bg-gray-700 ">

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
            displayMenu: false,
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
        toggleMenu() {
            this.displayMenu = !this.displayMenu
        }
    }
}
</script>

<!------------------------------------------------------------------------------>

<style scoped>

</style>
