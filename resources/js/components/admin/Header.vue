<template>
    <div class="fixed top-0 w-full h-12 border-b border-lime-300 bg-slate-900">
        <div class="px-1 pt-2 py-2  bg-slate-900  rounded text-zinc-300 ">
            <a href="/" class="mx-2 px-2"> Home</a>
            <!--  user dashboard-->
<!--            <div v-if="loggedInUser" class=" w-auto ml-3 px-2 inline-block float-right"-->
<!--                 v-bind:class="(this.$route.path === '/dashboard')? 'border-t border-lime-500 rounded-lg': ''">-->
<!--                <router-link :to="{name:'dashboard'}" href="/api/user">-->
<!--                    <font-awesome-icon :icon="['fas', 'chart-line']"/>-->
<!--                    <h3 class="inline-block pl-1">{{ loggedInUser.firstName }}</h3>-->
<!--                </router-link>-->
<!--            </div>-->
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
