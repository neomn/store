<template>
    <div>
        <div class="HeaderImage">
            <img v-bind:src="HeaderImage" width="1260px" alt="welcomeBanner">
        </div>
        <div class="list ">
            <ul>
                <a href="/">Home</a>
                <a href="#">categories</a>
                <a href="#">profile</a>
                <a href="#">paymetns</a>
                <a href="#">orders history</a>
                <a class="right" href="#">login/register</a>
            </ul>
            <img src="" alt="">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            HeaderImage: '../resources/img/Welcome.jpg',
        }
    }
}
</script>

<style scoped>
div.HeaderImage {
    border: 1px solid #1d455b;
    background-color: #333333;
    position: relative;
}

div.list {
    position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 0;
    background-color: #333333;
    padding: 10px;
    align-content: center;
}

a {
    position: relative;
    display: inline;
    color: white;
    padding: 15px;
    margin-right: 2px;
    margin-left: 2px;
    margin-top: 5px;
    border-right: 2px solid gray;
    text-decoration: none;

}
a.right{
    border: none;
    float: right;
    margin: unset;
    margin-right: 50px;
}
</style>
