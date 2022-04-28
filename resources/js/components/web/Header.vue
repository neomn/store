<template>
    <div class="fixed top-0 w-full border-b border-lime-300 bg-slate-900">
        <div class="HeaderImage">
            <!--            <img v-bind:src="HeaderImage" width="1260px" alt="welcomeBanner">-->
        </div>
        <div class="px-1 pt-2 py-2  bg-slate-900  rounded text-zinc-300 ">
            <ul>
                <a href="/" class="mx-2">Home</a>
                <a href="/categories" class="mx-2">Categories</a>
                <router-link :to="{name:'aboutUs'}" class="mx-2">
                    About Us
                </router-link>
                <div v-if="!userLoggedIn" class=" ml-4  mr-6 mt-1  inline-block float-right">
                    <router-link  :to="{name:'register'}" class="float-right ">
                        <font-awesome-icon :icon="['fas' , 'user-plus']"/>
                    </router-link>
                </div>
                <div class=" mx-2 mt-1  inline-block float-right">
                    <router-link v-if="!userLoggedIn" :to="{name:'login'}" class="float-right " href="/api/user">
                        <font-awesome-icon :icon="['fas', 'door-open']"/>
                    </router-link>
                </div>
                <div class=" mx-2 mt-1  inline-block float-right">
                    <router-link v-if="userLoggedIn" :to="{name:'dashboard'}" href="/api/user">
                        <font-awesome-icon :icon="['fas', 'chart-line']"/>
                        <h3 class="inline-block pl-3">{{this.user.first_name}}</h3>
                    </router-link>
                </div>
                <div class=" mx-2 mt-1 inline-block float-right ">
                    <router-link :to="{name:'shoppingCart'}">
                        <font-awesome-icon :icon="['fas', 'shopping-cart']"/>
                    </router-link>
                </div>
            </ul>
        </div>
    </div>
</template>

<!---------------------------------------------------------------------->

<script>
import {isEmpty} from "lodash";

export default {
    props: [],
    data() {
        return {
            HeaderImage: '../resources/img/WelcomeController.jpg',
            userLoggedIn: true,
            user: {
                'first_name': localStorage.getItem('user.firstName'),
                'last_name': localStorage.getItem('user.firstName'),
                'email': localStorage.getItem('user.firstName'),
            },
        }
    },
    mounted() {
        this.checkIfLoggedIn()
    },
    created() {

    },

    methods: {
        checkIfLoggedIn() {
            console.log('\n')
            console.log('-------------------------------')
            console.log('checkIfLoggedIn > \n')
            this.userLoggedIn = !isEmpty(localStorage.getItem('user.firstName'))
            console.log(this.userLoggedIn)
        },
    }
}
</script>

<!------------------------------------------------------------------------------>

<style scoped>
/*div.root {*/
/*    display: unset;*/
/*}*/

/*div.HeaderImage {*/
/*    border: 1px solid #1d455b;*/
/*    background-color: #333333;*/
/*    !*position: relative;*!*/
/*}*/

/*div.list {*/
/*    overflow: hidden;*/
/*    position: -webkit-sticky; !* Safari *!*/
/*    position: sticky;*/
/*    top: 0;*/
/*}*/

/*a {*/
/*    position: relative;*/
/*    display: inline-block;*/
/*    color: white;*/
/*    padding: 2px;*/
/*    padding-top: 10px;*/
/*    padding-right: 10px;*/
/*    margin-right: 2px;*/
/*    margin-left: 2px;*/
/*    border-right: 2px solid gray;*/
/*    text-decoration: none;*/
/*}*/
</style>
