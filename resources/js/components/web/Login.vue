<template>
    <div class="flex min-h-screen bg-slate-800">

        <Header class="z-50"/>

        <!-- body -->
        <div class="mt-12 flex flex-col w-full">

            <!-- login body -->
            <div
                class=" flex flex-col place-self-center w-auto h-5/6 mt-10 px-4 text-gray-200 bg-slate-900 rounded-lg  border-2 border-red-600 ">
                <h5 class=" my-4 mx-4 bg-slate-800 text-center rounded-lg   ">Enter Your Credential To Login </h5>
                <!-- alerts -->
                <div class="  text-sm place-self-center p-2 h-auto rounded bg-gradient-to-r from-slate-700">
                    <ul class="list-disk">
                        <li class="pt-4 pb-1">enter a valid email address</li>
                        <li class="pt-1 pb-4">password should be at least 8 characters</li>
                    </ul>
                </div>
                <!-- form -->
                <form class="flex flex-col justify-center" action="#" @submit.prevent="login">
                    <div class="text-left relative">
                        <div class=" rounded-md">
                            <div class="flex flex-col py-10">
                                <label class="block mb-2 ml-2 text-sm" for="email">Email </label>
                                <input
                                    class="mb-5 rounded-lg text-gray-200 text-sm bg-slate-700 border border-gray-200 border-1 border-red-600"
                                    v-model="formData.email" name="email" id="email" type="email" autocomplete="email">
                                <label class="block mb-1 ml-2 text-sm" for="password">Password</label>
                                <input class="rounded-lg text-gray-200 text-sm bg-slate-700 border border-red-600"
                                       v-model="formData.password" name="password" id="password" type="password"
                                       autocomplete="current-password">
                            </div>
                        </div>
                    </div>
                    <button
                        class=" justify-center border-2 border-red-600 rounded-lg "
                        type="submit">login
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {isEmpty} from "lodash";
import Header from "../web/Header";


export default {
    name: "Login",
    components: {Header},
    data() {
        return {
            formData: {
                email: '',
                password: '',
            },
        }
    },
    mounted() {
        this.initCSRFToken()
        this.redirectIfAuthenticated()
        this.checkIfLoggedIn()

        this.$watch(
            () => this.formData.email, (newValue, oldValue) => {
                this.validateEmail()
            }
        )
        this.$watch(
            () => this.formData.password, (newValue, oldValue) => {
                this.validatePassword()
            }
        )
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
            console.log('\n')
            console.log('-------------------------')
            console.log('login >> ')
            axios.post('/login', this.formData)
                .then(response => {
                    console.log('response >> \n')
                    console.log(response.data.user)
                    if (!isEmpty(response.data.user)) {
                        console.log('saving user data in local storage\n')
                        localStorage.setItem('loggedInUser', JSON.stringify(response.data.user))
                        this.$router.push({name: 'welcome'})
                    }
                })
                .catch(function (error) {
                    localStorage.removeItem('user.firstName')
                    localStorage.removeItem('user.lastName')
                    localStorage.removeItem('user.email')
                    console.log('error >> \n')
                    console.log(error)
                })
        },
        redirectIfAuthenticated() {
            axios.post('/login')
                .then(response => {
                    console.log('redirect if authenticated >>> ')
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
        checkIfLoggedIn() {
            console.log('checkIfLoggedIn > ')
            console.log(localStorage.getItem('loggedInUser') !== null)
            return localStorage.getItem('loggedInUser') !== null
        },
        validateEmail() {

        },
        validatePassword() {

        },
    },
}
</script>

<style scoped>

</style>
