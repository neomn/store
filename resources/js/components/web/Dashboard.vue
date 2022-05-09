<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">
        <Header/>
        <SideBar/>
    </div>
</template>




<script>
import Header from "../web/Header";
import Sidebar from "../admin/Sidebar";
import SideBar from "./SideBar";
export default {
    name: "Dashboard",
    components: {SideBar, Sidebar, Header},
    data() {
        return {

        }
    },
    mounted() {
        console.log(this.initDashboard())
        // this.initDashboard()
    },
    methods: {
        async initDashboard() {
            await axios.get('api/dashboard')
                .then(response => {
                    console.log('\n')
                    console.log('initDashboard > -------------- ')
                    console.log(response.data)
                })
                .catch(function (error) {
                    console.log('\n')
                    console.log('initDashboard error > ')
                    console.log(error.response.data.message);
                    console.log(error.response.status);
                })
        },
    }
}
</script>





<style scoped>

</style>
