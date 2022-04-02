<template>
    <div class="root">
        <div class="HeaderImage">
<!--            <img v-bind:src="HeaderImage" width="1260px" alt="welcomeBanner">-->
        </div>
        <div class="list ">
            <ul>
                <a href="/">Home</a>
                <router-link to="categories">categories</router-link>
                <router-link to="/product/1851567607">product</router-link>
                <a href="#">paymetns</a>
                <a href="#">orders history</a>
                <a class="right" href="/api/user">login / register
                    <font-awesome-icon :icon="['fas', 'door-open']" /></a>

            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            HeaderImage: '../resources/img/WelcomeController.jpg',
        }
    }
}
</script>

<style scoped>
div.root{
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
    background-color: #333333;
}

a {
    position: relative;
    display: inline-block;
    color: white;
    padding:2px;
    padding-top: 10px;
    padding-right: 10px;
    margin-right: 2px;
    margin-left: 2px;
    border-right: 2px solid gray;
    text-decoration: none;

}

a.right {
    border: none;
    float: right;
    margin: unset;
    margin-right: 50px;
}

i.login-register {
    padding-right: 10px;
    background-color: green;
}
</style>
