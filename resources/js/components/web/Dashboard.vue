<template>

    <div class="bg-slate-900 min-h-screen text-gray-200">

        <aside class="bg-gray-800 border-r border-gray-200 float-left w-44 min-h-screen ">
            <router-link :to="{ name:'welcome' }">
                <button class="fixed bottom-5 left-8 justify-center border-gray-200 rounded-lg bg-red-700 px-4 py-1"
                        @click="logout"> Log Out
                </button>
            </router-link>
        </aside>

    </div>
</template>




<script>
export default {
    name: "Dashboard",
    data() {
        return {
            loginStatus:false
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
        logout() {
            axios.post('/logout')
                .then(response => {
                    console.log(response)
                    localStorage.removeItem('user.first_name')
                    localStorage.removeItem('user.last_name')
                    localStorage.removeItem('user.email')
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    }
}
</script>





<style scoped>

</style>
