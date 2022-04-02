<template>
    <div class="dark" ref="panel">
        <div class="bg-white dark:bg-slate-900 min-h-screen ">
            <header>
                <Header/>
                <router-link to="settings"> go to settings</router-link>
            </header>
            <div>
                <button type="button" ref="darkButton" @click="switchDarkmode">dark Mode</button>
                <sidebar class="sidebar">
                    <Sidebar/>
                </sidebar>
            </div>
            <div>

            </div>
            <footer>
                <Footer/>
            </footer>
        </div>
    </div>
</template>


<script>
import Header from "./Header";
import Sidebar from "./Sidebar";
import Footer from "./Footer";
import Settings from "./Settings";
import Products from "./Products";
import Users from "./Users";
import Statistics from "./Analytics";

export default {
    name: 'web',
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
            showProducts: false,
        }

    },
    methods: {
        switchDarkmode() {
            if (this.$refs.panel.classList.contains('dark')) {
                this.$refs.panel.classList.remove('dark')
            } else this.$refs.panel.classList.add('dark')

        }
    },
}
</script>

<style scoped>

</style>
