<template>
    <div>
        <Header/>
        <Body/>
        <Footer/>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import Body from './Body';
    import Footer from './Footer';

    export default {
        name:'app',
        components: {
            Header,
            Body,
            Footer,

        },
        data(){
            return{

            }
        }
    }
</script>

<style>
    body{
        background-color:#616161;
    }
    .top-nav-button{
        color: white;
        padding: 0px;
        margin: 5px;
        border: white;
        text-decoration: none;
    }
</style>
