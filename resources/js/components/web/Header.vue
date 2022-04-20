<template>
    <div class="root bg-slate-900">
        <div class="HeaderImage">
            <!--            <img v-bind:src="HeaderImage" width="1260px" alt="welcomeBanner">-->
        </div>
        <div class="list bg-slate-900 border-b rounded  ">
            <ul>
                <a href="/">Home</a>
                <router-link :to="{name: 'categories' , force: true}">
                    categories
                </router-link>
                <router-link v-if="!loginStatus" :to="{name:'login'}" class="float-right " href="/api/user">
                    <font-awesome-icon :icon="['fas', 'door-open']"/>
                    login
                </router-link>
                <router-link v-if="loginStatus" :to="{name:'dashboard'}" class="float-right " href="/api/user">
                    <font-awesome-icon :icon="['fas', 'chart-line']"/>
                    Dashboard
                </router-link>
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
div.root {
    display: unset;
}

div.HeaderImage {
    border: 1px solid #1d455b;
    background-color: #333333;
    position: relative;
}

div.list {
    overflow: hidden;
    position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 0;
}

a {
    position: relative;
    display: inline-block;
    color: white;
    padding: 2px;
    padding-top: 10px;
    padding-right: 10px;
    margin-right: 2px;
    margin-left: 2px;
    border-right: 2px solid gray;
    text-decoration: none;
}

</style>
