<template>
    <div class="min-h-screen bg-slate-800 py-6 flex flex-col justify-center">

        <Header/>

        <div
            class="relative mt-8 py-3 sm:mx-96 text-gray-200 bg-slate-900 rounded-lg pb-12 justify-center  ">
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
            ()=>this.formData.email , (newValue , oldValue) => {
                console.log(this.formData.email)
            }
        )
        this.$watch(
            ()=>this.formData.password , (newValue , oldValue) => {
                console.log(this.formData.password)
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
                        localStorage.setItem('loggedInUser' ,JSON.stringify(response.data.user))
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
        checkIfLoggedIn(){
            console.log('checkIfLoggedIn > ')
            console.log(localStorage.getItem('loggedInUser') !== null)
            return localStorage.getItem('loggedInUser') !== null
        },
        emailValidation(){

        },
        passwordValidation(){

        },
    },
}
</script>

<style scoped>

</style>
