<template>
    <div class="min-h-screen bg-slate-800 py-6 flex flex-col justify-center">
        <div
            class="relative py-3 sm:mx-96 text-gray-200 bg-slate-900 rounded-lg pb-12 justify-center border border-gray-200">
            <h1 class="my-8 mx-8 bg-slate-800 text-3xl text-center rounded-lg h-10">Enter Your Credential To Login </h1>
            <div class="text-left rounded-md">
                <div class=" rounded-md">
                    <form class="flex flex-col justify-center" action="#" @submit.prevent="login">
                        <div class="flex flex-col m-8">
                            <label class="block mb-2 ml-2" for="email">Email </label>
                            <input class="mb-5 rounded-lg text-gray-200 bg-slate-700 border border-gray-200 "
                                   v-model="formData.email" name="email" id="email" type="email" autocomplete="email">
                            <label class="block mb-1 ml-2" for="password">Password</label>
                            <input class="rounded-lg text-gray-200 bg-slate-700 border border-gray-200"
                                   v-model="formData.password" name="password" id="password" type="password"
                                   autocomplete="current-password">
                            <button class="block mt-16 justify-end bg-green-900 rounded-lg p-2 px-4 hover:bg-green-600"
                                    type="submit">login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            formData: {
                email: '',
                password: '',
            },
            loginResponse: '',
        }
    },
    mounted() {
        this.initCSRFToken()
        this.redirectIfAuthenticated()
    },
    methods: {
        initCSRFToken() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    console.log('initializing csrf token >>>> ')
                    console.log(response)
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        login() {
            axios.post('/login', this.formData)
                .then(response => {
                    console.log('attempt to login , results >>>')
                    console.log(response.data)
                    this.loginResponse = response.data
                    if (this.loginResponse === 'user authenticated successfully') {
                        console.log('redirecting to welcome')
                        this.$router.push({name: 'welcome'})
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        redirectIfAuthenticated() {

                axios.post('/login')
                    .then(response => {
                        console.log('post request to login to check if authenticated >>> ')
                        console.log(response.data)
                        this.loginResponse = response.data

                        if (this.loginResponse === 'user already logged in') {
                            console.log('redirecting to welcome')
                            this.$router.push({name: 'welcome'})
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
        },
    }
</script>

<style scoped>

</style>
