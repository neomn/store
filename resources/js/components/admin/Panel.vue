<template>
    <div class="panel">
        <h1 class="text-3xl text-pink-500" >tesing tailwind css</h1>
        <header>
            <Header/>
        </header>
        <div>
            <h1>this is panel</h1>
            <sidebar class="sidebar">
                <Sidebar/>
            </sidebar>
        </div>
        <footer>
            <Footer/>
        </footer>
    </div>
</template>


<script>
import Header from "./Header";
import Sidebar from "./Sidebar";
import Footer from "./Footer";
import Settings from "./Settings";
import Products from "./Products";
import Users from "./Users";
import Statistics from "./Statistics";

export default {
    name: 'app',
    components: {
        Header,
        Sidebar,
        Footer,
        Settings,
        Products,
        Users,
        Statistics,
    },
    data() {
        return {

        }

    },
    methods :{

    },
}
</script>

<style scoped>
    .panel{
        background-color: gray;
    }
</style>
