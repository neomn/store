<template>
    <div class="bg-slate-900 min-h-screen text-gray-200">
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
        // this.initCSRFToken()
        this.initDashboard()
    },
    methods: {
        // initCSRFToken() {
        //     axios.get('/sanctum/csrf-cookie')
        //         .then(response => {
        //             console.log('initializing csrf token >>>> ')
        //             console.log(response)
        //         })
        //         .catch(function (error) {
        //             console.log(error)
        //         })
        // },
        initDashboard() {
            axios.get('api/dashboard')
                .then(response => {
                    console.log('\n')
                    console.log('---------------------------------')
                    console.log('dashboard get request to api/dashboard >>> ')
                    console.log(response.data)
                })
                .catch(function (error) {
                    console.log('\n')
                    console.log('---------------------------------')
                    console.log('dashboard get request to api/dashboard error >>> ')
                    console.log(error.response.data.message);
                    console.log(error.response.status);
                })
        },

    }
}
</script>





<style scoped>

</style>
