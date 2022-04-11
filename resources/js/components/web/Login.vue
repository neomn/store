<template>
    <div class="min-h-screen bg-slate-800 py-6 flex flex-col justify-center">
        <div class="relative py-3 sm:mx-96 text-gray-200 bg-slate-900 rounded-lg pb-12 justify-center">
            <h1 class="my-8 mx-8 bg-slate-800 text-3xl text-center rounded-lg h-10">Enter Your Credential To Login </h1>
            <div class="text-left rounded-md">
                <div class=" rounded-md">
                    <form action="#" class="flex flex-col justify-center">
                        <div class="flex flex-col m-8">
                            <label class="block " for="email">enter your email </label>
                            <input class="mb-5 rounded-lg" name="email" id="email" type="email" placeholder="email">
                            <label class="block " for="password">enter password</label>
                            <input class="rounded-lg" name="password" id="password" type="password" placeholder="password">
                            <button class="block mt-8 bg-green-900 rounded-lg p-2 px-4 hover:bg-green-600" type="submit">login
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
        return {}
    },
    mounted() {
        this.initLogin();
    },
    methods: {
        initLogin() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    console.log('initializing csrf token >>>> ')
                    console.log(response)
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
