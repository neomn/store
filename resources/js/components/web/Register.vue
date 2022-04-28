<template>
    <div class="min-h-screen bg-slate-800 py-6 flex flex-col justify-center">
<!--        <div><h1>this is register component</h1></div>-->
        <div
            class=" h-auto relative py-3 sm:mx-96 text-gray-200 bg-slate-900 rounded-lg pb-12 justify-center border border-lime-300">
            <h1 class="my-8 mx-8 bg-slate-800 text-3xl text-center rounded-lg h-10">Welcome To Your Tesla Store </h1>
            <div class="text-left rounded-md">
                <div class=" rounded-md">
                    <form class="flex flex-col justify-center" action="#" @submit.prevent="register">
                        <div class="flex flex-col mx-8">
                            <input class=" h-8 mb-5 rounded-lg text-gray-200 bg-slate-700 border border-gray-200 "
                                   v-model="formData.first_name" type="text" placeholder="First Name">
                            <input class=" h-8 mb-5 rounded-lg text-gray-200 bg-slate-700 border border-gray-200 "
                                   v-model="formData.last_name" type="text" placeholder="Last Name" >
                            <input class=" h-8 mb-5 rounded-lg text-gray-200 bg-slate-700 border border-gray-200 "
                                   v-model="formData.email"  type="email" placeholder="Email" autocomplete="off">
                            <input class=" h-8 mb-5 rounded-lg text-gray-200 bg-slate-700 border border-gray-200 "
                                   v-model="formData.password"  type="password" autocomplete="new-password" placeholder="Password">
                            <input class=" h-8 rounded-lg text-gray-200 bg-slate-700 border border-gray-200"
                                   v-model="password_confirm" type="password" autocomplete="new-password" placeholder="Confirm Password">
                            <button class=" h-8 block mt-16 justify-end bg-green-900 rounded-lg  px-4 hover:bg-green-600"
                                    type="submit">Register
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

export default {
    name: "Register",
    data(){
      return {
          formData: {
              first_name: '',
              last_name: '',
              email: '',
              password: '',
          },
          password_confirm: '',
      }
    },
    mounted() {
        this.initCSRFToken()
    },
    methods:{
        initCSRFToken() {
            console.log('\n')
            console.log('-------------------------')
            console.log('init csrf token >')
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    console.log('response > \n ')
                    console.log(response)
                })
                .catch(function (error) {
                    console.log('error > \n ')
                    console.log(error)
                })
        },
        register(){
            console.log('\n')
            console.log('-------------------------')
            console.log('Register > ')
            axios.post('/api/register' , this.formData )
            .then(response => {
                console.log(response.data)
                if (!isEmpty(response.data.user)) {
                    console.log('saving user data in local storage\n')
                    localStorage.setItem('user.firstName',response.data.user.first_name)
                    localStorage.setItem('user.lastName',response.data.user.last_name)
                    localStorage.setItem('user.email',response.data.user.email)
                    this.$router.push({name: 'dashboard'})
                }
            })
            .catch((error) =>{
                localStorage.removeItem('user.firstName')
                localStorage.removeItem('user.lastName')
                localStorage.removeItem('user.email')
                console.log('error > \n')
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
