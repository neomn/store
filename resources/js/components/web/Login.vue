<template>
    <div class="flex min-h-screen ">
        <Background/>
        <Header class="z-50"/>
        <div class="z-20 absolute flex justify-center items-start w-full h-full border-4 border-yellow-500">
            <div class="flex flex-col justify-start items-center w-11/12 h-5/6 mt-10 ">
                <!-- message box -->
                <div class="w-full h-44 text-zinc-200 border">
                    message box
                </div>
                <!-- inputs -->
                <div class="w-full h-60 border">

                </div>
                <!-- social login -->
                <div class="w-full h-20 border">

                </div>
                <!-- buttons -->
                <div class="w-full h-44 text-zinc-200 border">
                    login
                </div>
            </div>
        </div>



<!--        <div class="mt-12 flex flex-col w-full">-->

<!--            &lt;!&ndash; login body &ndash;&gt;-->
<!--            <div-->
<!--                class=" flex flex-col place-self-center w-auto h-5/6 mt-10 px-4 text-gray-200 bg-slate-900 rounded-lg  border-2 border-red-600 ">-->
<!--                <h5 class=" my-4 mx-4 bg-slate-800 text-center rounded-lg   ">Enter Your Credential To Login </h5>-->
<!--                &lt;!&ndash; alerts &ndash;&gt;-->
<!--                <div class="  text-sm place-self-center p-2 h-auto rounded bg-gradient-to-r from-slate-700">-->
<!--                    <ul class="list-disk">-->
<!--                        <li class="pt-4 pb-1">enter a valid email address</li>-->
<!--                        <li class="pt-1 pb-4">password should be at least 8 characters</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                &lt;!&ndash; form &ndash;&gt;-->
<!--                <form class="flex flex-col h-full overflow-hidden" action="#" @submit.prevent="login">-->
<!--                    <div class="text-left relative">-->
<!--                        <div class=" rounded-md">-->
<!--                            <div class="flex flex-col py-10">-->
<!--                                <label class="block mb-2 ml-2 text-sm" for="email">Email </label>-->
<!--                                <input-->
<!--                                    class="mb-5 rounded-lg text-gray-200 text-sm bg-slate-700 border border-gray-200 border-1 border-red-600"-->
<!--                                    v-model="formData.email" name="email" id="email" type="email" autocomplete="email">-->
<!--                                <label class="block mb-1 ml-2 text-sm" for="password">Password</label>-->
<!--                                <input class="rounded-lg text-gray-200 text-sm bg-slate-700 border border-red-600"-->
<!--                                       v-model="formData.password" name="password" id="password" type="password"-->
<!--                                       autocomplete="current-password">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <button class=" justify-self-end  border-2 border-red-600 rounded-lg "-->
<!--                            type="submit">login-->
<!--                    </button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>
import {isEmpty} from "lodash";
import Header from "../web/Header";
import Background from "../web/Background";


export default {
    name: "Login",
    components: {Header , Background},
    data() {
        return {
            formData: {
                email: '',
                password: '',
            },
        }
    },
    created() {
        console.log('login created > ------------------------')
        this.initCSRFToken()
        this.login()

        // this.redirectIfAuthenticated()

        // this.$watch(
        //     () => this.formData.email, (newValue, oldValue) => {
        //         this.validateEmail()
        //     }
        // )
        // this.$watch(
        //     () => this.formData.password, (newValue, oldValue) => {
        //         this.validatePassword()
        //     }
        // )
    },
    methods: {
        async initCSRFToken() {
            await axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    console.log('\n')
                    console.log('initCSRFToken > ------------ ')
                    console.log(response.status)
                    console.log(response.data)
                    if (response.status === 204) {
                        console.log(true)
                        return true
                    }
                })
                .catch(function (error) {
                    console.log('initCSRFToken error > ------------ ')
                    console.log(error)
                    console.log(false)
                    return false
                })
        },
        async login() {
            console.log('\n')
            await axios.post('/login', this.formData)
                .then(response => {
                    console.log('login > -----------------')
                    console.log('status > \n')
                    console.log(response.status)
                    console.log('response > \n')
                    console.log(response)
                    if (response.status === 200 && response.data.user) {
                        localStorage.setItem('loggedInUser', JSON.stringify(response.data.user))
                        if (response.data.user.type === 'user')
                            this.$router.push('dashboard')
                        if (response.data.user.type === 'admin') {
                            console.log('redirect admin to panel')
                            window.location.href = '/panel'
                        }
                    } else if (response.status === 200 && response.data === 'user logged in') {
                        console.log('redirect to dashboard')
                        this.$router.push('dashboard')
                    } else if (response.status === 200 && response.data === 'admin logged in') {
                        console.log('redirect to admin panel')
                        window.location.href = '/panel'
                    } else if (response.status === 200 && response.data === 'invalid credentials') {
                        console.log('invalid credentials')
                        localStorage.removeItem('loggedInUser')
                    }
                })
                .catch(function (error) {
                    console.log('login error > ---------------- \n')
                    console.log(error)
                    localStorage.removeItem('loggedInUser')
                })
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
