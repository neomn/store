<template>
    <div class="fixed top-0 w-full border-b border-lime-300 bg-slate-900">
        <div class="HeaderImage">
            <!--            <img v-bind:src="HeaderImage" width="1260px" alt="welcomeBanner">-->
        </div>
        <div class="px-1 py-2  bg-slate-900  rounded text-zinc-300 ">
            <ul>
                <a href="/" class="mx-2">Home</a>
                <a href="/categories" class="mx-2">Categories</a>
                <router-link :to="{name:'aboutUs'}" class="mx-2">
                    About Us
                </router-link>
                <div class=" mx-2 mr-4 inline-block float-right">
                    <router-link v-if="!loginStatus" :to="{name:'login'}" class="float-right " href="/api/user">
                        <font-awesome-icon :icon="['fas', 'door-open']"/>
                    </router-link>
                </div>
                <div class=" mx-2 mr-4 inline-block float-right">
                    <router-link v-if="loginStatus" :to="{name:'dashboard'}" href="/api/user">
                        <font-awesome-icon :icon="['fas', 'chart-line']"/>
                    </router-link>
                </div>
                <div class=" mx-2 inline-block float-right px-2">
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
export default {
    props: [
        'loginStatus',
    ],
    data() {
        return {
            HeaderImage: '../resources/img/WelcomeController.jpg',
        }
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
