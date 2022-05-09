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
        console.log(this.userLoggedIn())
        if (this.userLoggedIn()) {
            this.initDashboard()
        }else console.log('user is not logged in ')
            // this.$router.push('login')
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
        async userLoggedIn() {
            console.log('\n')
             let temp = await axios.post('/login')
                .then(response => {
                    console.log('userLoggedIn > -----------------')
                    console.log('status > \n')
                    console.log(response.status)
                    console.log('response > \n')
                    console.log(response)
                    return response.status === 200 && response.data === 'user logged in'
                })
                .catch(function (error) {
                    console.log('userLoggedIn error > ---------------- \n')
                    console.log(error)
                    localStorage.removeItem('loggedInUser')
                    return false
                })
            return temp
        },

    }
}
</script>





<style scoped>

</style>
