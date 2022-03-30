<template>
    <div>
        <div>
            <h1>this is welcome.vue file</h1>
        </div>

        <Header/>

        <!-- display all products-->
        <div class="">
            <table>
                <thead>
                <tr>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                </tr>
                </tbody>
            </table>
        </div>

        <Footer/>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import Footer from './Footer';

    export default {
        name:'app',
        components: {
            Header,
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
