<template>
    <div class="flex min-h-screen ">
        <Background/>
        <Header class="z-50"/>
        <div class="z-20 absolute w-full h-full flex justify-center items-center ">
            <form action="#" @submit.prevent="login"
                  class="flex flex-col justify-start items-center w-11/12 h-5/6 mb-20  border border-red-600 rounded-2xl">
                <!-- message box -->
                <div
                    class="w-full h-44 flex flex-col justify-center items-start text-zinc-200
                     bg-gradient-to-r from-slate-700 rounded-lg">
                    <ul class="pl-8 list-disk ">
                        <li class="pt-4 pb-1">enter a valid email address</li>
                        <li class="pt-1 pb-4">password should be at least 8 characters</li>
                    </ul>
                </div>
                <!-- inputs -->
                <div class="w-full h-60 text-zinc-200 ">
                    <div class="flex flex-col justify-center items-center py-10">
                        <div class="w-5/6 ">
                            <label class="block mb-2 ml-2 text-sm" for="phone_number">Phone Number </label>
                            <input
                                class=" w-full mb-5 rounded-lg text-gray-200 text-sm bg-slate-700 border border-gray-200
                                 border-1 border-red-600"
                                v-model="formData.phone_number" name="phone_number" id="phone_number" type="number">
                        </div>
                        <div class="w-5/6">
                            <label class="block mb-1 ml-2 text-sm" for="password">Password</label>
                            <input class=" w-full rounded-lg text-gray-200 text-sm bg-slate-700 border border-red-600"
                                   v-model="formData.password" name="password" id="password" type="password"
                                   autocomplete="current-password">
                        </div>
                    </div>
                </div>
                <!-- social login -->
                <label class="text-zinc-200"> social media login</label>
                <div class="w-full h-1 bg-gradient-to-r from-zinc-900 via-zinc-400 to-zinc-900 "></div>
                <div class="w-full h-20 flex justify-center items-center ">
                    <img class="w-16 h-16 mx-4 rounded-full "
                         src="/storage/images/socialMedia/without_background/google.png">
                    <img class="w-16 h-16 mx-4 rounded-full "
                         src="/storage/images/socialMedia/without_background/linkedin.png">
                    <img class="w-16 h-16 mx-4 rounded-full "
                         src="/storage/images/socialMedia/without_background/github.png">
                </div>
                <!-- buttons -->
                <div class="w-full h-44 flex flex-col justify-end items-center text-zinc-200 ">
                    <button class=" w-3/4 h-10 my-2 justify-self-end  border-2 border-red-600 rounded-lg "
                            type="submit">
                        login
                    </button>
                    <button class="w-3/4 h-10 my-2 rounded-lg border border-yellow-600" type="button">
                        forgot password
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Header from "../web/Header";
import Background from "../web/Background";


export default {
    name: "Login",
    components: {Header, Background},
    data() {
        return {
            formData: {
                phone_number: '',
                password: '',
            },
        }
    },
    created() {
        this.initCSRFToken()
        this.login()
    },
    methods: {
        initCSRFToken() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                if (response.status === 204)
                    console.log('initCSRFToken > done')

            }).catch(function (error) {
                console.log('initCSRFToken error >')
                console.log(error)
            })
        },

        login() {
            console.log('\n')
            axios.post('/spa/v1/auth/login', this.formData ,{headers:{'Accept': 'application/json;charset=UTF-8',}})
                .then(response => {
                    console.log('login > -----------------')
                    console.log('status > \n')
                    console.log(response.status)
                    console.log('response > \n')
                    console.log(response.data)
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
                    console.log('login error >')
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
